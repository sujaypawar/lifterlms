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
		$this->priority = 'high';

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
