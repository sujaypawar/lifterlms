var Questions = new QuestionList;

var QuizApp = Backbone.View.extend( {

	el: $( '#llms-quiz-app' ),

    events: {
		"click .tester": "createNewQuestion",
    },

    initialize: function() {

		this.listenTo( Questions, 'add', this.addOne );

    },

    addOne: function( question ) {

		var view = new QuestionView( { model: question } );

		this.$( '#llms-quiz-questions-list' ).append( view.render().el );

    },

    createNewQuestion: function( e ) {

    	Questions.create( {
    		title: 'wut',
    	} );

    },

} );

var App = new QuizApp();
