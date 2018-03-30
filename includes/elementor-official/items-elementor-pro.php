<?php

// items-elementor-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'WPINC' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}

add_action( 'tbex_before_elementor_library_new', 'ddw_tbex_items_elementor_pro_library_types' );
/**
 * Items for Elementor Library - Pro-only Item(s).
 *   NOTE: Use of tbex_ action hook to place higher/lower within Elementor Library stack.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_is_elementor_version()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_library_types() {

	/** Display only for Elementor 2.0+ */
	if ( ! ddw_tbex_is_elementor_version( 'pro', '2.0.0-beta1', '>=' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-widgets',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Widgets', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=widget' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Widget Blocks', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-headers',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Header', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=header' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Header Sections', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-footers',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Footer', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=footer' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Footer Sections', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-single',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Single', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=single' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Single Content Blocks', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-archives',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Archive', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=archive' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Archive Content Blocks', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_pro', 100 );
/**
 * Add Elementor Pro items
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro() {

	/** Pro: Integrations */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-settings-integrations',
			'parent' => 'elementor-settings',
			'title'  => esc_attr__( 'Pro: Integrations', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor#tab-integrations' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Pro: Integrations &amp; APIs', 'toolbar-extras' )
			)
		)
	);

	/** Pro: License */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-tools-license',
			'parent' => 'elementor-tools',
			'title'  => esc_attr__( 'Pro: License', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-license' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Pro: License', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_pro_fonts', 130 );
/**
 * Add Elementor Pro - Custom Fonts items
 *   NOTE: Later hook priority to place lower within the active theme stack.
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_fonts() {
	
	/** Group: Pro Custom Fonts */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-elementor-fonts',
			'parent' => 'elementor-library'
		)
	);

	/** Pro: Custom Fonts */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-fonts-all',
			'parent' => 'group-elementor-fonts',
			'title'  => esc_attr__( 'All Fonts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_font' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Fonts', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-fonts-new',
			'parent' => 'group-elementor-fonts',
			'title'  => esc_attr__( 'New Font', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=elementor_font' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Upload New Font', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'tbex_after_elementor_resources', 'ddw_tbex_items_elementor_pro_resources' );
/**
 * Items for Elementor Pro resources.
 *   NOTE: Use of tbex_ action hook to place lower within Elementor Resources stack.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_resources() {
	
	/** Bail early if resources display is disabled */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Add Toolbar nodes */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'epro-resources',
			'parent' => 'group-pagebuilder-resources',
			'title'  => esc_attr__( 'Pro Resources', 'toolbar-extras' ),
			'href'   => 'https://docs.elementor.com/collection/147-elementor-pro',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Pro Resources', 'toolbar-extras' )
			)
		)
	);

		ddw_tbex_resource_item(
			'pro-docs',
			'epro-resources-docs',
			'epro-resources',
			'https://docs.elementor.com/collection/147-elementor-pro'
		);

		ddw_tbex_resource_item(
			'translations-pro',
			'epro-resources-translate',
			'epro-resources',
			'https://translate.elementor.com/'
		);

		ddw_tbex_resource_item(
			'my-account',
			'epro-my-account',
			'epro-resources',
			'https://my.elementor.com/',
			/* translators: %s - static string "@ elementor.com" (My Account @ elementor.com) */
			sprintf( esc_attr__( 'My Account %s', 'toolbar-extras' ), '@ elementor.com' )
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_pro_developers', 99 );
/**
 * Add Elementor Pro external developers items
 *   NOTE: Only when Dev Mode & Resources are activated.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_dev_mode()
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_developers() {

	/** Bail early if Dev Mode & Resources display are disabled */
	if ( ! ddw_tbex_display_items_dev_mode() && ! ddw_tbex_display_items_resources() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-apis',
		'elementor-developers-apis',
		'elementor-developers',
		'https://developers.elementor.com/elementor-pro-apis/'
	);

}  // end function