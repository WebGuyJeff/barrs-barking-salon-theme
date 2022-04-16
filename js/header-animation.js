/**
 * File header-animation.js.
 * Barr's Barking Salon Theme
 * Handles header animations powered by GSAP
 *
 * Author - Jefferson Real
 * URL - jeffersonreal.uk
 */

gsap.registerPlugin(ScrollTrigger, CSSPlugin);

document.addEventListener("DOMContentLoaded", function() {

    //Use jQuery to add alternating classes to any elements of class gs_header
    //Elements must be grouped as children in a parent element to alternate
    $( ".gs_header:nth-child(2n+1)" ).addClass( "gs_header_heads" );
    $( ".gs_header:nth-child(2n+2)" ).addClass( "gs_header_tales" );

    gsap.utils.toArray(".gs_header").forEach(function(elem) {

        var x = 0;
            y = 100;
        if(elem.classList.contains("gs_header_heads")) {
            x = 100;
            y = 100;

        } else if (elem.classList.contains("gs_header_tales")) {
            x = -100;
            y = 300;
        }
        elem.style.transform = "translate(" + x + "px, " + y + "px)";

        gsap.timeline({
            scrollTrigger:{
                trigger: '.site-header',
                pin: false,
                start:'top top',
                end:'bottom top',
                scrub:1
             }})

        .fromTo(elem, { x: x, y: y }, {
            x: 0,
            y: 0,
            ease: "power1"
        });
    });
});
