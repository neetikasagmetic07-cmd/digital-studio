<?php
/**
 * Header and footer settings fields.
 *
 * @package Digital_Studio
 */

function digital_studio_register_settings_page() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	add_options_page(
		__( 'General Settings', 'digital-studio' ),
		__( 'General Settings', 'digital-studio' ),
		'edit_posts',
		'general-settings',
		'digital_studio_render_settings_page'
	);
}
add_action( 'admin_menu', 'digital_studio_register_settings_page' );

function digital_studio_prepare_settings_form() {
	if ( ! is_admin() || ! function_exists( 'acf_form_head' ) ) {
		return;
	}

	$page = isset( $_GET['page'] ) ? sanitize_key( wp_unslash( $_GET['page'] ) ) : '';
	if ( 'general-settings' === $page ) {
		acf_form_head();
	}
}
add_action( 'admin_init', 'digital_studio_prepare_settings_form', 1 );

function digital_studio_render_settings_page() {
	if ( ! function_exists( 'acf_form' ) ) {
		wp_die( esc_html__( 'Advanced Custom Fields must be active to edit these settings.', 'digital-studio' ) );
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'General Settings', 'digital-studio' ); ?></h1>
		<p><?php esc_html_e( 'Edit the announcement, header, and footer content displayed across the site. Manage navigation links under Appearance → Menus.', 'digital-studio' ); ?></p>
		<?php
		acf_form( array(
			'post_id'      => 'option',
			'field_groups' => array( 'group_digital_studio_header_footer' ),
			'submit_value' => __( 'Save General Settings', 'digital-studio' ),
		) );
		?>
	</div>
	<?php
}

function digital_studio_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'                   => 'group_digital_studio_home_page',
		'title'                 => __( 'Home Page Sections', 'digital-studio' ),
		'fields'                => array(
			array(
				'key'           => 'field_digital_studio_home_hero_image',
				'label'         => __( 'Banner background image', 'digital-studio' ),
				'name'          => 'home_hero_image',
				'type'          => 'image',
				'return_format' => 'id',
				'preview_size'  => 'large',
				'library'       => 'all',
			),
			array(
				'key'           => 'field_digital_studio_home_hero_heading',
				'label'         => __( 'Banner heading', 'digital-studio' ),
				'name'          => 'home_hero_heading',
				'type'          => 'text',
				'default_value' => 'Ideas into impact.',
			),
			array(
				'key'           => 'field_digital_studio_home_hero_description',
				'label'         => __( 'Banner short description', 'digital-studio' ),
				'name'          => 'home_hero_description',
				'type'          => 'textarea',
				'rows'          => 3,
				'default_value' => 'We bring thoughtful strategy, creative design, and digital craft together to help your business move forward.',
			),
			array(
				'key'           => 'field_digital_studio_home_about_image',
				'label'         => __( 'About section image', 'digital-studio' ),
				'name'          => 'home_about_image',
				'type'          => 'image',
				'return_format' => 'id',
				'preview_size'  => 'large',
				'library'       => 'all',
			),
			array(
				'key'           => 'field_digital_studio_home_about_heading',
				'label'         => __( 'About section heading', 'digital-studio' ),
				'name'          => 'home_about_heading',
				'type'          => 'text',
				'default_value' => 'Good work starts with a good partnership.',
			),
			array(
				'key'           => 'field_digital_studio_home_about_content',
				'label'         => __( 'About short content', 'digital-studio' ),
				'name'          => 'home_about_content',
				'type'          => 'textarea',
				'rows'          => 5,
				'default_value' => 'We are an independent digital studio helping ambitious teams turn big ideas into useful, memorable experiences. We bring curiosity, care, and clear thinking to every project.',
			),
			array(
				'key'           => 'field_digital_studio_home_services_heading',
				'label'         => __( 'Services section heading', 'digital-studio' ),
				'name'          => 'home_services_heading',
				'type'          => 'text',
				'default_value' => 'How we can help',
			),
			array(
				'key'           => 'field_digital_studio_home_service_1_title',
				'label'         => __( 'Service 1 title', 'digital-studio' ),
				'name'          => 'home_service_1_title',
				'type'          => 'text',
				'default_value' => 'Strategy',
			),
			array(
				'key'           => 'field_digital_studio_home_service_1_content',
				'label'         => __( 'Service 1 description', 'digital-studio' ),
				'name'          => 'home_service_1_content',
				'type'          => 'textarea',
				'rows'          => 3,
				'default_value' => 'Find the right direction with clear research, smart planning, and a practical roadmap built around your goals.',
			),
			array(
				'key'           => 'field_digital_studio_home_service_2_title',
				'label'         => __( 'Service 2 title', 'digital-studio' ),
				'name'          => 'home_service_2_title',
				'type'          => 'text',
				'default_value' => 'Design',
			),
			array(
				'key'           => 'field_digital_studio_home_service_2_content',
				'label'         => __( 'Service 2 description', 'digital-studio' ),
				'name'          => 'home_service_2_content',
				'type'          => 'textarea',
				'rows'          => 3,
				'default_value' => 'Create an engaging, accessible identity and digital experience that feels distinctive and works beautifully.',
			),
			array(
				'key'           => 'field_digital_studio_home_service_3_title',
				'label'         => __( 'Service 3 title', 'digital-studio' ),
				'name'          => 'home_service_3_title',
				'type'          => 'text',
				'default_value' => 'Development',
			),
			array(
				'key'           => 'field_digital_studio_home_service_3_content',
				'label'         => __( 'Service 3 description', 'digital-studio' ),
				'name'          => 'home_service_3_content',
				'type'          => 'textarea',
				'rows'          => 3,
				'default_value' => 'Build a fast, reliable website with thoughtful details that make it easier for your team to grow.',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'page-home.php',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'show_in_rest'          => 0,
	) );

	acf_add_local_field_group( array(
		'key'                   => 'group_digital_studio_header_footer',
		'title'                 => __( 'Header & Footer', 'digital-studio' ),
		'fields'                => array(
			array(
				'key'        => 'field_digital_studio_header_settings',
				'label'      => __( 'Header', 'digital-studio' ),
				'name'       => 'header_settings',
				'type'       => 'group',
				'layout'     => 'block',
				'sub_fields' => array(
					array(
						'key'   => 'field_digital_studio_announcement',
						'label' => __( 'Announcement bar text', 'digital-studio' ),
						'name'  => 'announcement',
						'type'  => 'text',
					),
					array(
						'key'           => 'field_digital_studio_header_logo',
						'label'         => __( 'Logo image', 'digital-studio' ),
						'name'          => 'logo',
						'type'          => 'image',
						'return_format' => 'id',
						'preview_size'  => 'medium',
						'library'       => 'all',
					),
					array(
						'key'           => 'field_digital_studio_contact_text',
						'label'         => __( 'Contact button text', 'digital-studio' ),
						'name'          => 'contact_text',
						'type'          => 'text',
						'default_value' => 'Contact Us',
					),
					array(
						'key'   => 'field_digital_studio_contact_link',
						'label' => __( 'Contact button link', 'digital-studio' ),
						'name'  => 'contact_link',
						'type'  => 'url',
					),
				),
			),
			array(
				'key'        => 'field_digital_studio_footer_settings',
				'label'      => __( 'Footer', 'digital-studio' ),
				'name'       => 'footer_settings',
				'type'       => 'group',
				'layout'     => 'block',
				'sub_fields' => array(
					array(
						'key'           => 'field_digital_studio_footer_logo',
						'label'         => __( 'Logo image', 'digital-studio' ),
						'name'          => 'logo',
						'type'          => 'image',
						'return_format' => 'id',
						'preview_size'  => 'medium',
						'library'       => 'all',
					),
					array(
						'key'           => 'field_digital_studio_footer_about',
						'label'         => __( 'About short content', 'digital-studio' ),
						'name'      => 'about',
						'type'      => 'textarea',
						'rows'      => 4,
					),
					array(
						'key'   => 'field_digital_studio_footer_email',
						'label' => __( 'Email address', 'digital-studio' ),
						'name'  => 'email',
						'type'  => 'email',
					),
					array(
						'key'   => 'field_digital_studio_footer_phone',
						'label' => __( 'Phone number', 'digital-studio' ),
						'name'  => 'phone',
						'type'  => 'text',
					),
					array(
						'key'       => 'field_digital_studio_footer_address',
						'label'     => __( 'Address', 'digital-studio' ),
						'name'      => 'address',
						'type'      => 'textarea',
						'rows'      => 3,
					),
					array(
						'key'           => 'field_digital_studio_footer_copyright',
						'label'         => __( 'Copyright text', 'digital-studio' ),
						'name'          => 'copyright',
						'type'          => 'text',
						'default_value' => '© ' . gmdate( 'Y' ) . ' ' . get_bloginfo( 'name' ),
					),
				),
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'general-settings',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'show_in_rest'          => 0,
	) );
}
add_action( 'acf/init', 'digital_studio_register_acf_fields' );
