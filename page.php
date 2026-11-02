<?php
/**
 * Page template.
 *
 * @package Digital_Studio
 */

get_header();
?>
<main id="main" class="content-wrap">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<p class="eyebrow"><?php esc_html_e( 'Page', 'digital-studio' ); ?></p>
			<h1 class="page-heading"><?php the_title(); ?></h1>
			<div class="entry-content"><?php the_content(); ?></div>
			<?php wp_link_pages(); ?>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
