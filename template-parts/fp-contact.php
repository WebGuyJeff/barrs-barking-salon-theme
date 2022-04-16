<?php
// The Contact Form Template Part for Barr's Barking salon
// 2021 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk
?>

<div id="contactForm" class="contact_wrap">

    <h3 class="contact_title">Book An Appointment</h3>
    <p class="contact_message">Request a booking or just send a message using the form below and I'll be in contact shortly.</p>

    <!-- WP Forms shortcode -->
    <?php echo do_shortcode('[wpforms id="44"]'); ?>

    <!-- WPForms button hidden, custom button attached to form -->
    <button
        form="wpforms-form-44"
        type="submit"
        name="wpforms[submit]"
        class="button button-wpformsContact"
        value="wpforms-submit"
        aria-live="assertive"
        data-alt-text="Sending..."
        data-submit-text="Submit">
            <i class="fas fa-paw"></i>Submit
    </button>
</div>
