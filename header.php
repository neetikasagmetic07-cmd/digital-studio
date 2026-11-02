<?php
/**
 * The header template.
 *
 * @package Digital_Studio
 */
 $header_settings = function_exists( 'get_field' ) ? get_field( 'header_settings', 'option' ) : array();
 $header_settings = is_array( $header_settings ) ? $header_settings : array();
 $header_logo_id  = isset( $header_settings['logo'] ) ? absint( $header_settings['logo'] ) : 0;
 $site_logo_id    = get_theme_mod( 'custom_logo' );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'digital-studio' ); ?></a>
<?php if ( ! empty( $header_settings['announcement'] ) ) : ?>
	<div class="announcement-bar"><?php echo esc_html( $header_settings['announcement'] ); ?></div>
<?php endif; ?>
<header class="site-header">
	<a class="site-branding" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<?php if ( $header_logo_id ) : ?>
			<?php echo wp_get_attachment_image( $header_logo_id, 'full', false, array( 'class' => 'site-branding-image' ) ); ?>
		<?php elseif ( $site_logo_id ) : ?>
			<?php echo wp_get_attachment_image( $site_logo_id, 'full', false, array( 'class' => 'site-branding-image' ) ); ?>
		<?php else : ?>
			<span class="site-mark" aria-hidden="true">D</span>
		<?php endif; ?>
		<span class="site-title"><?php bloginfo( 'name' ); ?></span>
	</a>
	<nav class="site-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'digital-studio' ); ?>">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'fallback_cb'    => false,
			'depth'          => 1,
		) );
		?>
	</nav>
	<?php if ( ! empty( $header_settings['contact_text'] ) && ! empty( $header_settings['contact_link'] ) ) : ?>
		<a class="header-cta" href="<?php echo esc_url( $header_settings['contact_link'] ); ?>">
			<?php echo esc_html( $header_settings['contact_text'] ); ?>
		</a>
	<?php endif; ?>
</header>
