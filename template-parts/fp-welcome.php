<?php
// The Welcome Template Part for Barr's Barking salon
// 2023 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://webguyjeff.com

// Home page vars
$homepage_post_id = '17';
?>

    <div class="site-branding">
            <span class="eyebrow"><i>Welcome to</i></span>
            <h1 class="site-title title"><?php bloginfo( 'name' ); ?></h1>

            <?php $barrs_barking_salon_description = get_bloginfo( 'description', 'display' );

            if ( $barrs_barking_salon_description || is_customize_preview() ) :
            ?>
                <p class="site-description"><?php echo $barrs_barking_salon_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
            <?php endif; ?>
    </div>

    <p class="welcome_body">
        <?php echo strip_tags( get_post_field( 'post_content', $homepage_post_id, 'raw' )); ?>
    </p>

    <form class="buttonWrap" method="get" action="#contactForm">
        <button class="button button-outline" type="submit"><i class="fas fa-paw"></i>GET IN TOUCH</button>
    </form>
