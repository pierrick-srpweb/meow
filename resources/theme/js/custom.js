(function() {
	"use strict";

    // Navbar JS
    try {
        const nav = document.querySelector('.navbar');
        let navTop = nav.offsetTop;

        function fixedNav() {
            if (window.scrollY >= navTop) {
                nav.classList.add('sticky');
            } else {
                nav.classList.remove('sticky');
            }
        }
        window.addEventListener('scroll', fixedNav);
    } catch (err) {}

    // Header Sticky Js
    window.addEventListener('scroll', event => {
        const height = 150;
        const { scrollTop } = event.target.scrollingElement;
        document.querySelector('#navbar').classList.toggle('sticky', scrollTop >= height);
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

    // Hover JS
    try {
        var elements = document.querySelectorAll("[id^='my-element']");
        elements.forEach(function(element) {
            element.addEventListener("mouseover", function() {
                element.classList.add("active");
            });
            element.addEventListener("mouseout", function() {
                element.classList.remove("active");
            });
        });

    } catch (err) {}
})()
