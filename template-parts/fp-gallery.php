<?php
// The Gallery Template Part for Barr's Barking salon
// 2021 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk

$bbs_settings = get_option( 'bbs_theme_array' ); // Serialized array of all Options
$bbs_title_gallery = $bbs_settings['bbs_title_gallery']; // Gallery Title
?>

<h2 class="gallery_title"><?php echo $bbs_title_gallery; ?></h2>

<div class="gallery_wrap">
    <!-- SimpLy homepage-gallery -->
    <?php echo do_shortcode('[pgc_simply_gallery id="310"]'); ?>
</div>
