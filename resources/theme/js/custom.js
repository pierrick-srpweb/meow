(function() {
	"use strict";

    // Header Sticky Js
    window.addEventListener('scroll', event => {
        const height = 150;
        const { scrollTop } = event.target.scrollingElement;
        const navbar = document.querySelector('#navbar');
        if (navbar) {
            navbar.classList.toggle('sticky', scrollTop >= height);
        }
    });

    // Animation Js
    scrollCue.init();

    // Select the button element Js
    var scrollTopBtn = document.getElementById("scrollTopBtn");

    // Show the button when the user scrolls down Js
    window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollTopBtn.style.display = "block";
    } else {
        scrollTopBtn.style.display = "none";
    }
    };

    // Add a click event listener to the button Js
    scrollTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: "smooth"
        });
    });

    // Preloader Js
    window.onload = function(){
        const getPreloaderId = document.getElementById('preloader');
        if (getPreloaderId) {
            getPreloaderId.style.display = 'none';
        }
    };
})()
