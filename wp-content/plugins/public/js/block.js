const { registerBlockType } = wp.blocks;
const { TextControl } = wp.components;
const { useState, useEffect } = wp.element;

registerBlockType('my-plugin/markdown-block', {
    title: 'Markdown Block',
    icon: 'edit',
    category: 'common',

    attributes: {
        markdown: {
            type: 'string',
            default: '',
        },
    },

    edit({ attributes, setAttributes }) {
        const { markdown } = attributes;

        const [preview, setPreview] = useState('');

        // Update the preview whenever markdown changes
        useEffect(() => {
            if (typeof marked !== 'undefined') {
                setPreview(marked.parse(markdown)); // Parse Markdown to HTML
            }
        }, [markdown]);

        return (
            <div>
                <TextControl
                    label="Markdown"
                    value={markdown}
                    onChange={(newMarkdown) => setAttributes({ markdown: newMarkdown })}
                    placeholder="Write your Markdown content here..."
                />
                <div
                    dangerouslySetInnerHTML={{ __html: preview }} // Render Markdown preview
                />
            </div>
        );
    },

    save({ attributes }) {
        const { markdown } = attributes;
        return (
            <div dangerouslySetInnerHTML={{ __html: marked.parse(markdown) }} /> // Render Markdown as HTML
        );
    },
});
