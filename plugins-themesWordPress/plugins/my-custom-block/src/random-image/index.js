//  Import CSS.
import './style.scss';
import './editor.scss';

const {__} = wp.i18n;

const {
	AlignmentToolbar,
	BlockControls,
	registerBlockType,
	InspectorControls
} = wp.blocks;

const {
	PanelBody,
	PanelRow
} = wp.components;

const {
	Fragment
} = wp.element;

function RandomImage({category}) {
	const src = 'https://placeimg.com/320/220/' + category;
	return <img src={src} alt={category}/>;
}

registerBlockType('cgb/block-random-image', {
	title: __('Random Image'),
	icon: 'format-image',
	category: 'common',
	keywords: [
		__('random'),
		__('image')
	],
	attributes: {
		category: {
			type: 'string',
			default: 'nature'
		},
		categoryAlign: {
			type: 'string',
			default: ''
		},
		imageFilter: {
			type: 'string',
			default: ''
		}
	},

	edit: function (props) {
		const {attributes: {category, categoryAlign, imageFilter}, setAttributes, isSelected} = props;

		function setCategory(event) {
			const selected = event.target.querySelector('option:checked');
			setAttributes({category: selected.value});
			event.preventDefault();
		}

		function showForm() {
			return (
				<form onSubmit={setCategory} style={{textAlign: categoryAlign}}>
					<select id="image-category" value={category} onChange={setCategory}>
						<option value="animals">Animals</option>
						<option value="arch">Architecture</option>
						<option value="nature">Nature</option>
						<option value="people">People</option>
						<option value="tech">Tech</option>
					</select>
				</form>
			);
		}

		return (
			<Fragment>

				<div className={props.className}>

					<RandomImage filter={imageFilter} category={category}/>
					{isSelected && (showForm())}
				</div>
			</Fragment>
		);
	},

	save: function (props) {
		const {attributes: {category}} = props;
		return (
			<div>
				<RandomImage category={category}/>
			</div>
		);
	}
});
