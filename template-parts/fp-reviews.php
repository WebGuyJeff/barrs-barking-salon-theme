<?php
// The Reviews Template Part for Barr's Barking salon
// 2023 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk

$bbs_settings = get_option( 'bbs_theme_array' );                                                          // Serialized array of all Options
if ( $bbs_settings ) {
	$bbs_title_reviews = $bbs_settings['bbs_title_reviews'] ? $bbs_settings['bbs_title_reviews'] : false; // Other Services Count
}

if ( isset( $bbs_title_reviews ) ) : ?>
	<h2 class="bbs_title_reviews"><?php echo $bbs_title_reviews; ?></h2>
<?php endif ?>

<div class="reviewWrap">

	<?php

	$bbs_review_count = isset( $bbs_review_count ) ? $bbs_review_count : 3;

	$args = array(
		'post_type'      => 'review',
		'post_status'    => 'publish',
		'posts_per_page' => $bbs_review_count,
		'orderby'        => 'post_date',
		'order'          => 'DESC',
	);

	$loop = new WP_Query( $args );

	while ( $loop->have_posts() ) :
		$loop->the_post();
		?>


		<div class="review_card">
			<div class="review_copy">

				<!-- Get review title -->
				<h4 class="review_title">
					<?php print the_title(); ?>
				</h4>

				<!-- Get review content -->
				<div class="review_body">
					<?php the_content(); ?>
				</div >

			</div>
			<div class="review_person">
				<div class="review_imageWrap">

					<!-- Get the review avatar -->
					<?php $review_image = get_field( 'bbs_review_avatar' ); ?>
					<?php if ( ! empty( $review_image ) ) : ?>
						<img class="review_avatar" alt= "Profile image of a reviewer" src="<?php echo $review_image; ?>" />
					<?php endif; ?>

					<div class="review_iconWrap">

						<!-- Get the review social icon -->
						<?php $review_icon = get_field( 'bbs_review_icon' ); ?>
						<?php if ( ! empty( $review_icon ) ) : ?>
							<img class="review_icon" alt="Social platform icon" src="<?php echo $review_icon; ?>" />
						<?php endif; ?>

					</div>
				</div>

				<!-- Get the reviewer name -->
				<p class="review_name">
					<?php echo get_field( 'bbs_review_name' ); ?>
				</p>

			</div>
		</div>


	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

</div>
