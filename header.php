<?php
/**
 * The Default header for the Barking salon theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Barrs_Barking_Salon
 */

// Load theme settings variables for this document
$bbs_settings = get_option( 'bbs_theme_array' );                                                             // Serialized array of all Options
if ( $bbs_settings ) {
	$bbs_email_address = $bbs_settings['bbs_email_address'] ? $bbs_settings['bbs_email_address'] : false; // Email Address
	if ( isset( $bbs_settings['bbs_phone_number'] ) ) {
		$bbs_phone_number = $bbs_settings['bbs_phone_number'];                                               // Phone Number
		$bbs_phone_href   = preg_replace( '/\s+/', '', $bbs_phone_number );                                  // Whitespace cleaned for url
	}
}
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<!-- bbs_head start -->
<?php get_template_part( 'template-parts/bbs-head', 'none' ); ?>
<!-- bbs_head end -->

<!-- wp_head start -->
<?php wp_head(); ?>
<!-- wp_head end -->

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- PAGE GRID START -->
<div id="page" class="site">

	<header id="masthead" class="site-header">

		<img class="header_image header_image-balm gs_header" alt="Dog Grooming Balm" src="<?php echo get_template_directory_uri(); ?>/images/header/balm.png">
		<img class="header_image header_image-brush gs_header" alt="Dog Grooming Balm" src="<?php echo get_template_directory_uri(); ?>/images/header/brush.png">
		<img class="header_image header_image-clippers gs_header" alt="Dog Grooming Balm" src="<?php echo get_template_directory_uri(); ?>/images/header/clippers.png">
		<img class="header_image header_image-cologne gs_header" alt="Dog Grooming Balm" src="<?php echo get_template_directory_uri(); ?>/images/header/cologne.png">
		<img class="header_image header_image-comb gs_header" alt="Dog Grooming Balm" src="<?php echo get_template_directory_uri(); ?>/images/header/comb.png">
		<img class="header_image header_image-scissors gs_header" alt="Dog Grooming Balm" src="<?php echo get_template_directory_uri(); ?>/images/header/scissors.png">
		<div class="header_backdrop"></div>

		<div class="header_ctaBar">
		   <div class="header_logoWrap">
			  <img class="site-header_logo" alt="Barr's Barking Salon" src="<?php echo get_template_directory_uri(); ?>/images/logo_main_bakedtext.svg">
			  <form class="buttonWrap" method="get" action="#contactForm">
				  <button class="button" type="submit"><i class="fas fa-paw"></i>BOOK AN APPOINTMENT</button>
			  </form>
		   </div>
		</div>

		<div class="header_navBox">
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-label="Main Menu" aria-expanded="false"><i class="fas fa-bars"></i><i class="fas fa-times"></i></button>

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>

				<?php if ( isset( $bbs_email_address ) || isset( $bbs_phone_href ) ) : ?>
					<div class="header_contactBox-toggled">

						<?php if ( isset( $bbs_email_address ) ) : ?>
							<a class="header_email" href="mailto:<?php echo $bbs_email_address; ?>"><?php echo $bbs_email_address; ?> <i class="fas fa-envelope"></i></a>
						<?php endif ?>

						<?php if ( isset( $bbs_phone_href ) ) : ?>
							<a class="header_phone" href="tel:<?php echo $bbs_phone_href; ?>"><?php echo $bbs_phone_number; ?> <i class="fas fa-phone"></i></a>
						<?php endif ?>

					</div>
				<?php endif ?>

			</nav><!-- #site-navigation -->

			<?php if ( isset( $bbs_email_address ) || isset( $bbs_phone_href ) ) : ?>
				<div class="header_contactBox">

					<?php if ( isset( $bbs_email_address ) ) : ?>
						<a class="header_email" href="mailto:<?php echo $bbs_email_address; ?>"><?php echo $bbs_email_address; ?> <i class="fas fa-envelope"></i></a>
					<?php endif ?>

					<?php if ( isset( $bbs_phone_href ) ) : ?>
						<a class="header_phone" href="tel:<?php echo $bbs_phone_href; ?>"><?php echo $bbs_phone_number; ?> <i class="fas fa-phone"></i></a>
					<?php endif ?>

				</div>
			<?php endif ?>

		</div>

	</header>
