<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

class LLMS_Meta_Box_Quiz_Builder extends LLMS_Admin_Metabox {

	/**
	 * Configure the metabox settings
	 * @return void
	 * @since  3.0.0
	 */
	public function configure() {

		$this->id = 'lifterlms-quiz-builder';
		$this->title = __( 'Quiz Builder', 'lifterlms' );
		$this->screens = array(
			'llms_quiz',
		);
		$this->priority = 'default';

	}

	/**
	 * Not used
	 * @return   array
	 * @since    3.0.0
	 * @version  3.0.0
	 */
	public function get_fields() {
		return array();
	}

	/**
	 * output class.
	 *
	 * Displays MetaBox
	 * Calls class metabox_options
	 * Loops through meta-options array and displays appropriate fields based on type.
	 *
	 * @param  object $post [WP post object]
	 *
	 * @return void
	 *
	 * @version  3.0.0
	 */
	public function output() {
		?>
		<div id="llms-quiz-app">

			<header>
				<button class="llms-button-secondary small tester" type="button" value="multiple-single"><?php _e( 'Multiple Choice (Single)', 'lifterlms' ); ?></button>
				<button class="llms-button-secondary small tester" type="button" value="multiple"><?php _e( 'Multiple Choice (Multiple)', 'lifterlms' ); ?></button>
				<button class="llms-button-secondary small tester" type="button" value="true-false"><?php _e( 'True / False', 'lifterlms' ); ?></button>
			</header>

			<section id="llms-quiz-questions-list"></section>

		</div>

		<script type="text/template" id="llms-question-template">
			<div class="view">
				<label><%- title %></label>
				<a class="destroy"></a>
			</div>
		</script>
		<?php
	}

	/**
	 * save method
	 *
	 * cleans variables and saves using update_post_meta
	 *
	 * @param  int 		$post_id [id of post object]
	 *
	 * @return void
	 *
	 * @version  3.0.0
	 */
	public function save( $post_id ) {

	}

}
