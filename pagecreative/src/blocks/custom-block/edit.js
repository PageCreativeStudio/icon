import { useBlockProps, RichText } from '@wordpress/block-editor';

export function Edit( { attributes, setAttributes } ) {
    const blockProps = useBlockProps();

    const onChangeContent = ( newContent ) => {
        setAttributes( { content: newContent } );
    };

    return (
        <div { ...blockProps }>
            <RichText
                tagName="p"
                value={ attributes.content }
                onChange={ onChangeContent }
                placeholder="Enter your content here"
            />
        </div>
    );
}
