<?php
// The Social Widget Template Part for Barr's Barking salon
// 2023 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk

// Load theme settings variables for this document
$bbs_settings = get_option( 'bbs_theme_array' );                                                                               // Serialized array of all Options
if ( $bbs_settings ) {
	$bbs_social_url_facebook  = $bbs_settings['bbs_social_url_facebook'] ? $bbs_settings['bbs_social_url_facebook'] : false;   // Facebook URL
	$bbs_social_url_instagram = $bbs_settings['bbs_social_url_instagram'] ? $bbs_settings['bbs_social_url_instagram'] : false; // Instagram URL
}
?>

<?php if ( isset( $bbs_social_url_facebook ) || isset( $bbs_social_url_instagram ) ) : ?>
	<h3 id="social" class="sidebar_title">Follow Me</h3>
	<div class="social">
		<!-- inline the social icons -->
		<?php if ( isset( $bbs_social_url_facebook ) ) : ?>
			<a class="social_link" aria-label="Follow Barr's Barking Salon on Facebook" title="Follow Barr's Barking Salon on Facebook" target="_blank" href="<?php echo $bbs_social_url_facebook; ?>">
				<?php echo file_get_contents( get_template_directory() . '/images/social_icon-facebook.svg' ); ?>
			</a>
		<?php endif ?>
		<?php if ( isset( $bbs_social_url_instagram ) ) : ?>
			<a class="social_link" aria-label="Follow Barr's Barking Salon on Instagram" title="Follow Barr's Barking Salon on Instagram" target="_blank" href="<?php echo $bbs_social_url_instagram; ?>">
				<?php echo file_get_contents( get_template_directory() . '/images/social_icon-instagram.svg' ); ?>
			</a>
		<?php endif ?>
	</div>
<?php endif ?>
