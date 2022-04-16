<?php
// The Footer Template for Barr's Barking salon
// 2021 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk

// Load theme settings variables for this document
$bbs_settings = get_option( 'bbs_theme_array' ); // Serialized array of all Options
$bbs_email_address = $bbs_settings['bbs_email_address']; // Email Address
$bbs_phone_number = $bbs_settings['bbs_phone_number']; // Phone Number
$bbs_phone_href = preg_replace('/\s+/', '', $bbs_phone_number); // Whitespace cleaned for url
$bbs_social_url_facebook = $bbs_settings['bbs_social_url_facebook']; // Facebook URL
$bbs_social_url_instagram = $bbs_settings['bbs_social_url_instagram']; // Instagram URL
$bbs_url_cityguilds = $bbs_settings['bbs_url_cityguilds']; // City and Guilds URL
?>

<footer id="colophon" class="site-footer">

    <div class="footer_left">

        <!-- Create the secondary nav location for WP customizer -->
        <?php wp_nav_menu(
              array(
                  'theme_location' => 'menu-2',
                  'menu_id'        => 'footer-menu',
                  'container_class' => 'footer-navigation'
              )
        ); ?>

        <div class="footer_contactBox">
            <a class="footer_email" href="mailto:<?php echo $bbs_email_address; ?>"><i class="fas fa-envelope"></i> <?php echo $bbs_email_address; ?></a>
            <a class="footer_phone" href="tel:<?php echo $bbs_phone_href; ?>"><i class="fas fa-phone"></i> <?php echo $bbs_phone_number; ?></a>
        </div>
    </div>
    <div class="footer_middle">
        <div class="footer_social">
            <h5 class="footer_socialTitle">Follow Me</h5>
            <div class="social">

                <!-- inline the social icons -->
                <a class="social_link" aria-label="Follow Barr's Barking Salon on Facebook" title="Follow Barr's Barking Salon on Facebook" target="_blank" href="<?php echo $bbs_social_url_facebook; ?>">
                    <?php echo file_get_contents( get_template_directory() . "/images/social_icon-facebook.svg");?>
                </a>
                <a class="social_link" aria-label="Follow Barr's Barking Salon on Instagram" title="Follow Barr's Barking Salon on Instagram" target="_blank" href="<?php echo $bbs_social_url_instagram; ?>">
                    <?php echo file_get_contents( get_template_directory() . "/images/social_icon-instagram.svg");?>
                </a>

            </div>
        </div>
    </div>
    <div class="footer_right">
        <div class="footer_qualificationWrap">


            <!-- inline the city and guilds logo -->
            <a class="cg_link" aria-label="City and Guilds Qualified" title="City and Guilds Qualified" target="_blank" href="<?php echo $bbs_url_cityguilds; ?>">
                <?php echo file_get_contents( get_template_directory() . "/images/city_and_guilds_logo.svg");?>
            </a>

        </div>
            <span class="footer_copyright">&copy; <?php echo date("Y"); ?> <?php echo file_get_contents( get_template_directory() . "/images/bbs_rosie.svg");?> Barr's Barking Salon</span>
    </div>

</footer>

</div>
<!-- PAGE GRID END -->

<a class="nav_backup" title="Back to top" href="#"><i class="fas fa-arrow-circle-up"></i></a>

<!-- svg fill patterns -->
<?php echo file_get_contents( get_template_directory() . "/images/patterns.svg");?>
<?php wp_footer(); ?>


<!-- Dev Info --
<?php
echo "# All Post Types\n";
$post_types = get_post_types();
foreach($post_types as $value) {
    echo $value . "\n";
}

global $wp_query;
$current_post_type = get_post_type();
if (isset( $current_post_type )) {
echo "# Current Post Type\n" . $current_post_type;
}
?>

-- Dev Info End -->
</body>
</html>
