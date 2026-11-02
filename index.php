<?php
/**
 * Main template.
 *
 * @package Digital_Studio
 */

get_header();
?>
<main id="main">
	<?php if ( is_home() || is_front_page() ) : ?>
		<section class="hero content-wrap" aria-labelledby="hero-title">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Ideas, work &amp; notes', 'digital-studio' ); ?></p>
				<h1 id="hero-title"><?php bloginfo( 'name' ); ?><br><em><?php esc_html_e( 'in focus.', 'digital-studio' ); ?></em></h1>
			</div>
			<p class="hero-copy"><?php echo esc_html( get_bloginfo( 'description' ) ?: __( 'A space for sharing the work, thinking, and stories that matter.', 'digital-studio' ) ); ?></p>
		</section>
		<div class="content-wrap">
			<div class="section-heading">
				<h2><?php esc_html_e( 'Latest stories', 'digital-studio' ); ?></h2>
				<span><?php esc_html_e( 'Selected from the journal', 'digital-studio' ); ?></span>
			</div>
		</div>
	<?php elseif ( is_archive() || is_search() ) : ?>
		<header class="content-wrap">
			<p class="eyebrow"><?php esc_html_e( 'Explore', 'digital-studio' ); ?></p>
			<h1 class="page-heading">
				<?php
				if ( is_search() ) {
					printf( esc_html__( 'Search: %s', 'digital-studio' ), esc_html( get_search_query() ) );
				} else {
					the_archive_title();
				}
				?>
			</h1>
		</header>
	<?php endif; ?>

	<div class="content-wrap">
		<div class="post-grid">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'post-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="post-card-image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
								<?php the_post_thumbnail( 'large' ); ?>
							</a>
						<?php endif; ?>
						<p class="post-card-meta"><?php echo esc_html( get_the_date() ); ?><?php if ( has_category() ) : ?> &middot; <?php the_category( ', ' ); ?><?php endif; ?></p>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="post-excerpt"><?php the_excerpt(); ?></div>
					</article>
				<?php endwhile; ?>
			<?php else : ?>
				<div class="empty-state">
					<h2><?php esc_html_e( 'A little room for what comes next.', 'digital-studio' ); ?></h2>
					<p><?php esc_html_e( 'There are no stories here yet. Check back soon for updates.', 'digital-studio' ); ?></p>
				</div>
			<?php endif; ?>
		</div>
		<?php the_posts_pagination( array( 'class' => 'pagination' ) ); ?>
	</div>
</main>
<?php
get_footer();
