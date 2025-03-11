import { useBlockProps } from '@wordpress/block-editor';

export function Save( { attributes } ) {
    const blockProps = useBlockProps.save();

    return (
        <div { ...blockProps }>
            <p>{ attributes.content }</p>
        </div>
    );
}
