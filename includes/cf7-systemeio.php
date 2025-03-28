<?php

/**
 * Contact Form 7 to Systeme.io Integration
 * 
 * @package Serinity
 */

declare(strict_types=1);

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if Contact Form 7 is active
 * 
 * @return bool Whether Contact Form 7 is active
 */
function cf7_systemeio_is_cf7_active(): bool {
    return class_exists('WPCF7_ContactForm');
}

/**
 * Check if Contact Form 7 is installed but not active
 * 
 * @return bool Whether Contact Form 7 is installed but not active
 */
function cf7_systemeio_is_cf7_installed(): bool {
    return !cf7_systemeio_is_cf7_active() && file_exists(WP_PLUGIN_DIR . '/contact-form-7/wp-contact-form-7.php');
}

/**
 * Class to handle the integration between Contact Form 7 and Systeme.io
 */
class CF7_Systemeio_Integration {
    /**
     * API Key for Systeme.io
     * @var string
     */
    private string $api_key = '';

    /**
     * API base endpoint for Systeme.io
     * @var string
     */
    private string $api_base = 'https://api.systeme.io/api/';

    /**
     * Initialize the integration
     * 
     * @param string|null $api_key Optional API key to set directly
     */
    public function __construct(string $api_key = null) {
        if ($api_key !== null) {
            $this->api_key = $api_key;
        } else {
            $this->api_key = get_option('serinity_systemeio_api_key', '');
        }

        $this->initialize_integration();
    }

    /**
     * Initialize the integration if conditions are met
     */
    private function initialize_integration(): void {
        // Ensure CF7 is active before proceeding
        if (!cf7_systemeio_is_cf7_active()) {
            return;
        }

        // Don't proceed if we don't have an API key
        if (empty($this->api_key)) {
            return;
        }

        // Hook into Contact Form 7 submission
        add_action('wpcf7_before_send_mail', [$this, 'process_submission'], 10, 3);

        // Add custom validation messages
        add_filter('wpcf7_display_message', [$this, 'custom_error_message'], 10, 2);
    }

    /**
     * Set API key
     * 
     * @param string $api_key The API key to set
     * @return void
     */
    public function set_api_key(string $api_key): void {
        $this->api_key = $api_key;
    }

    /**
     * Get API key
     * 
     * @return string The API key
     */
    public function get_api_key(): string {
        return $this->api_key;
    }

    /**
     * Process form submission and send data to Systeme.io
     *
     * @param WPCF7_ContactForm $contact_form Contact form object
     * @param bool &$abort Whether to abort the form submission
     * @param WPCF7_Submission $submission Submission object
     * @return void
     */
    public function process_submission($contact_form, &$abort, $submission): void {
        try {
            // Skip if already aborted or no API key
            if ($abort || empty($this->api_key)) {
                return;
            }

            // Get selected tag ID
            $tag_id = get_option('serinity_systemeio_selected_tag_id', '');

            // Skip if no tag ID is selected
            if (empty($tag_id)) {
                $this->log_error('No tag ID selected. Cannot proceed with Systeme.io integration.');
                return;
            }

            // Get form data
            $form_data = $submission->get_posted_data();

            // Skip if no email provided
            if (empty($form_data['your-email'])) {
                return;
            }

            // Prepare contact data
            $contact_data = $this->prepare_contact_data($form_data);

            // Create contact in Systeme.io
            $contact_id = $this->create_contact($contact_data['email'], $contact_data['fields']);

            // Check if contact creation was successful
            if (is_wp_error($contact_id)) {
                throw new Exception($contact_id->get_error_message());
            }

            // Add tag to the contact
            $tag_result = $this->add_tag_to_contact($contact_id, $tag_id);

            if (is_wp_error($tag_result)) {
                $this->log_error('Tag Assignment Error: ' . $tag_result->get_error_message());
            } else {
                $this->log_success("Contact successfully added to Systeme.io with ID: $contact_id and tagged");
            }
        } catch (Exception $e) {
            // Log error
            $this->log_error('Submission Processing Error: ' . $e->getMessage());

            // Abort form submission (don't send email)
            $abort = true;

            // Set error message
            $submission->set_response($this->get_error_message('api_error'));
        }
    }

    /**
     * Prepare contact data from form submission
     *
     * @param array $form_data Form submission data
     * @return array Prepared contact data
     */
    private function prepare_contact_data(array $form_data): array {
        // Extract form fields (adjust these names to match your form fields)
        $name = sanitize_text_field($form_data['your-name'] ?? '');
        $email = sanitize_email($form_data['your-email'] ?? '');
        $subject = sanitize_text_field($form_data['your-subject'] ?? '');
        $message = sanitize_textarea_field($form_data['your-message'] ?? '');
        $phone = sanitize_text_field($form_data['your-phone'] ?? '');

        // Prepare fields array for Systeme.io API
        $fields = [];

        if (!empty($name)) {
            // Attempt to split name into first and last name
            $name_parts = explode(' ', $name, 2);
            $fields[] = [
                'slug' => 'first_name',
                'value' => $name_parts[0]
            ];

            if (isset($name_parts[1])) {
                $fields[] = [
                    'slug' => 'surname',
                    'value' => $name_parts[1]
                ];
            }
        }

        if (!empty($phone)) {
            $fields[] = [
                'slug' => 'phone_number',
                'value' => $phone
            ];
        }

        // Add message as a note field if it exists in the API
        if (!empty($message)) {
            $fields[] = [
                'slug' => 'note',
                'value' => "Subject: $subject\n\nMessage: $message"
            ];
        }

        return [
            'email' => $email,
            'fields' => $fields
        ];
    }

    /**
     * Create a contact in Systeme.io
     *
     * @param string $email Email address
     * @param array $fields Array of field objects with slug and value
     * @return int|WP_Error Contact ID on success, WP_Error on failure
     */
    private function create_contact(string $email, array $fields) {
        // Prepare data for API
        $data = [
            'email' => $email,
            'locale' => 'fr', // Assuming French locale for catherinechauvin.com
            'fields' => $fields
        ];

        // Send request to API
        $response = $this->make_api_request('contacts', 'POST', $data);

        // Check for errors
        if (is_wp_error($response)) {
            return $response;
        }

        // Parse response to get contact ID
        if (!isset($response['id'])) {
            return new WP_Error(
                'api_error',
                "Contact ID not found in API response: " . json_encode($response)
            );
        }

        return $response['id'];
    }

    /**
     * Add tag to a contact
     *
     * @param int $contact_id Contact ID
     * @param int $tag_id Tag ID
     * @return bool|WP_Error True on success, WP_Error on failure
     */
    private function add_tag_to_contact($contact_id, $tag_id) {
        // Assign the tag to the contact
        $response = $this->make_api_request("contacts/{$contact_id}/tags", 'POST', ['tagId' => $tag_id]);

        return is_wp_error($response) ? $response : true;
    }

    /**
     * Make API request to Systeme.io
     *
     * @param string $endpoint API endpoint
     * @param string $method HTTP method
     * @param array $data Request data
     * @return array|WP_Error API response or error
     */
    private function make_api_request(string $endpoint, string $method = 'GET', array $data = []) {
        $args = [
            'headers' => [
                'X-API-Key' => $this->api_key,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'timeout' => 30,
            'data_format' => 'body'
        ];

        if (!empty($data)) {
            $args['body'] = json_encode($data);
        }

        $url = $this->api_base . $endpoint;

        switch ($method) {
            case 'POST':
                $response = wp_remote_post($url, $args);
                break;
            case 'GET':
                $response = wp_remote_get($url, $args);
                break;
            default:
                return new WP_Error('invalid_method', 'Invalid HTTP method');
        }

        // Check for WP HTTP errors
        if (is_wp_error($response)) {
            return $response;
        }

        // Check response code
        $status_code = wp_remote_retrieve_response_code($response);
        if ($status_code < 200 || $status_code >= 300) {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body, true);
            $error_message = $data['detail'] ?? "API Error (Status $status_code): $body";

            if (isset($data['violations']) && is_array($data['violations'])) {
                foreach ($data['violations'] as $violation) {
                    $error_message .= ' ' . ($violation['message'] ?? '');
                }
            }

            return new WP_Error('api_error', $error_message);
        }

        // Parse successful response
        $body = wp_remote_retrieve_body($response);
        return json_decode($body, true);
    }

    /**
     * Get available tags from Systeme.io
     *
     * @return array|WP_Error Array of tags or WP_Error on failure
     */
    public function get_available_tags() {
        if (empty($this->api_key)) {
            return new WP_Error('missing_api_key', 'API key is required');
        }

        return $this->make_api_request('tags');
    }

    /**
     * Create a new tag in Systeme.io
     *
     * @param string $tag_name Name of the tag to create
     * @return array|WP_Error Tag data on success, WP_Error on failure
     */
    public function create_tag(string $tag_name) {
        if (empty($this->api_key)) {
            return new WP_Error('missing_api_key', 'API key is required');
        }

        return $this->make_api_request('tags', 'POST', ['name' => $tag_name]);
    }

    /**
     * Custom error messages
     *
     * @param string $message Current message
     * @param string $status Message status
     * @return string Modified message
     */
    public function custom_error_message(string $message, string $status): string {
        if ($status === 'api_error') {
            return __("Nous rencontrons actuellement des problèmes techniques. Veuillez réessayer plus tard ou nous contacter directement par téléphone.", 'serinity');
        }

        return $message;
    }

    /**
     * Get error message by key
     *
     * @param string $key Error key
     * @return string Error message
     */
    private function get_error_message(string $key): string {
        return $this->custom_error_message('', $key);
    }

    /**
     * Log error message
     *
     * @param string $message Error message
     * @return void
     */
    private function log_error(string $message): void {
        if (defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
            error_log('[CF7 Systeme.io ERROR] ' . $message);
        }
    }

    /**
     * Log success message
     *
     * @param string $message Success message
     * @return void
     */
    private function log_success(string $message): void {
        if (defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
            error_log('[CF7 Systeme.io SUCCESS] ' . $message);
        }
    }
}

/**
 * Add settings page for API key and tags
 */
class CF7_Systemeio_Settings {
    /**
     * Integration instance
     * @var CF7_Systemeio_Integration|null
     */
    private ?CF7_Systemeio_Integration $integration = null;

    /**
     * API error message
     * @var string
     */
    private string $api_error = '';

    /**
     * Tags from API
     * @var array
     */
    private array $available_tags = [];

    /**
     * Initialize settings
     */
    public function __construct() {
        // Only proceed if CF7 is active
        if (!cf7_systemeio_is_cf7_active()) {
            return;
        }

        $this->setup_hooks();
        $this->initialize_integration();
    }

    /**
     * Set up WordPress hooks
     */
    private function setup_hooks(): void {
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);
        add_action('admin_post_systemeio_create_tag', [$this, 'handle_create_tag']);
        add_action('admin_post_systemeio_select_tag', [$this, 'handle_select_tag']);
    }

    /**
     * Initialize integration if API key exists
     */
    private function initialize_integration(): void {
        $api_key = get_option('serinity_systemeio_api_key', '');
        if (empty($api_key)) {
            return;
        }

        // Pass API key directly to constructor
        $this->integration = new CF7_Systemeio_Integration($api_key);

        // Try to fetch tags
        $tags = $this->integration->get_available_tags();
        if (is_wp_error($tags)) {
            $this->api_error = $tags->get_error_message();
        } else {
            $this->available_tags = $tags['items'] ?? [];
        }
    }

    /**
     * Add settings page
     */
    public function add_settings_page(): void {
        add_submenu_page(
            'options-general.php',
            __('Systeme.io Integration', 'serinity'),
            __('Systeme.io Integration', 'serinity'),
            'manage_options',
            'systemeio-integration',
            [$this, 'render_settings_page']
        );
    }

    /**
     * Register settings
     */
    public function register_settings(): void {
        register_setting('serinity_systemeio', 'serinity_systemeio_api_key');
        register_setting('serinity_systemeio', 'serinity_systemeio_selected_tag_id');

        add_settings_section(
            'serinity_systemeio_section',
            __('API Settings', 'serinity'),
            [$this, 'render_section'],
            'systemeio-integration'
        );

        add_settings_field(
            'serinity_systemeio_api_key',
            __('API Key', 'serinity'),
            [$this, 'render_api_key_field'],
            'systemeio-integration',
            'serinity_systemeio_section'
        );
    }

    /**
     * Handle creating a new tag
     */
    public function handle_create_tag(): void {
        $this->verify_admin_access('systemeio_create_tag_nonce');

        $tag_name = isset($_POST['tag_name']) ? sanitize_text_field($_POST['tag_name']) : '';

        if (empty($tag_name)) {
            $this->redirect_with_error('empty_tag_name');
        }

        $api_key = get_option('serinity_systemeio_api_key', '');
        if (empty($api_key)) {
            $this->redirect_with_error('no_api_key');
        }

        // Create integration instance with API key passed directly
        $integration = new CF7_Systemeio_Integration($api_key);

        // Create tag
        $result = $integration->create_tag($tag_name);

        if (is_wp_error($result)) {
            $this->redirect_with_error('api_error', $result->get_error_message());
        }

        // Success, redirect back with success message
        wp_redirect(add_query_arg([
            'page' => 'systemeio-integration',
            'success' => 'tag_created',
            'tag_id' => $result['id']
        ], admin_url('options-general.php')));
        exit;
    }

    /**
     * Handle selecting a tag
     */
    public function handle_select_tag(): void {
        $this->verify_admin_access('systemeio_select_tag_nonce');

        $tag_id = isset($_POST['tag_id']) ? intval($_POST['tag_id']) : 0;

        if (empty($tag_id)) {
            $this->redirect_with_error('invalid_tag');
        }

        // Update the selected tag ID
        update_option('serinity_systemeio_selected_tag_id', $tag_id);

        // Success, redirect back with success message
        $this->redirect_with_success('tag_selected');
    }

    /**
     * Verify admin access and nonce
     * 
     * @param string $nonce_name Nonce name to verify
     */
    private function verify_admin_access(string $nonce_name): void {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.', 'serinity'));
        }

        check_admin_referer($nonce_name, $nonce_name);
    }

    /**
     * Redirect with error message
     * 
     * @param string $error_code Error code
     * @param string $message Optional error message
     */
    private function redirect_with_error(string $error_code, string $message = ''): void {
        $args = ['page' => 'systemeio-integration', 'error' => $error_code];
        if (!empty($message)) {
            $args['message'] = urlencode($message);
        }
        wp_redirect(add_query_arg($args, admin_url('options-general.php')));
        exit;
    }

    /**
     * Redirect with success message
     * 
     * @param string $success_code Success code
     */
    private function redirect_with_success(string $success_code): void {
        wp_redirect(add_query_arg([
            'page' => 'systemeio-integration',
            'success' => $success_code
        ], admin_url('options-general.php')));
        exit;
    }

    /**
     * Render settings section
     */
    public function render_section(): void {
        echo '<p>' . esc_html__('Configure the Systeme.io integration for Contact Form 7.', 'serinity') . '</p>';
    }

    /**
     * Render API key field
     */
    public function render_api_key_field(): void {
        $key = get_option('serinity_systemeio_api_key', '');

        echo '<input type="password" id="serinity_systemeio_api_key" name="serinity_systemeio_api_key" value="' . esc_attr($key) . '" class="regular-text">';
        echo '<p class="description">' . esc_html__('Your Systeme.io API key.', 'serinity') . '</p>';

        // Display API error if exists
        if (!empty($this->api_error)) {
            echo '<p class="error-message" style="color: #cc0000; margin-top: 10px;">' . esc_html($this->api_error) . '</p>';
        }
    }

    /**
     * Render settings page
     */
    public function render_settings_page(): void {
        if (!current_user_can('manage_options')) {
            return;
        }

        // Handle messages
        $error_message = $this->get_error_message();
        $success_message = $this->get_success_message();

?>
        <div class="wrap">
            <h1><?php echo esc_html__('Systeme.io Integration Settings', 'serinity'); ?></h1>

            <?php if (!empty($error_message)): ?>
                <div class="notice notice-error is-dismissible">
                    <p><?php echo esc_html($error_message); ?></p>
                </div>
            <?php endif; ?>

            <?php if (!empty($success_message)): ?>
                <div class="notice notice-success is-dismissible">
                    <p><?php echo esc_html($success_message); ?></p>
                </div>
            <?php endif; ?>

            <form method="post" action="options.php">
                <?php
                settings_fields('serinity_systemeio');
                do_settings_sections('systemeio-integration');
                submit_button(__('Save API Key', 'serinity'));
                ?>
            </form>

            <?php $this->render_tags_section(); ?>
        </div>
    <?php
    }

    /**
     * Get error message from request
     * 
     * @return string Error message
     */
    private function get_error_message(): string {
        $error = isset($_GET['error']) ? sanitize_text_field($_GET['error']) : '';

        if (empty($error)) {
            return '';
        }

        switch ($error) {
            case 'empty_tag_name':
                return __('Tag name cannot be empty.', 'serinity');
            case 'no_api_key':
                return __('API key is required.', 'serinity');
            case 'api_error':
                return isset($_GET['message']) ?
                    urldecode($_GET['message']) :
                    __('Unknown API error.', 'serinity');
            case 'invalid_tag':
                return __('Please select a valid tag.', 'serinity');
            default:
                return '';
        }
    }

    /**
     * Get success message from request
     * 
     * @return string Success message
     */
    private function get_success_message(): string {
        $success = isset($_GET['success']) ? sanitize_text_field($_GET['success']) : '';

        if (empty($success)) {
            return '';
        }

        switch ($success) {
            case 'tag_created':
                $tag_id = isset($_GET['tag_id']) ? intval($_GET['tag_id']) : 0;
                return sprintf(__('Tag created successfully with ID: %d', 'serinity'), $tag_id);
            case 'tag_selected':
                return __('Tag selected successfully.', 'serinity');
            default:
                return '';
        }
    }

    /**
     * Render tags section if API key is valid
     */
    private function render_tags_section(): void {
        $api_key = get_option('serinity_systemeio_api_key', '');
        if (empty($api_key) || !empty($this->api_error)) {
            return;
        }

        $selected_tag_id = get_option('serinity_systemeio_selected_tag_id', '');
    ?>
        <hr>

        <h2><?php echo esc_html__('Systeme.io Tags Information', 'serinity'); ?></h2>

        <?php if (empty($this->available_tags)): ?>
            <p><?php echo esc_html__('No tags found in your Systeme.io account. You can create a new tag below.', 'serinity'); ?></p>
        <?php else: ?>
            <h3><?php echo esc_html__('Available Tags', 'serinity'); ?></h3>
            <table class="widefat striped" style="max-width: 800px;">
                <thead>
                    <tr>
                        <th><?php echo esc_html__('ID', 'serinity'); ?></th>
                        <th><?php echo esc_html__('Name', 'serinity'); ?></th>
                        <th><?php echo esc_html__('Created At', 'serinity'); ?></th>
                        <th><?php echo esc_html__('Action', 'serinity'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->available_tags as $tag): ?>
                        <tr>
                            <td><?php echo esc_html($tag['id']); ?></td>
                            <td><?php echo esc_html($tag['name']); ?></td>
                            <td><?php echo esc_html($this->format_date($tag['createdAt'])); ?></td>
                            <td>
                                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    <input type="hidden" name="action" value="systemeio_select_tag">
                                    <input type="hidden" name="tag_id" value="<?php echo esc_attr($tag['id']); ?>">
                                    <?php wp_nonce_field('systemeio_select_tag_nonce', 'systemeio_select_tag_nonce'); ?>
                                    <button type="submit" class="button<?php echo $selected_tag_id == $tag['id'] ? ' button-primary' : ''; ?>" <?php echo $selected_tag_id == $tag['id'] ? ' disabled' : ''; ?>>
                                        <?php echo $selected_tag_id == $tag['id'] ? esc_html__('Selected', 'serinity') : esc_html__('Select', 'serinity'); ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <h3><?php echo esc_html__('Create New Tag', 'serinity'); ?></h3>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="max-width: 500px;">
            <input type="hidden" name="action" value="systemeio_create_tag">
            <?php wp_nonce_field('systemeio_create_tag_nonce', 'systemeio_create_tag_nonce'); ?>

            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="tag_name"><?php echo esc_html__('Tag Name', 'serinity'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="tag_name" id="tag_name" class="regular-text" maxlength="32" required>
                        <p class="description"><?php echo esc_html__('Maximum 32 characters.', 'serinity'); ?></p>
                    </td>
                </tr>
            </table>

            <?php submit_button(__('Create New Tag', 'serinity')); ?>
        </form>

        <hr>

        <h3><?php echo esc_html__('Current Configuration', 'serinity'); ?></h3>
        <?php if (!empty($selected_tag_id)): ?>
            <?php $selected_tag = $this->find_tag_by_id($selected_tag_id); ?>
            <p>
                <strong><?php echo esc_html__('Selected Tag:', 'serinity'); ?></strong>
                <?php echo esc_html($selected_tag['name'] ?? ''); ?>
                (ID: <?php echo esc_html($selected_tag_id); ?>)
            </p>
            <p class="description">
                <?php echo esc_html__('When a visitor submits your contact form, their information will be added to Systeme.io with this tag.', 'serinity'); ?>
            </p>
        <?php else: ?>
            <p>
                <strong><?php echo esc_html__('No tag selected.', 'serinity'); ?></strong>
                <?php echo esc_html__('Please select a tag from the list above to complete the integration setup.', 'serinity'); ?>
            </p>
    <?php endif;
    }

    /**
     * Format date for display
     * 
     * @param string $date_string Date string
     * @return string Formatted date
     */
    private function format_date(string $date_string): string {
        return date_i18n(
            get_option('date_format') . ' ' . get_option('time_format'),
            strtotime($date_string)
        );
    }

    /**
     * Find tag by ID
     * 
     * @param int|string $tag_id Tag ID to find
     * @return array Tag data or empty array if not found
     */
    private function find_tag_by_id($tag_id): array {
        // Convert string to int for comparison if necessary
        if (is_string($tag_id)) {
            $tag_id = (int) $tag_id;
        }

        foreach ($this->available_tags as $tag) {
            if ((int) $tag['id'] === $tag_id) {
                return $tag;
            }
        }
        return [];
    }
}

/**
 * Displays an admin notice if Contact Form 7 is not active or installed
 */
function cf7_systemeio_admin_notice(): void {
    // Don't show on CF7 install page
    $screen = get_current_screen();
    if ($screen->id === 'plugin-install' || isset($_GET['plugin']) && $_GET['plugin'] === 'contact-form-7') {
        return;
    }

    // Check if CF7 is installed but not active
    $is_installed = cf7_systemeio_is_cf7_installed();

    $message = $is_installed ?
        __('Contact Form 7 est installé mais non activé. L\'intégration avec Systeme.io nécessite Contact Form 7 pour fonctionner correctement.', 'serinity') :
        __('Contact Form 7 n\'est pas installé. L\'intégration avec Systeme.io nécessite Contact Form 7 pour fonctionner correctement.', 'serinity');

    $button_text = $is_installed ?
        __('Activer Contact Form 7', 'serinity') :
        __('Installer Contact Form 7', 'serinity');

    $action_url = $is_installed ?
        wp_nonce_url(
            add_query_arg(
                ['action' => 'activate', 'plugin' => 'contact-form-7/wp-contact-form-7.php'],
                admin_url('plugins.php')
            ),
            'activate-plugin_contact-form-7/wp-contact-form-7.php'
        ) :
        wp_nonce_url(
            add_query_arg(
                ['action' => 'install-plugin', 'plugin' => 'contact-form-7'],
                admin_url('update.php')
            ),
            'install-plugin_contact-form-7'
        );

    ?>
    <div class="notice notice-warning is-dismissible">
        <p>
            <strong><?php echo esc_html__('Systeme.io Integration Notice:', 'serinity'); ?></strong>
            <?php echo esc_html($message); ?>
        </p>
        <p>
            <a href="<?php echo esc_url($action_url); ?>" class="button button-primary">
                <?php echo esc_html($button_text); ?>
            </a>
        </p>
    </div>
<?php
}

/**
 * Initialize the admin notice if CF7 is not active
 */
add_action('admin_init', function (): void {
    if (!cf7_systemeio_is_cf7_active()) {
        add_action('admin_notices', 'cf7_systemeio_admin_notice');
    }
});

/**
 * Initialize the integration and settings if CF7 is active
 */
add_action('init', function (): void {
    if (cf7_systemeio_is_cf7_active()) {
        new CF7_Systemeio_Settings();
        new CF7_Systemeio_Integration();
    }
});
