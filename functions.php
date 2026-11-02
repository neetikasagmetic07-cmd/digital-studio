<?php
/**
 * Digital Studio theme setup.
 *
 * @package Digital_Studio
 */

function digital_studio_setup() {
	load_theme_textdomain( 'digital-studio', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus( array(
		'primary' => __( 'Header Menu', 'digital-studio' ),
		'footer'  => __( 'Footer Menu', 'digital-studio' ),
	) );
}
add_action( 'after_setup_theme', 'digital_studio_setup' );

function digital_studio_create_default_header_menu() {
	$locations = get_nav_menu_locations();

	if ( ! empty( $locations['primary'] ) ) {
		return;
	}

	$menu    = wp_get_nav_menu_object( 'Header Navigation' );
	$menu_id = $menu ? (int) $menu->term_id : wp_create_nav_menu( 'Header Navigation' );

	if ( is_wp_error( $menu_id ) ) {
		error_log( 'Digital Studio could not create the default header menu: ' . $menu_id->get_error_message() );
		return;
	}

	$items        = wp_get_nav_menu_items( $menu_id );
	$existing      = array();
	foreach ( $items ? $items : array() as $item ) {
		$existing[ $item->title ] = true;
	}

	$default_items = array(
		'Home'    => home_url( '/' ),
		'Service' => home_url( '/#service' ),
		'About'   => home_url( '/#about' ),
		'FAQ'     => home_url( '/#faq' ),
	);

	foreach ( $default_items as $title => $url ) {
		if ( isset( $existing[ $title ] ) ) {
			continue;
		}

		$item_id = wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-title'  => $title,
				'menu-item-url'    => $url,
				'menu-item-type'   => 'custom',
				'menu-item-status' => 'publish',
			)
		);

		if ( is_wp_error( $item_id ) ) {
			error_log( 'Digital Studio could not add the ' . $title . ' header menu item: ' . $item_id->get_error_message() );
		}
	}

	$locations['primary'] = (int) $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}
add_action( 'after_switch_theme', 'digital_studio_create_default_header_menu' );

require_once get_template_directory() . '/inc/acf-options.php';

function digital_studio_enqueue_styles() {
	wp_enqueue_style(
		'digital-studio-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'digital_studio_enqueue_styles' );
