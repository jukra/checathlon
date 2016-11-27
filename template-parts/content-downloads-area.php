<?php
/**
 * Downloads area content.
 *
 * @package Checathlon
 */

// Downloads Query.
$downloads = new WP_Query( apply_filters( 'checathlon_downloads_area_downloads', array(
	'post_type'      => 'download',
	'posts_per_page' => 2,
	'no_found_rows'  => true,
	'post__not_in'   => array( get_the_ID() ),
) ) );

if ( $downloads->have_posts() ) : ?>

	<div id="downloads-area" class="downloads-area">
		<div class="wrapper">

		<div class="grid-wrapper grid-wrapper-2 grid-wrapper-downloads">

			<?php
				while ( $downloads->have_posts() ) : $downloads->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry-inner-wrapper">

						<?php
							// Get featured image as post background image.
							echo checathlon_get_bg_header( array( 'size' => 'checathlon-product', 'icon' => 'download' ) );
						?>

						<div class="entry-inner">

							<header class="entry-header">
								<?php
									the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								?>
							</header><!-- .entry-header -->

							<div class="entry-summary">
								<?php
									echo '<p class="product-price-p product-price soft-color medium-font-weight">' . checathlon_get_download_price() . '</p>';

									the_excerpt();
								?>
							</div><!-- .entry-summary -->

						</div><!-- .entry-inner -->

						<?php
							get_template_part( 'misc/entry', 'product-info' );
						?>

					</div><!-- .entry-inner-wrapper -->

				</article><!-- #post-## -->

			<?php
				endwhile;
			?>

		</div><!-- .grid-wrapper -->

	</div><!-- .wrapper -->
	</div><!-- .downloads-area -->

<?php
	endif; // End loop.
	wp_reset_postdata(); // Reset post data.
