<?php

/**
 * Serenity functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Serenity
 * @since Serenity 1.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

// Include the Systeme.io integration
require_once get_template_directory() . '/includes/cf7-systemeio.php';

/**
 * adobe fonts
 */

// Pour le front-end
function serinity_enqueue_typekit_fonts() {
  wp_enqueue_style('typekit-fonts', 'https://use.typekit.net/rff2woq.css', array(), null);
}
add_action('wp_enqueue_scripts', 'serinity_enqueue_typekit_fonts');

// Pour l'éditeur
function serinity_setup_editor_styles() {
  // Ajoute les styles à l'éditeur
  add_editor_style(array(
    'https://use.typekit.net/rff2woq.css'
  ));
}
add_action('after_setup_theme', 'serinity_setup_editor_styles');

/**
 * Enqueue scripts and styles.
 */
function serinity_enqueue_assets() {
  // Enqueue the main style.css file for theme metadata
  wp_enqueue_style('serenity-style', get_stylesheet_uri());

  // Enqueue compiled CSS
  $css_file = get_template_directory() . '/assets/css/serinity.css';
  $css_version = file_exists($css_file) ? filemtime($css_file) : '1.0';
  wp_enqueue_style(
    'serenity-main',
    get_template_directory_uri() . '/assets/css/serinity.css',
    array(),
    $css_version
  );

  // Load modern script for modern browsers
  $js_file = get_template_directory() . '/assets/js/serinity.js';
  $js_version = file_exists($js_file) ? filemtime($js_file) : '1.0';
  wp_enqueue_script(
    'serenity-scripts',
    get_template_directory_uri() . '/assets/js/serinity.js',
    array(),
    $js_version,
    true
  );
  wp_script_add_data('serenity-scripts', 'type', 'module');
}
add_action('wp_enqueue_scripts', 'serinity_enqueue_assets');

/**
 * Register custom blocks for the theme
 */
function serinity_register_blocks() {
  // Check if block editor is available
  if (!function_exists('register_block_type_from_metadata')) {
    return;
  }

  // Get all block folders from the blocks/build directory
  $block_directories = glob(get_template_directory() . '/blocks/build/*', GLOB_ONLYDIR);

  // Register each block
  foreach ($block_directories as $block_dir) {
    if (file_exists($block_dir . '/block.json')) {
      register_block_type_from_metadata($block_dir);
    }
  }
}
add_action('init', 'serinity_register_blocks');

/**
 * Adds non-breaking spaces before French punctuation marks.
 * 
 * @param string $content The post content.
 * @return string The modified content.
 */
function add_french_typographic_spaces($content) {
  // Replace spaces before specific punctuation marks with non-breaking spaces
  $content = preg_replace('/ :/', '&nbsp;:', $content);

  // Add more punctuation marks as needed
  $content = preg_replace('/ ;/', '&nbsp;;', $content);
  $content = preg_replace('/ !/', '&nbsp;!', $content);
  $content = preg_replace('/ \?/', '&nbsp;?', $content);
  $content = preg_replace('/ »/', '&nbsp;»', $content);
  $content = preg_replace('/« /', '«&nbsp;', $content);

  return $content;
}

// Apply to post content
add_filter('the_content', 'add_french_typographic_spaces');

// Apply to excerpts
add_filter('get_the_excerpt', 'add_french_typographic_spaces');

// Apply to widget text
add_filter('widget_text', 'add_french_typographic_spaces');

// Apply to titles (optional)
add_filter('the_title', 'add_french_typographic_spaces');

/**
 * Filter the post content block to use the specified HTML tag
 */
function serinity_filter_post_content_tag($block_content, $block) {
  // Only process the post-content block with a custom tagName
  if (!isset($block['blockName']) || $block['blockName'] !== 'core/post-content' || 
      !isset($block['attrs']['tagName']) || $block['attrs']['tagName'] === 'div') {
      return $block_content;
  }
  
  $tag_name = esc_attr($block['attrs']['tagName']);
  
  // Only replace the first opening div tag and the last closing div tag
  $pattern = '/^(\s*)<div(\s+[^>]*?)>/';
  $replacement = '$1<' . $tag_name . '$2>';
  $block_content = preg_replace($pattern, $replacement, $block_content, 1);
  
  // Find last closing div tag
  $pos = strrpos($block_content, '</div>');
  if ($pos !== false) {
      $block_content = substr_replace($block_content, '</' . $tag_name . '>', $pos, 6);
  }
  
  return $block_content;
}
add_filter('render_block', 'serinity_filter_post_content_tag', 10, 2);
