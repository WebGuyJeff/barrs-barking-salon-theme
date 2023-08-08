<?php
// The Gallery Template Part for Barr's Barking salon
// 2023 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk

$bbs_settings = get_option( 'bbs_theme_array' );                                                          // Serialized array of all Options
if ( $bbs_settings ) {
	$bbs_title_gallery = $bbs_settings['bbs_title_gallery'] ? $bbs_settings['bbs_title_gallery'] : false; // Other Services Count
}
?>

<?php if ( isset( $bbs_title_gallery ) ) : ?>
	<h2 class="gallery_title"><?php echo $bbs_title_gallery; ?></h2>
<?php endif ?>

<div class="gallery_wrap">
	<!-- SimpLy homepage-gallery -->
	<?php echo do_shortcode( '[pgc_simply_gallery id="310"]' ); ?>
</div>
