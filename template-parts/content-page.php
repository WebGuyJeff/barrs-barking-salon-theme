<?php
/**
 * Barking Salon theme - content template for page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Barrs_Barking_Salon
 */

?>

<article class="article" id="post-<?php the_ID(); ?>">

    <?php barrs_barking_salon_post_thumbnail(); ?>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header>
	<div class="entry-content">

        <?php the_content(); ?>

	</div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">

			<?php edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'barrs-barking-salon' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			); ?>

		</footer>
	<?php endif; ?>

</article>
