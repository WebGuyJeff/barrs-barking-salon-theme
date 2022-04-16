<?php
// The Contact Form Widget Template Part for Barr's Barking salon
// 2021 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk
?>

    <h3 class="sidebar_title">Message and Book</h3>

    <!-- WP Forms shortcode -->
    <?php echo do_shortcode('[wpforms id="44"]'); ?>

    <!-- WPForms button hidden, custom button attached to form -->
    <button
        form="wpforms-form-44"
        type="submit"
        name="wpforms[submit]"
        class="button button-outline button-wpformsContact"
        value="wpforms-submit"
        aria-live="assertive"
        data-alt-text="Sending..."
        data-submit-text="Submit">
            <i class="fas fa-paw"></i>Submit
    </button>
