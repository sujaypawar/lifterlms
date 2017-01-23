<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

class LLMS_Admin_Tutorials {

	/**
	 * Array of screens which can have tutorials
	 * @var  array
	 *       key => screen name
	 *       value => $_GET var to watch
	 */
	private $screens = array(
		'course' => 'tutorial',
	);

	/**
	 * Constructor
	 * @since    3.3.0
	 * @version  3.3.0
	 */
	public function __construct() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

	}

	/**
	 * Enqueue scripts and styles for the WP core pointer stuffs
	 * @return   void
	 * @since    3.3.0
	 * @version  3.3.0
	 */
	public function enqueue() {

		if ( $this->screen_has_tutorial() ) {

			wp_enqueue_style( 'wp-pointer' );
			wp_enqueue_script( 'wp-pointer' );

			add_action( 'admin_print_footer_scripts', array( $this, 'output_pointers' ) );

		}

	}

	private function get_course_pointers() {

		$pointers = array( 'pointers' => array(
			// 'title' => array(
			// 	'target'       => '#title',
			// 	'next'         => 'content',
			// 	'next_trigger' => array(
			// 		'target' => '#title',
			// 		'event'  => 'input',
			// 	),
			// 	'options'      => array(
			// 		'content'  => '<h3>' . esc_html__( 'Name your course', 'lifterlms' ) . '</h3>' .
			// 					   '<p>' . esc_html__( 'A successful course title is one that is brief and descriptive.', 'lifterlms' ) . '</p>',
			// 		'position' => array(
			// 			'edge'  => 'top',
			// 			'align' => 'left',
			// 		),
			// 	),
			// ),
			// 'content' => array(
			// 	'before_next'  => array(
			// 		'target' => '.llms-nav-item[data-tab="lifterlms-course-options-tab-2"]',
			// 		'event'  => 'click',
			// 	),
			// 	'target'       => '.llms-nav-item[data-tab="lifterlms-course-options-tab-1"]',
			// 	'next'         => 'general_settings',
			// 	'next_trigger' => array(
			// 		'target' => '.llms-nav-item[data-tab="lifterlms-course-options-tab-2"]',
			// 		'event'  => 'click',
			// 	),
			// 	'options'      => array(
			// 		'content'  => '<h3>' . esc_html__( 'Create Course descriptions', 'lifterlms' ) . '</h3>' .
			// 					   '<p>' . esc_html__( 'Your course can have two descrpitions. This allows you to display alternate content to students enrolled in the course.', 'lifterlms' ) . '</p>',
			// 		'position' => array(
			// 			'edge'  => 'bottom',
			// 			'align' => 'left',
			// 		),
			// 	),
			// ),
			// 'general_settings' => array(
			// 	'before_next'  => array(
			// 		'target' => '.llms-nav-item[data-tab="lifterlms-course-options-tab-3"]',
			// 		'event'  => 'click',
			// 	),
			// 	'target'       => '.llms-nav-item[data-tab="lifterlms-course-options-tab-2"]',
			// 	'next'         => 'restrictions',
			// 	'next_trigger' => array(
			// 		'target' => '.llms-nav-item[data-tab="lifterlms-course-options-tab-3"]',
			// 		'event'  => 'click',
			// 	),
			// 	'options'      => array(
			// 		'content'  => '<h3>' . esc_html__( 'Add general course information', 'lifterlms' ) . '</h3>' .
			// 					   '<p>' . esc_html__( 'These optional settings are displayed on course previews and help give your students some additional information.', 'lifterlms' ) . '</p>',
			// 		'position' => array(
			// 			'edge'  => 'bottom',
			// 			'align' => 'left',
			// 		),
			// 	),
			// ),
			// 'restrictions' => array(
			// 	'before_next'  => array(
			// 		'target' => '.llms-nav-item[data-tab="lifterlms-course-options-tab-4"]',
			// 		'event'  => 'click',
			// 	),
			// 	'target'       => '.llms-nav-item[data-tab="lifterlms-course-options-tab-3"]',
			// 	'next'         => 'reviews',
			// 	'next_trigger' => array(
			// 		'target' => '.llms-nav-item[data-tab="lifterlms-course-options-tab-4"]',
			// 		'event'  => 'click',
			// 	),
			// 	'options'      => array(
			// 		'content'  => '<h3>' . esc_html__( 'Add custom restrictions', 'lifterlms' ) . '</h3>' .
			// 					   '<p>' . esc_html__( 'With course restrictions you can set enrollment periods, define a prerequisite course, and limit the number of students who can enroll.', 'lifterlms' ) . '</p>' .
			// 					   '<p>' . esc_html__( 'You can also add custom error messages for each restriction so your students and visitors know the rules you define.', 'lifterlms' ) . '</p>',
			// 		'position' => array(
			// 			'edge'  => 'top',
			// 			'align' => 'left',
			// 		),
			// 	),
			// ),
			// 'reviews' => array(
			// 	'target'       => '.llms-nav-item[data-tab="lifterlms-course-options-tab-4"]',
			// 	'next'         => 'categories',
			// 	'next_trigger' => array(
			// 		'target' => '.llms-nav-item[data-tab="lifterlms-course-options-tab-5"]',
			// 		'event'  => 'click',
			// 	),
			// 	'options'      => array(
			// 		'content'  => '<h3>' . esc_html__( 'Testimonials and Feedback', 'lifterlms' ) . '</h3>' .
			// 					   '<p>' . esc_html__( 'Enabling course reviews allows you to get feedback from students enrolled in your course.', 'lifterlms' ) . '</p>' .
			// 					   '<p>' . esc_html__( 'You can choose whether of not you want reviews to be publicly displayed on your course.', 'lifterlms' ) . '</p>',
			// 		'position' => array(
			// 			'edge'  => 'top',
			// 			'align' => 'left',
			// 		),
			// 	),
			// ),
			// 'categories' => array(
			// 	'target'       => '#course_catdiv',
			// 	'next'         => 'tags',
			// 	'next_trigger' => array(),
			// 	'options'      => array(
			// 		'content'  => '<h3>' . esc_html__( 'Organize with Categories', 'lifterlms' ) . '</h3>' .
			// 					   '<p>' . esc_html__( 'Course categories allow you to organize courses into groups of related courses.', 'lifterlms' ) . '</p>' .
			// 					   '<p>' . esc_html__( 'Students can use categories to browse these groups.', 'lifterlms' ) . '</p>',
			// 		'position' => array(
			// 			'edge'  => 'right',
			// 			'align' => 'center',
			// 		),
			// 	),
			// ),
			// 'tags' => array(
			// 	'target'       => '#tagsdiv-course_tag',
			// 	'next'         => 'tracks',
			// 	'next_trigger' => array(),
			// 	'options'      => array(
			// 		'content'  => '<h3>' . esc_html__( 'Organize further with Tags', 'lifterlms' ) . '</h3>' .
			// 					   '<p>' . esc_html__( 'Like categories, course tags allow further course organization.', 'lifterlms' ) . '</p>',
			// 		'position' => array(
			// 			'edge'  => 'right',
			// 			'align' => 'center',
			// 		),
			// 	),
			// ),
			// 'tracks' => array(
			// 	'before_next'  => array(
			// 		'target' => '.llms-nav-item[data-tab="lifterlms-course-options-tab-4"]',
			// 		'event'  => 'click',
			// 	),
			// 	'target'       => '#course_trackdiv',
			// 	'next'         => 'access_plans',
			// 	'next_trigger' => array(),
			// 	'options'      => array(
			// 		'content'  => '<h3>' . esc_html__( 'Completable Categories', 'lifterlms' ) . '</h3>' .
			// 					   '<p>' . esc_html__( 'Tracks are a lot like categories but tracks can be utilized as a course prerequisite and can be used to trigger engagements like certificates and achievements.', 'lifterlms' ) . '</p>',
			// 		'position' => array(
			// 			'edge'  => 'right',
			// 			'align' => 'center',
			// 		),
			// 	),
			// ),
			'access_plans' => array(
				'before_next'  => array(
					'target' => '#llms-new-access-plan',
					'event'  => 'click',
				),
				'target'       => '#llms-new-access-plan',
				'next'         => 'access_plans_title',
				'next_trigger' => array(
					'target' => '#llms-new-access-plan',
					'event'  => 'click',
				),
				'options'      => array(
					'content'  => '<h3>' . esc_html__( 'Sell Your Course', 'lifterlms' ) . '</h3>' .
								   '<p>' . esc_html__( 'Access plans allow you to create flexible pricing plans students can use to gain access to your course.', 'lifterlms' ) . '</p>' .
								   '<p>' . esc_html__( 'You can create up to six plans per course and they will be displayed like a pricing table when visitors visit your course.', 'lifterlms' ) . '</p>',
					'position' => array(
						'edge'  => 'top',
						'align' => 'left',
					),
				),
			),
			'access_plans_title' => array(
				'target'       => 'input[name="_llms_plans[1][title]"]',
				'next'         => 'access_plans_button',
				'next_trigger' => array(
					'target' => 'input[name="_llms_plans[1][title]"]',
					'event'  => 'input',
				),
				'options'      => array(
					'content'  => '<h3>' . esc_html__( 'Give your plan a name', 'lifterlms' ) . '</h3>' .
								   '<p>' . esc_html__( 'Like your course, each access plan should have a great name!', 'lifterlms' ) . '</p>',
					'position' => array(
						'edge'  => 'bottom',
						'align' => 'left',
					),
				),
			),
			'access_plans_button' => array(
				'target'       => 'input[name="_llms_plans[1][enroll_text]"]',
				'next'         => 'access_plans_price',
				'next_trigger' => array(
					'target' => 'input[name="_llms_plans[1][enroll_text]"]',
					'event'  => 'input',
				),
				'options'      => array(
					'content'  => '<h3>' . esc_html__( 'Customize the button text', 'lifterlms' ) . '</h3>' .
								   '<p>' . esc_html__( 'You can create a unique call to action for each plan using the Enroll Text setting.', 'lifterlms' ) . '</p>',
					'position' => array(
						'edge'  => 'bottom',
						'align' => 'left',
					),
				),
			),
			'access_plans_price' => array(
				'target'       => 'input[name="_llms_plans[1][price]"]',
				'next'         => 'access_plans_frequency',
				'next_trigger' => array(
					'target' => 'input[name="_llms_plans[1][price]"]',
					'event'  => 'input',
				),
				'options'      => array(
					'content'  => '<h3>' . esc_html__( 'Set a price', 'lifterlms' ) . '</h3>' .
								   '<p>' . esc_html__( 'Here you can configure the price of your access plan.', 'lifterlms' ) . '</p>',
					'position' => array(
						'edge'  => 'bottom',
						'align' => 'left',
					),
				),
			),
			'access_plans_frequency' => array(
				'target'       => 'select[name="_llms_plans[1][frequency]"]',
				'next'         => 'access_plans_exipration',
				'next_trigger' => array(),
				'options'      => array(
					'content'  => '<h3>' . esc_html__( 'Subscribe or pay once?', 'lifterlms' ) . '</h3>' .
								   '<p>' . esc_html__( 'By changing the access plan frequency you can create recurring access plans that bill your student on a schedule.', 'lifterlms' ) . '</p>' .
								   '<p>' . esc_html__( 'Please note that not all LifterLMS Payment gateways support recurring payments!', 'lifterlms' ) . '</p>',
					'position' => array(
						'edge'  => 'bottom',
						'align' => 'left',
					),
				),
			),
			'access_plans_exipration' => array(
				'before_next'  => array(
					'target' => '#llms-outline-add',
					'event'  => 'click',
				),
				'target'       => 'select[name="_llms_plans[1][access_expiration]"]',
				'next'         => 'outline_start',
				'next_trigger' => array(),
				'options'      => array(
					'content'  => '<h3>' . esc_html__( 'Detemine length of access', 'lifterlms' ) . '</h3>' .
								   '<p>' . esc_html__( 'Configure how long a student can access the course once they have enrolled or subscrpibed.', 'lifterlms' ) . '</p>' .
								   '<p>' . esc_html__( 'A recurring access plan with lifetime access will lose access if they miss a payment!', 'lifterlms' ) . '</p>',
					'position' => array(
						'edge'  => 'bottom',
						'align' => 'left',
					),
				),
			),
			'outline_start' => array(
				'before_next'  => array(
					'target' => '#llms-outline-add',
					'event'  => 'click',
				),
				'target'       => '#llms-outline-add',
				'next'         => '',
				'next_trigger' => array(),
				'options'      => array(
					'content'  => '<h3>' . esc_html__( 'Outline Your Course', 'lifterlms' ) . '</h3>' .
								   '<p>' . esc_html__( 'Using the course outline, you can add sections and lessons to your course.', 'lifterlms' ) . '</p>' .
								   '<p>' . esc_html__( 'Sections only have a title and group lessons within a course and they can be used to trigger engagements when completed.', 'lifterlms' ) . '</p>' .
								   '<p>' . esc_html__( 'Lessons are the body of your course and have their content, settings, and optional restrictions.', 'lifterlms' ) . '</p>',
					'position' => array(
						'edge'  => 'top',
						'align' => 'left',
					),
				),
			),

		) );

		return $pointers;
	}

	/**
	 * Retrieve the pointers for the current screen and allow filtering
	 * @return   array
	 * @since    [version]
	 * @version  [version]
	 */
	public function get_pointers() {

		if ( ! $this->screen_has_tutorial() ) {
			return;
		}

		$screen = get_current_screen();

		switch ( $screen->id ) {

			case 'course':
				$pointers = $this->get_course_pointers();
			break;

			default:
				$pointers = array();

		}

		return apply_filters( 'llms_admin_tutorials_get_pointers', $pointers, $screen->id );

	}

	/**
	 * Get the array of screens with tutorials and enable filtering
	 * @return   array
	 * @since    [version]
	 * @version  [version]
	 */
	private function get_screens() {
		return apply_filters( 'llms_admin_tutorials_get_screens', $this->screens );
	}


	public function output_pointers() {
		$pointers = wp_json_encode( $this->get_pointers() );
		if ( ! $pointers ) {
			return;
		}
		?>
		<script type="text/javascript">
		;( function( $, undefined ) {
			var llms_pointers = <?php echo $pointers; ?>;
			console.log( llms_pointers );

			setTimeout( function() {
				$.each( llms_pointers.pointers, function( i ) {
					llms_show_pointer( i );
					return false;
				});
			}, 800 );

			function llms_show_pointer( id ) {
				var pointer = llms_pointers.pointers[ id ],
					options = $.extend( pointer.options, {
						pointerClass: 'wp-pointer llms-pointer',
						buttons: function( event, t ) {
							var close  = LLMS.l10n.translate( 'Next' ) || 'Next',
								button = $('<a class="llms-button-primary small" href="#">' + close + '</a>');

							return button.bind( 'click.pointer', function(e) {
								e.preventDefault();
								t.element.pointer('close');
							});
						},
						close: function() {
							if ( pointer.before_next ) {
								$( pointer.before_next.target ).trigger( pointer.before_next.event );
							}
							if ( pointer.next ) {
								llms_show_pointer( pointer.next );
							}
						}
					} ),
					this_pointer = $( pointer.target ).pointer( options );

				this_pointer.pointer( 'open' );
				if ( pointer.next_trigger ) {
					$( pointer.next_trigger.target ).on( pointer.next_trigger.event, function() {
						setTimeout( function() { this_pointer.pointer( 'close' ); }, 400 );
					});
				}
			}

		} )( jQuery );
		</script>
		<?php
	}

	/**
	 * Check if the current screen should load the necessary tutorial stuffs
	 * @return   boolean
	 * @since    3.3.0
	 * @version  3.3.0
	 */
	private function screen_has_tutorial() {
		$screen = get_current_screen();
		if ( in_array( $screen->id, array_keys( $this->get_screens() ) ) ) {
			if ( isset( $_GET[ $this->screens[ $screen->id ] ] ) ) {
				return true;
			}
		}
		return false;
	}

}

return new LLMS_Admin_Tutorials();
