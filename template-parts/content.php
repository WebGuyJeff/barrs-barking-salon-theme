<?php
/**
 * Barking Salon theme - Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Barrs_Barking_Salon
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h3>content.php</h3>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
        ?>

	</header>

	<?php barrs_barking_salon_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'barrs-barking-salon' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
	</div>

	<footer class="entry-footer">
		<?php barrs_barking_salon_entry_footer(); ?>
	</footer>

</article>
<!-- content.php -->
