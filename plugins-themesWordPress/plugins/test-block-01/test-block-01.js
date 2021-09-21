// В этом разделе кода регистрируется новый блок,
// устанавливается значок и категория,
// а также указывается тип полей, которые он будет включать.

wp.blocks.registerBlockType('brad/border-box', {
    title: 'Simple Box',
    icon: 'smiley',
    category: 'common',
    attributes: {
        content: {type: 'string'},
        color: {type: 'string'}
    },

// Это настраивает, как будут работать поля содержимого и цвета, и устанавливает необходимые элементы

    edit: function(props) {
        function updateContent(event) {
            props.setAttributes({content: event.target.value})
        }
        function updateColor(value) {
            props.setAttributes({color: value.hex})
        }
        return React.createElement(
            "div",
            null,
            React.createElement(
                "h3",
                null,
                "Simple Box"
            ),
            React.createElement("input", { type: "text", value: props.attributes.content, onChange: updateContent }),
            React.createElement(wp.components.ColorPicker, { color: props.attributes.color, onChangeComplete: updateColor })
        );
    },
    save: function(props) {
        return wp.element.createElement(
            "h3",
            { style: { border: "3px solid " + props.attributes.color } },
            props.attributes.content
        );
    }
})