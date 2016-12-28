var Question = Backbone.Model.extend( {
	sync: function () { return false; },


	defaults: function() {
		return {
			title: "New question...",
			type: 'radio',
			// order: Todos.nextOrder(),
			// done: false
		};
	},

	initialize: function() {
		if ( ! this.get( 'title' ) ) {
			this.set( {
				title: this.defaults().title,
			} );
		}
	},

} );
