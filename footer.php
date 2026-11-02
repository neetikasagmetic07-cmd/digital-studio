<?php
/**
 * The footer template.
 *
 * @package Digital_Studio
 */
$footer_settings = function_exists( 'get_field' ) ? get_field( 'footer_settings', 'option' ) : array();
$footer_settings = is_array( $footer_settings ) ? $footer_settings : array();
$footer_logo_id  = isset( $footer_settings['logo'] ) ? absint( $footer_settings['logo'] ) : 0;
$header_settings = function_exists( 'get_field' ) ? get_field( 'header_settings', 'option' ) : array();
$header_settings = is_array( $header_settings ) ? $header_settings : array();
$header_logo_id  = isset( $header_settings['logo'] ) ? absint( $header_settings['logo'] ) : 0;
$site_logo_id    = get_theme_mod( 'custom_logo' );
$footer_logo_id  = $footer_logo_id ?: ( $header_logo_id ?: absint( $site_logo_id ) );
$copyright       = isset( $footer_settings['copyright'] ) && '' !== trim( $footer_settings['copyright'] )
	? $footer_settings['copyright']
	: sprintf( '© %s %s', gmdate( 'Y' ), get_bloginfo( 'name' ) );
?>
<footer class="site-footer">
	<div class="footer-main">
		<div class="footer-brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<?php if ( $footer_logo_id ) : ?>
					<?php echo wp_get_attachment_image( $footer_logo_id, 'full', false, array( 'class' => 'footer-logo' ) ); ?>
				<?php else : ?>
					<span class="site-mark" aria-hidden="true">D</span>
				<?php endif; ?>
			</a>
		</div>
		<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer navigation', 'digital-studio' ); ?>">
			<h2><?php esc_html_e( 'Explore', 'digital-studio' ); ?></h2>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => false,
				'fallback_cb'    => false,
				'depth'          => 1,
			) );
			?>
		</nav>
		<?php if ( ! empty( $footer_settings['about'] ) ) : ?>
			<div class="footer-about">
				<h2><?php esc_html_e( 'About', 'digital-studio' ); ?></h2>
				<p><?php echo nl2br( esc_html( $footer_settings['about'] ) ); ?></p>
			</div>
		<?php endif; ?>
		<div class="footer-contact">
			<h2><?php esc_html_e( 'Contact', 'digital-studio' ); ?></h2>
			<?php if ( ! empty( $footer_settings['email'] ) ) : ?>
				<p><a href="mailto:<?php echo esc_attr( sanitize_email( $footer_settings['email'] ) ); ?>"><?php echo esc_html( $footer_settings['email'] ); ?></a></p>
			<?php endif; ?>
			<?php if ( ! empty( $footer_settings['phone'] ) ) : ?>
				<?php $phone_link = preg_replace( '/[^0-9+*#,;]/', '', $footer_settings['phone'] ); ?>
				<p><a href="tel:<?php echo esc_attr( $phone_link ); ?>"><?php echo esc_html( $footer_settings['phone'] ); ?></a></p>
			<?php endif; ?>
			<?php if ( ! empty( $footer_settings['address'] ) ) : ?>
				<p><?php echo nl2br( esc_html( $footer_settings['address'] ) ); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<div class="footer-bottom">
		<p><?php echo esc_html( $copyright ); ?></p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
