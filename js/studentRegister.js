$(document).ready(function() {
	export default {
		data () {
			return {
			selected: null,
				options: [
					{ value: null, text: 'Please select an option' },
					{ value: 'a', text: 'This is First option' },
					{ value: 'b', text: 'Selected Option' },
					{ value: {'C': '3PO'}, text: 'This is an option with object value' },
					{ value: 'd', text: 'This one is disabled', disabled: true }
				]
			}
		}
	}

});