<?php
/**
 * Barking Salon theme - contact page template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Barrs_Barking_Salon
 */

 // Load theme settings variables for this document
$bbs_settings = get_option( 'bbs_theme_array' );                                                               // Serialized array of all Options
if ( $bbs_settings ) {
	$bbs_email_address  = $bbs_settings['bbs_email_address'] ? $bbs_settings['bbs_email_address'] : false;   // Email Address
	$bbs_street_address = $bbs_settings['bbs_street_address'] ? $bbs_settings['bbs_street_address'] : false; // Business Address
	$bbs_openstreetmap  = $bbs_settings['bbs_openstreetmap'] ? $bbs_settings['bbs_openstreetmap'] : false;   // OSM URL
	if ( isset( $bbs_settings['bbs_phone_number'] ) ) {
		$bbs_phone_number = $bbs_settings['bbs_phone_number'];                                                 // Phone Number
		$bbs_phone_href   = preg_replace( '/\s+/', '', $bbs_phone_number );                                    // Whitespace cleaned for url
	}
}

get_header();
?>

	<main class="site-main site-main-noside">

		<!-- Hidden anchor for contact form -->
		<a id="contactForm" style="visibility:hidden; width:0px;"></a>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile;
		?>

		<div class="row">
			<div class="column">

				<?php if ( isset( $bbs_street_address ) ) : ?>
					<div class="address">
						<h4 class="address_title"><?php bloginfo( 'name' ); ?></h4>
						<address class="address_body">
							<?php echo $bbs_street_address; ?>
						</address>
					</div>
				<?php endif ?>

			</div>
			<div class="column">

				<?php if ( isset( $bbs_email_address ) || isset( $bbs_phone_href ) ) : ?>
					<div class="contactBox">
						<?php if ( isset( $bbs_email_address ) ) : ?>
							<a class="contactBox_email" href="mailto:<?php echo $bbs_email_address; ?>"><i class="fas fa-envelope"></i> <?php echo $bbs_email_address; ?></a>
						<?php endif ?>
						<?php if ( isset( $bbs_phone_href ) ) : ?>
							<a class="contactBox_phone" href="tel:<?php echo $bbs_phone_href; ?>"><i class="fas fa-phone"></i> <?php echo $bbs_phone_number; ?></a>
						<?php endif ?>
					</div>
				<?php endif ?>

			</div>
		</div>

		<?php if ( isset( $bbs_openstreetmap ) ) : ?>
			<!-- Add Openstreetmap Map -->
			<iframe class="openstreetmap" width="1200" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $bbs_openstreetmap; ?>"></iframe>
		<?php endif ?>

		<section class="reviews">
			<?php get_template_part( 'template-parts/fp-reviews', 'none' ); ?>
		</section>

	</main>

<?php
get_footer();
