/**
 * File reveal-animation.js.
 * Barr's Barking Salon Theme
 * Handles reveal animations powered by GSAP
 *
 * Author - Jefferson Real
 * URL - jeffersonreal.uk
 */

gsap.registerPlugin(ScrollTrigger, CSSPlugin);

function animateFrom(elem, direction) {
    direction = direction || 1;
    var x = 0,
        y = direction * 100;
    if(elem.classList.contains("gs_reveal_fromLeft")) {
        x = -200;
        y = 0;
    } else if (elem.classList.contains("gs_reveal_fromRight")) {
        x = 200;
        y = 0;
    }
    elem.style.transform = "translate(" + x + "px, " + y + "px)";
    elem.style.opacity = "0";
    gsap.fromTo(elem, {x: x, y: y, autoAlpha: 0}, {
        duration: 1.25,
        x: 0,
        y: 0,
        autoAlpha: 1,
        ease: "expo",
        overwrite: "auto"
    });
}

function hide(elem) {
    gsap.set(elem, {autoAlpha: 0});
}

document.addEventListener("DOMContentLoaded", function() {

    //Use jQuery to add alternating classes to any elements of class gs_reveal
    //Elements must be grouped as children in a parent element to alternate
    $( ".gs_reveal:nth-child(2n+1)" ).addClass( "gs_reveal_fromLeft" );
    $( ".gs_reveal:nth-child(2n+2)" ).addClass( "gs_reveal_fromRight" );

    gsap.utils.toArray(".gs_reveal").forEach(function(elem) {
        hide(elem); // assure that the element is hidden when scrolled into view

        ScrollTrigger.create({
            trigger: elem,
            onEnter: function() { animateFrom(elem) },
            onEnterBack: function() { animateFrom(elem, -1) },
            onLeave: function() { hide(elem) } // assure that the element is hidden when scrolled into view
        });
    });
});
