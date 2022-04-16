<?php
// The About Section Template Part for Barr's Barking salon
// 2021 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk

// ABOUT page vars
$about_post_id = '218';
$trim = '100';
$read_more = '"<br><br><a class="readMore" href=/about/#post-' . $about_post_id . '><i>read more </i><i class="fas fa-angle-double-right"></i></a>';

// featured image
$about_thumbnail_id = get_post_thumbnail_id( $about_post_id );
if ( ! $about_thumbnail_id ) {
    //Do nothing
} else {
$about_featured_image = wp_get_attachment_image_url( $about_thumbnail_id, 'full' );
}
?>

    <div class="about_background">
        <div class="about_paws">
            <?php echo file_get_contents( get_template_directory() . "/images/paws.svg");?>
        </div>
    </div>
    <div class="about_left">
        <div class="about_topPad"></div>
            <img class="about_image gs_reveal" src="<?php echo $about_featured_image; ?>" />
        <div class="about_bottomPad"></div>
    </div>
    <div class="about_right">
        <h2 class="about_title"><?php echo get_post_field( 'post_title', $about_post_id, 'raw' ); ?></h2>
        <p class="about_body">
            <?php echo wp_trim_words( strip_tags( get_post_field( 'post_content', $about_post_id, 'raw' )), $trim, $read_more ); ?>
        </p>
        <form class="buttonWrap" method="get" action="#contactForm">
            <button class="button button-outline" type="submit"><i class="fas fa-paw"></i>Send Me a Message</button>
        </form>
    </div>
