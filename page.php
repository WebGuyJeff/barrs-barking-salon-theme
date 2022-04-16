<?php
/**
 * Barking Salon theme - page template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Barrs_Barking_Salon
 */

get_header();
?>

    <main class="site-main">

    	<?php
    	while ( have_posts() ):
    		the_post();

    		get_template_part( 'template-parts/content', 'page' );

    	endwhile;
    	?>

        <?php get_sidebar(); ?>

    </main>

<!-- page.php - Post Type: page -->
<?php
get_footer();
