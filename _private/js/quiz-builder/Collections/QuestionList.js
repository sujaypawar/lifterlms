var QuestionList = Backbone.Collection.extend( {
	sync: function () { return false; },

	model: Question,

	nextOrder: function() {
		if ( ! this.length ) {
			return 1;
		}
		return this.last().get( 'order' ) + 1;
	},

	comparator: function( question ) {
		return question.get( 'order' );
	}

} );

