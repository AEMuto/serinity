/**
 * WordPress dependencies
 */
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

// Debug helper to identify when our modifications are loaded
console.log('Serinity block extensions loaded!');

/**
 * Add custom attributes to the post-content block.
 */
function addContentTagAttribute(settings, name) {
    // Only add to core/post-content block - be very specific
    if (name !== 'core/post-content') {
        return settings;
    }

    console.log('Adding tagName attribute to post-content block', settings);

    // Check if already extended to avoid duplication
    if (settings.attributes && settings.attributes.tagName) {
        return settings;
    }

    // Add our custom attribute
    return {
        ...settings,
        attributes: {
            ...settings.attributes,
            tagName: {
                type: 'string',
                default: 'div',
            },
        },
    };
}

/**
 * Add tag selection control to Inspector Controls of the post-content block.
 */
const withInspectorControls = createHigherOrderComponent((BlockEdit) => {
    return (props) => {
        // Check if this is the post-content block
        if (props.name !== 'core/post-content') {
            return <BlockEdit {...props} />;
        }

        const { attributes, setAttributes } = props;
        const { tagName } = attributes;

        // For debugging
        console.log('Rendering post-content block with tagName:', tagName);

        return (
            <Fragment>
                <BlockEdit {...props} />
                <InspectorControls>
                    <PanelBody
                        title={__('HTML Element', 'serinity')}
                        initialOpen={true}
                    >
                        <SelectControl
                            label={__('HTML Tag', 'serinity')}
                            value={tagName || 'div'}
                            options={[
                                { label: 'div', value: 'div' },
                                { label: 'main', value: 'main' },
                                { label: 'section', value: 'section' },
                                { label: 'article', value: 'article' },
                                { label: 'aside', value: 'aside' },
                            ]}
                            onChange={(value) => {
                                console.log('Setting tagName to:', value);
                                setAttributes({ tagName: value });
                            }}
                        />
                    </PanelBody>
                </InspectorControls>
            </Fragment>
        );
    };
}, 'withInspectorControls');

/**
 * Override the default save element to change the HTML tag.
 */
function applyCustomContentTag(element, blockType, attributes) {
    if (blockType.name !== 'core/post-content' || !attributes.tagName || attributes.tagName === 'div') {
        return element;
    }

    console.log('Applying custom tag to post-content block:', attributes.tagName, element);

    // If we have a custom tag, change the element's type
    if (element && element.props) {
        return {
            ...element,
            type: attributes.tagName
        };
    }

    return element;
}

// Register the filters
addFilter(
    'blocks.registerBlockType',
    'serinity/add-content-tag-attribute',
    addContentTagAttribute
);

addFilter(
    'editor.BlockEdit',
    'serinity/with-inspector-controls',
    withInspectorControls
);

addFilter(
    'blocks.getSaveElement',
    'serinity/apply-custom-content-tag',
    applyCustomContentTag
);

// Add a filter to modify the block's rendered element on the front end
addFilter(
    'render_block',
    'serinity/render-content-with-custom-tag',
    function(content, block) {
        // Check if it's the post-content block and has a custom tag
        if (block.blockName === 'core/post-content' && block.attrs && block.attrs.tagName && block.attrs.tagName !== 'div') {
            console.log('Modifying rendered post-content block HTML tag to:', block.attrs.tagName);
            
            // Replace the opening and closing div tags with the custom tag
            const openTag = `<${block.attrs.tagName} class="`;
            const closeTag = `</${block.attrs.tagName}>`;
            
            return content.replace(/<div class="/g, openTag).replace(/<\/div>/g, closeTag);
        }
        
        return content;
    }
);