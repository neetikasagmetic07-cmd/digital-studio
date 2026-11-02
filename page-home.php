<?php
/**
 * Template Name: Home Page
 * Template Post Type: page
 *
 * @package Digital_Studio
 */

get_header();

$hero_image_id = function_exists( 'get_field' ) ? absint( get_field( 'home_hero_image' ) ) : 0;
$hero_image    = $hero_image_id ? wp_get_attachment_image_url( $hero_image_id, 'full' ) : '';
$hero_heading  = function_exists( 'get_field' ) ? get_field( 'home_hero_heading' ) : '';
$hero_heading  = $hero_heading ?: __( 'Ideas into impact.', 'digital-studio' );
$hero_description = function_exists( 'get_field' ) ? get_field( 'home_hero_description' ) : '';
$hero_description = $hero_description ?: __( 'We bring thoughtful strategy, creative design, and digital craft together to help your business move forward.', 'digital-studio' );

$about_image_id = function_exists( 'get_field' ) ? absint( get_field( 'home_about_image' ) ) : 0;
$about_heading  = function_exists( 'get_field' ) ? get_field( 'home_about_heading' ) : '';
$about_heading  = $about_heading ?: __( 'Good work starts with a good partnership.', 'digital-studio' );
$about_content  = function_exists( 'get_field' ) ? get_field( 'home_about_content' ) : '';
$about_content  = $about_content ?: __( 'We are an independent digital studio helping ambitious teams turn big ideas into useful, memorable experiences. We bring curiosity, care, and clear thinking to every project.', 'digital-studio' );
$services_heading = function_exists( 'get_field' ) ? get_field( 'home_services_heading' ) : '';
$services_heading = $services_heading ?: __( 'How we can help', 'digital-studio' );

$services = array(
	array(
		'title'       => function_exists( 'get_field' ) ? get_field( 'home_service_1_title' ) : '',
		'description' => function_exists( 'get_field' ) ? get_field( 'home_service_1_content' ) : '',
		'default_title' => __( 'Strategy', 'digital-studio' ),
		'default_description' => __( 'Find the right direction with clear research, smart planning, and a practical roadmap built around your goals.', 'digital-studio' ),
	),
	array(
		'title'       => function_exists( 'get_field' ) ? get_field( 'home_service_2_title' ) : '',
		'description' => function_exists( 'get_field' ) ? get_field( 'home_service_2_content' ) : '',
		'default_title' => __( 'Design', 'digital-studio' ),
		'default_description' => __( 'Create an engaging, accessible identity and digital experience that feels distinctive and works beautifully.', 'digital-studio' ),
	),
	array(
		'title'       => function_exists( 'get_field' ) ? get_field( 'home_service_3_title' ) : '',
		'description' => function_exists( 'get_field' ) ? get_field( 'home_service_3_content' ) : '',
		'default_title' => __( 'Development', 'digital-studio' ),
		'default_description' => __( 'Build a fast, reliable website with thoughtful details that make it easier for your team to grow.', 'digital-studio' ),
	),
);
?>
<main id="main" class="home-page">
	<section class="home-hero<?php echo $hero_image ? ' has-background-image' : ''; ?>"<?php if ( $hero_image ) : ?> style="background-image: linear-gradient(90deg, rgba(17, 29, 24, .78), rgba(17, 29, 24, .16)), url('<?php echo esc_url( $hero_image ); ?>');"<?php endif; ?> aria-labelledby="home-hero-title">
		<div class="home-hero-content">
			<p class="eyebrow"><?php esc_html_e( 'Digital Studio', 'digital-studio' ); ?></p>
			<h1 id="home-hero-title"><?php echo esc_html( $hero_heading ); ?></h1>
			<p class="home-hero-description"><?php echo esc_html( $hero_description ); ?></p>
		</div>
	</section>

	<section class="home-about content-wrap" id="about" aria-labelledby="home-about-title">
		<div class="home-about-image">
			<?php if ( $about_image_id ) : ?>
				<?php echo wp_get_attachment_image( $about_image_id, 'large', false, array( 'loading' => 'lazy' ) ); ?>
			<?php else : ?>
				<div class="home-image-placeholder" aria-hidden="true"><span><?php esc_html_e( 'About us', 'digital-studio' ); ?></span></div>
			<?php endif; ?>
		</div>
		<div class="home-about-copy">
			<p class="eyebrow"><?php esc_html_e( 'A little about us', 'digital-studio' ); ?></p>
			<h2 id="home-about-title"><?php echo esc_html( $about_heading ); ?></h2>
			<div class="home-about-content"><?php echo wp_kses_post( wpautop( $about_content ) ); ?></div>
		</div>
	</section>

	<section class="home-services content-wrap" id="service" aria-labelledby="home-services-title">
		<div class="home-section-heading">
			<p class="eyebrow"><?php esc_html_e( 'What we do', 'digital-studio' ); ?></p>
			<h2 id="home-services-title"><?php echo esc_html( $services_heading ); ?></h2>
		</div>
		<div class="home-service-grid">
			<?php foreach ( $services as $index => $service ) : ?>
				<article class="home-service-card">
					<span class="home-service-number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<h3><?php echo esc_html( $service['title'] ?: $service['default_title'] ); ?></h3>
					<p><?php echo esc_html( $service['description'] ?: $service['default_description'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</section>
</main>
<?php
get_footer();
