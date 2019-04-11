
( function( blocks, editor, element ) {
    var el = element.createElement;
	var Fragment = element.Fragment;
	var RichText = editor.RichText;

    blocks.registerBlockType( 'proximo/sidenote', {
        title: 'Sidenote',
        icon: 'admin-post',
        category: 'layout',

		attributes: {
			content: {
				type: 'array',
				source: 'children',
				selector: 'span',
			},
		},

        edit: function( props ) {
			var content = props.attributes.content;
			function onChangeContent( newContent ) {
				props.setAttributes( { content: newContent } );
			}

            return el(
				RichText,
                {
					tagName: 'span',
					className: props.className,
					onChange: onChangeContent,
					value: content,
				}
            );
        },

        save: function( props ) {
            return el(
				RichText.Content,
				{
					tagName: 'span',
					className: 'sidenote',
					value: props.attributes.content,
				}
            );
        },
    } );
}(
    window.wp.blocks,
	window.wp.editor,
    window.wp.element,
) );

