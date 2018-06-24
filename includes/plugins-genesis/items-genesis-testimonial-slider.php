<?php

// includes/plugins-genesis/items-genesis-testimonial-slider

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_testimonial_slider', 115 );
/**
 * Items for Add-On: Genesis Testimonial Slider (free, by Frank Schrijvers, WPStudio)
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_testimonial_slider() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-genesis-testimonialslider',
			'parent' => 'theme-creative'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gts-all',
			'parent' => 'group-genesis-testimonialslider',
			'title'  => esc_attr__( 'All Testimonials', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=testimonial' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Testimonials', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gts-new',
			'parent' => 'group-genesis-testimonialslider',
			'title'  => esc_attr__( 'New Testimonial', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=testimonial' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'New Testimonial', 'toolbar-extras' )
			)
		)
	);

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'testimonial' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gts-builder',
				'parent' => 'group-genesis-testimonialslider',
				'title'  => esc_attr__( 'New Testimonial Builder', 'toolbar-extras' ),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'testimonial' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'New Testimonial Builder', 'toolbar-extras' )
				)
			)
		);

		/** For: WordPress "New Content" section within the Toolbar */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gts-with-builder',
				'parent' => 'new-testimonial',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'testimonial' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gts-settings',
			'parent' => 'group-genesis-testimonialslider',
			'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-testimonials' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
			)
		)
	);

	/** For: Manage Content in Site Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content-genesis-testimonial-slider',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Testimonials', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=testimonial' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Testimonials', 'toolbar-extras' )
			)
		)
	);

}  // end function