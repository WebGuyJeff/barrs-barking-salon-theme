<?php
// The Subscribe Template Part for Barr's Barking salon
// 2021 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk

$bbs_settings = get_option( 'bbs_theme_array' ); // Serialized array of all Options
$bbs_title_subscribe = $bbs_settings['bbs_title_subscribe']; // Subscribe Form Title
?>

    <h3 class="subscribe_title"><?php echo $bbs_title_subscribe; ?></h3>

    <!-- WP Forms shortcode -->
    <?php echo do_shortcode('[wpforms id="230" title="false"]'); ?>

    <!-- WPForms button hidden, custom button attached to form -->
    <button
      	form="wpforms-form-230"
      	type="submit"
      	name="wpforms[submit]"
      	class="button button-orange button-wpformsSubscribe"
      	value="wpforms-submit"
      	aria-live="assertive"
      	data-alt-text="Sending..."
      	data-submit-text="Subscribe">
        		<i class="fas fa-paw"></i>Subscribe
    </button>
