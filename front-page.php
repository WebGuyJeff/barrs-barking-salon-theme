<?php
// The Homepage Template for Barr's Barking salon
// 2023 © Barr's Barking Salon
// Author: Jefferson Real
// URL: https://jeffersonreal.uk

get_header('hero');
?>

<!-- front-page GRID START -->
<main class="frontPage-main" id="primary" >

<section class="topServices">
    <?php get_template_part( 'template-parts/fp-top-services', 'none' );?>
</section>
<section class="welcome">
    <?php get_template_part( 'template-parts/fp-welcome', 'none' );?>
</section>
<section class="otherServices">
    <?php get_template_part( 'template-parts/fp-other-services', 'none' );?>
</section>
<div class="priceListCta">
    <?php get_template_part( 'template-parts/fp-price-list-cta', 'none' );?>
</div>
<!--
<section class="about">
    <?php "get_template_part( 'template-parts/fp-about', 'none' )" /* Section hidden at client request */ ;?>
</section>
-->
<section class="reviews">
    <?php get_template_part( 'template-parts/fp-reviews', 'none' );?>
</section>
<div class="subscribe">
    <?php get_template_part( 'template-parts/fp-subscribe', 'none' );?>
</div>
<section class="gallery">
    <?php get_template_part( 'template-parts/fp-gallery', 'none' );?>
</section>
<section class="contact">
    <?php get_template_part( 'template-parts/fp-contact', 'none' );?>
</section>
<div class="footerBanner">
    <?php get_template_part( 'template-parts/fp-footer-banner', 'none' );?>
</div>

</main>
<!-- front-page GRID END -->

<?php
get_footer();
