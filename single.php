<?php
/**
 * Single post template.
 *
 * @package Digital_Studio
 */

get_header();
?>
<main id="main" class="content-wrap">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<p class="eyebrow"><?php echo esc_html( get_the_date() ); ?><?php if ( has_category() ) : ?> &middot; <?php the_category( ', ' ); ?><?php endif; ?></p>
			<h1 class="page-heading"><?php the_title(); ?></h1>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-content"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>
			<div class="entry-content"><?php the_content(); ?></div>
			<?php wp_link_pages(); ?>
		</article>
		<?php if ( comments_open() || get_comments_number() ) : ?>
			<div class="entry-content"><?php comments_template(); ?></div>
		<?php endif; ?>
	<?php endwhile; ?>
</main>
<?php
get_footer();
