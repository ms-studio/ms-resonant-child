<?php
/**
 * The template used for displaying projects on index view
 *
 * @package Resonant
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-plus-item'); ?>>

	<?php resonant_featured_image(); ?>

	<header class="entry-header">

		<?php

			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span></a></h1>' );

			?>

		<div class="entry-meta">
			<?php resonant_posted_on(); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php

	if ( has_post_thumbnail() ) {

		printf( '<a class="thickbox" rel="gallery" title="%1$s" href="%2$s"></a>',
			esc_attr( get_the_title() ),
			esc_url( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) )
		);

	}

	?>

</article><!-- #post-## -->

