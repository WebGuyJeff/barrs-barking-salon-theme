<?php
// The Footer Template for Barr's Barking salon
// 2023 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk

// Load theme settings variables for this document
$bbs_settings = get_option( 'bbs_theme_array' );                                                                               // Serialized array of all Options
if ( $bbs_settings ) {
	$bbs_email_address        = $bbs_settings['bbs_email_address'] ? $bbs_settings['bbs_email_address'] : false;               // Email Address
	$bbs_social_url_facebook  = $bbs_settings['bbs_social_url_facebook'] ? $bbs_settings['bbs_social_url_facebook'] : false;   // Facebook URL
	$bbs_social_url_instagram = $bbs_settings['bbs_social_url_instagram'] ? $bbs_settings['bbs_social_url_instagram'] : false; // Instagram URL
	$bbs_url_cityguilds       = $bbs_settings['bbs_url_cityguilds'] ? $bbs_settings['bbs_url_cityguilds'] : false;             // City and Guilds URL
	if ( isset( $bbs_settings['bbs_phone_number'] ) ) {
		$bbs_phone_number = $bbs_settings['bbs_phone_number'];                                                                 // Phone Number
		$bbs_phone_href   = preg_replace( '/\s+/', '', $bbs_phone_number );                                                    // Whitespace cleaned for url
	}
}
?>

	<footer id="colophon" class="site-footer">

		<div class="footer_left">

			<!-- Create the secondary nav location -->
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'menu-2',
					'menu_id'         => 'footer-menu',
					'container_class' => 'footer-navigation',
				)
			);
			?>

			<div class="footer_contactBox">

				<?php if ( isset( $bbs_email_address ) ) : ?>
					<a class="footer_email" href="mailto:<?php echo $bbs_email_address; ?>"><i class="fas fa-envelope"></i> <?php echo $bbs_email_address; ?></a>
				<?php endif ?>

				<?php if ( isset( $bbs_phone_href ) ) : ?>
					<a class="footer_phone" href="tel:<?php echo $bbs_phone_href; ?>"><i class="fas fa-phone"></i> <?php echo $bbs_phone_number; ?></a>
				<?php endif ?>

			</div>
		</div>
		<div class="footer_middle">

			<?php if ( isset( $bbs_social_url_facebook ) || isset( $bbs_social_url_instagram ) ) : ?>
				<div class="footer_social">
					<h5 class="footer_socialTitle">Follow Me</h5>
					<div class="social">

						<?php if ( isset( $bbs_social_url_facebook ) ) : ?>
							<a class="social_link" aria-label="Follow Toolbelt on Facebook" title="Follow Toolbelt on Facebook" target="_blank" href="<?php echo $bbs_social_url_facebook; ?>">
								<?php echo file_get_contents( get_template_directory() . '/images/social_icon-facebook.svg' ); ?>
							</a>
						<?php endif ?>

						<?php if ( isset( $bbs_social_url_instagram ) ) : ?>
							<a class="social_link" aria-label="Follow Toolbelt on Instagram" title="Follow Toolbelt on Instagram" target="_blank" href="<?php echo $bbs_social_url_instagram; ?>">
								<?php echo file_get_contents( get_template_directory() . '/images/social_icon-instagram.svg' ); ?>
							</a>
						<?php endif ?>

					</div>
				</div>
			<?php endif ?>

		</div>
		<div class="footer_right">

			<?php if ( isset( $bbs_url_cityguilds ) ) : ?>
				<div class="footer_qualificationWrap">
					<a class="cg_link" aria-label="City and Guilds Qualified" title="City and Guilds Qualified" target="_blank" href="<?php echo $bbs_url_cityguilds; ?>">
						<?php echo file_get_contents( get_template_directory() . '/images/city_and_guilds_logo.svg' ); ?>
					</a>
				</div>
			<?php endif ?>

			<span class="footer_copyright">&copy; <?php echo date( 'Y' ); ?> <?php echo file_get_contents( get_template_directory() . '/images/rosie.svg' ); ?> Toolbelt</span>
		</div>

		<div id="footer_backlink" aria-label="Visit WebGuyJeff.com for Websites, hosting and domains" title="Visit WebGuyJeff.com for Websites, hosting and domains" style="display: flex; justify-content: center; width: 100%; font-family: sans-serif; font-size: 1rem; font-weight: 400;">
			<p>Website by <a style="color: #f8f801; text-decoration: none; font-weight: 600; letter-spacing: -0.03rem;" href="https://webguyjeff.com/" target="_blank" rel="noopener">Web Guy Jeff</a></p>
		</div>

	</footer>

</div>
<!-- PAGE GRID END -->

<a class="nav_backup" title="Back to top" href="#"><i class="fas fa-arrow-circle-up"></i></a>

<!-- svg fill patterns -->
<?php echo file_get_contents( get_template_directory() . '/images/patterns.svg' ); ?>

<?php wp_footer(); ?>

</body>
</html>
