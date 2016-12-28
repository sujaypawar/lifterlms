var QuestionView = Backbone.View.extend( {
	sync: function () { return false; },

	tagName: 'div',
	template: _.template( $( '#llms-question-template' ).html() ),

	initialize: function() {
		this.listenTo( this.model, 'change', this.render );
		// this.listenTo(this.model, 'destroy', this.remove);
	},

	render: function() {
		this.$el.html( this.template( this.model.toJSON() ) );
		return this;
	},

} );
