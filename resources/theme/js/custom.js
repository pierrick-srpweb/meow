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
        // Scroll to the top of the document
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: "smooth"
        });
    });

    // Preloader Js
    window.onload = function(){
        // Preloader
        const getPreloaderId = document.getElementById('preloader');
        if (getPreloaderId) {
            getPreloaderId.style.display = 'none';
        }
    };

    // Service Slider Js
    var swiper = new Swiper(".service-slider", {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            768: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 4
            }
        }
    });

    // Hover JS
    try {
        var elements = document.querySelectorAll("[id^='my-element']");
            elements.forEach(function(element) {
            element.addEventListener("mouseover", function() {
                elements.forEach(function(el) {
                el.classList.remove("active");
                });
                element.classList.add("active");
            });
        });

    } catch (err) {}


    // Load More
    try {
        // Load More
        var container = document.getElementById('container');
        var loadMoreButton = document.getElementById('load-more');
        var itemsToShow = 6; // Initial number of items to show
        var itemsIncrement = 4; // Number of items to load on each "Load More" click

        // Function to show or hide items based on current count
        function toggleItems() {
        var items = container.getElementsByClassName('item');

            for (var i = 0; i < items.length; i++) {
                if (i < itemsToShow) {
                items[i].style.display = 'block';
                } else {
                items[i].style.display = 'none';
                }
            }
        }

        // Initial load
        toggleItems();

        // Event listener for "Load More" button click
        loadMoreButton.addEventListener('click', function() {
            itemsToShow += itemsIncrement;
            toggleItems();
        });
    } catch (err) {}

    // Load More
    try {
        // Load More
        var container = document.getElementById('container2');
        var loadMoreButton = document.getElementById('load-more');
        var itemsToShow = 8; // Initial number of items to show
        var itemsIncrement = 4; // Number of items to load on each "Load More" click

        // Function to show or hide items based on current count
        function toggleItems() {
        var items = container.getElementsByClassName('item2');

            for (var i = 0; i < items.length; i++) {
                if (i < itemsToShow) {
                items[i].style.display = 'block';
                } else {
                items[i].style.display = 'none';
                }
            }
        }

        // Initial load
        toggleItems();

        // Event listener for "Load More" button click
        loadMoreButton.addEventListener('click', function() {
            itemsToShow += itemsIncrement;
            toggleItems();
        });
    } catch (err) {}
})()


function openSearch() {
    document.getElementById("myOverlay").style.visibility = "visible";
    document.getElementById("myOverlay").style.opacity = "1";
}
function closeSearch() {
    document.getElementById("myOverlay").style.visibility = "hidden";
    document.getElementById("myOverlay").style.opacity = "0";
}
