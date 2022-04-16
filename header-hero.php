<?php
/**
 * Custom Hero Header for the Barking salon Front Page
 *
 * Author: Jefferson Real - jeffersonreal.uk
 * @package Barrs_Barking_Salon
 */
// Load theme settings variables for this document
$bbs_settings = get_option( 'bbs_theme_array' ); // Serialized array of all Options
$bbs_email_address = $bbs_settings['bbs_email_address']; // Email Address
$bbs_phone_number = $bbs_settings['bbs_phone_number']; // Phone Number
$bbs_phone_href = preg_replace('/\s+/', '', $bbs_phone_number); // Whitespace cleaned for url
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<!-- bbs_head start -->
<?php get_template_part( 'template-parts/bbs-head', 'none' );?>
<!-- bbs_head end -->

<!-- wp_head start -->
<?php wp_head(); ?>
<!-- wp_head end -->

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- PAGE GRID START -->
<div id="page" class="site">

	<header id="masthead" class="hero-header">
        <div class="hero-header_filter"></div>

        <div class="hero-header_logoBox">
           <img class="hero-header_logo" alt="Barr's Barking Salon" src="<?php echo get_template_directory_uri(); ?>/images/logo_transparent.svg">
        </div>

        <div class="hero-header_ctaBox-left"></div>
        <div class="hero-header_ctaBox">
            <form class="buttonWrap" method="get" action="#contactForm">
                <button class="button" type="submit"><i class="fas fa-paw"></i>BOOK AN APPOINTMENT</button>
            </form>
           <img class="hero-header_dog" alt="Barrs Barking Salon" src="<?php echo get_template_directory_uri(); ?>/images/happy_dog_shadow.png">
        </div>
        <div class="hero-header_ctaBox-right"></div>

        <div class="header_navBox">
    		<nav id="site-navigation" class="main-navigation">
    			<button class="menu-toggle" aria-controls="primary-menu" aria-label="Main Menu" aria-expanded="false"><i class="fas fa-bars"></i><i class="fas fa-times"></i></button>

    			<?php wp_nav_menu(
                      array(
                          'theme_location' => 'menu-1',
                          'menu_id'        => 'primary-menu',
                      )
                ); ?>

                <div class="header_contactBox-toggled">
                    <a class="header_email" href="mailto:<?php echo $bbs_email_address; ?>"><?php echo $bbs_email_address; ?> <i class="fas fa-envelope"></i></a>
                    <a class="header_phone" href="tel:<?php echo $bbs_phone_href; ?>"><?php echo $bbs_phone_number; ?> <i class="fas fa-phone"></i></a>
                </div>
    		</nav><!-- #site-navigation -->
            <div class="header_contactBox">
                <a class="header_email" href="mailto:<?php echo $bbs_email_address; ?>"><?php echo $bbs_email_address; ?> <i class="fas fa-envelope"></i></a>
                <a class="header_phone" href="tel:<?php echo $bbs_phone_href; ?>"><?php echo $bbs_phone_number; ?> <i class="fas fa-phone"></i></a>
            </div>
        </div>

	</header>
