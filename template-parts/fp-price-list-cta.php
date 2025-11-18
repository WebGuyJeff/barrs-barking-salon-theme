<?php
// The Price List CTA Template Part for Barr's Barking salon
// 2023 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://webguyjeff.com

$bbs_settings = get_option( 'bbs_theme_array' ); // Serialized array of all Options
if ( $bbs_settings ) {
	$bbs_title_pricelist_cta = $bbs_settings['bbs_title_pricelist_cta'] ? $bbs_settings['bbs_title_pricelist_cta'] : false; // Other Services Count
}
?>

<?php if ( isset( $bbs_title_pricelist_cta ) ) : ?>
	<h4 class="priceListCta_title"><?php echo $bbs_title_pricelist_cta; ?></h4>
<?php endif ?>

<button class="button button-outline"
		type="button"
		onclick="location.href='/services/#pricelist';"
		value="View Full Price List"
		aria-label="View Full Price List">
		<i class="fas fa-paw"></i>
		View Full Price List
</button>
