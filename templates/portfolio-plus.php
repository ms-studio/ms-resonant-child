<?php
/**
 * Template Name: PortfolioPlus
 *
 * @package Resonant
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main portfolio-archive" role="main">

			<?php

				if ( have_posts() ) :

				while ( have_posts() ) : the_post();

					if ( '' != get_the_content() || get_theme_mod( 'portfolio_category_filter_setting', 1 ) ) : ?>

						<?php if ( '' != get_the_content()) { ?>
							<div class="portfolio-arch-content scrollable">
								<div class="verticalize">

									<div class="entry-content">
										<?php the_content(); ?>
									</div>


								</div>
							</div>
						<?php } ?>

					<?php

						endif;

					endwhile;

				endif;

				if ( get_query_var( 'paged' ) ) :
					$paged = get_query_var( 'paged' );
				elseif ( get_query_var( 'page' ) ) :
					$paged = get_query_var( 'page' );
				else :
					$paged = 1;
				endif;

				$args = array(
					'post_type'      => array('post', 'jetpack-portfolio'),
					'posts_per_page' => 10,
					'paged'          => $paged,
//					'orderby'        => 'date',
				);

				$wp_query = new WP_Query ( $args );

				if ( $wp_query->have_posts() ) : ?>

					<div class="scrollable portfolio-listing">

						<?php if ( get_theme_mod( 'portfolio_category_filter_setting', 1 ) ) {
							// Portfolio types filter
							resonant_category_filter();
						}
						?>

						<div class="row">
							<div class="portfolio-wrapper clear masonry" id="post-load">

								<div class="<?php resonant_grid_sizer_class(); ?>"></div>

								<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

									<?php get_template_part( 'templates/template-parts/content', 'portfolio-plus' ); ?>

								<?php endwhile; ?>

							</div><!-- .portfolio-wrapper -->
						</div><!-- .row -->

					</div><!-- .scrollable -->

					<?php
						wp_reset_postdata();

						// Archives numbered paging
						resonant_numbers_pagination();
					?>

				<?php else : ?>

					<section class="no-results not-found">

						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'resonant' ); ?></h1>
						</header>
						<div class="entry-content">
							<?php if ( current_user_can( 'publish_posts' ) ) : ?>

								<p><?php printf( wp_kses( __( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', 'resonant' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

							<?php else : ?>

								<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'resonant' ); ?></p>
								<?php get_search_form(); ?>
								<div class="search-instructions"><?php esc_html_e( 'Press Enter / Return to begin your search.', 'resonant' ); ?></div>

							<?php endif; ?>
						</div>

					</section>

				<?php endif; ?>

		</main>
	</div>

<?php get_footer(); ?>
