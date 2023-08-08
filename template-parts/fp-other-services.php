<?php
// The Other Services Template Part for Barr's Barking salon
// 2023 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk

$bbs_settings = get_option( 'bbs_theme_array' );                                                                                        // Serialized array of all Options
if ( $bbs_settings ) {
	$bbs_other_services_count     = $bbs_settings['bbs_other_services_count'] ? $bbs_settings['bbs_other_services_count'] : false;         // Other Services Count
	$bbs_title_secondary_services = $bbs_settings['bbs_title_secondary_services'] ? $bbs_settings['bbs_title_secondary_services'] : false; // Secondary Services Title
}
?>

<?php if ( isset( $bbs_title_secondary_services ) ) : ?>
	<div class="otherServices_title">
		<h2><?php echo $bbs_title_secondary_services; ?></h2>
	</div>
<?php endif ?>

<div class="otherServices_list">

	<?php

	$bbs_other_services_count = isset( $bbs_other_services_count ) ? $bbs_other_services_count : 3;

	$args = array(
		'post_type'      => 'service',
		'post_status'    => 'publish',
		'posts_per_page' => $bbs_other_services_count,
		'meta_key'       => 'bbs_position',
		'orderby'        => 'meta_value',
		'order'          => 'ASC',
		'cat'            => '7',
	);

	$loop = new WP_Query( $args );

	while ( $loop->have_posts() ) :
		$loop->the_post();
		?>

		<div class="otherServices_row gs_reveal">
			<div class="service">
				<header class="service_header">
					<?php $icon_id = get_field( 'bbs_icon' ); ?>
					<?php $icon_dir = get_attached_file( $icon_id ); ?>
					<div class="service_iconWrap"><?php echo file_get_contents( $icon_dir ); ?></div>

					<?php
					$title = the_title( '', '', false );
					$url   = sanitize_title( $title );
					?>

					<h3 class="service_title"><a href="/services/#<?php echo $url; ?>"><?php echo $title; ?></a></h3>

				</header>
				<pre class="service_description">

					<?php
					$trim      = '50';
					$read_more = '...<a class="readMore" href="/services/#' . $url . '"><i> read more </i><i class="fas fa-angle-double-right"></i></a>';
					echo force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( wpautop( get_the_content() ) ), $trim, $read_more ) ) );
					?>

				</pre>

				<footer class="service_footer">

					<?php
					// ACF Number
					$price = get_field( 'bbs_price' );

					// ACF True/False
					if ( get_field( 'show_homepage_price' ) && ! empty( $price ) ) {
						echo '<span class="service_price">' . '£' . get_field( 'bbs_price' ) . '</span>';
					} else {
						echo '<span class="service_price-empty"><a class="readMore" href="/services/#breed-pricelist">See Breed Pricelist</a></span>';
					}
					?>

				</footer>

			</div>
			<div class="otherServices_imgWrap">
				<?php $image = get_field( 'bbs_tile_image' ); ?>
				<?php if ( ! empty( $image ) ) : ?>
					<img class="otherServices_img" src="<?php echo $image; ?>" />
				<?php endif; ?>
			</div>
		</div>

	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>


</div>
