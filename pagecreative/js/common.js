////// Mobile menu
$(document).ready(function () {
    const toggleMenuButton = document.getElementById('toggle-menu');
    const mobMenu = document.querySelector('.mobmenu');
    const closeBtn = document.querySelector('.closebtn');
    let menuHistory = [];
    const slidingContainer = document.createElement('div');
    slidingContainer.className = 'sliding-menu-container';
    document.querySelector('.mobmain_menu').appendChild(slidingContainer);

    function initMenu() {
        const mainMenu = document.querySelector('.mobmain_menu #primary-menu').cloneNode(true);
        mainMenu.classList.add('menu-panel', 'active');
        mainMenu.setAttribute('data-level', '0');
        slidingContainer.innerHTML = '';
        slidingContainer.appendChild(mainMenu);
        menuHistory = [];
        slidingContainer.style.transform = 'translateX(0)';
        setupSubmenuTriggers(mainMenu);
    }

    function setupSubmenuTriggers(menuElement) {
        const menuItems = menuElement.querySelectorAll('.menu-item-has-children > a');

        menuItems.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                const listItem = link.parentElement;
                const submenu = listItem.querySelector('ul.sub-menu');
                const currentLevel = parseInt(menuElement.getAttribute('data-level'));
                const nextLevel = currentLevel + 1;

                if (submenu) {
                    menuHistory.push({
                        menu: menuElement,
                        scrollPosition: window.scrollY
                    });

                    const newPanel = submenu.cloneNode(true);
                    newPanel.classList.add('menu-panel');
                    newPanel.setAttribute('data-level', nextLevel);

                    const backButton = document.createElement('li');
                    backButton.className = 'menu-item back-button';
                    backButton.innerHTML = `<a href="#"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none"> <path d="M4.69622 8.35728L0.981934 4.643M0.981934 4.643L4.69622 0.928711M0.981934 4.643H8.41051C9.3956 4.643 10.3403 5.03432 11.0369 5.73089C11.7335 6.42745 12.1248 7.37219 12.1248 8.35728C12.1248 9.34237 11.7335 10.2871 11.0369 10.9837C10.3403 11.6802 9.3956 12.0716 8.41051 12.0716H6.55336" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg> Back</a>`;
                    newPanel.insertBefore(backButton, newPanel.firstChild);

                    slidingContainer.appendChild(newPanel);
                    setupSubmenuTriggers(newPanel);
                    backButton.querySelector('a').addEventListener('click', function (e) {
                        e.preventDefault();
                        goBack();
                    });
                    slideToPanel(nextLevel);
                    toggleElementsVisibility(true);
                }
            });
        });
    }
    function slideToPanel(level) {
        const panels = slidingContainer.querySelectorAll('.menu-panel');

        panels.forEach(function (panel) {
            panel.classList.remove('active');
            if (parseInt(panel.getAttribute('data-level')) === level) {
                panel.classList.add('active');
            }
        });

        slidingContainer.style.transform = `translateX(-${level * 100}%)`;
    }
    function goBack() {
        if (menuHistory.length > 0) {
            const previous = menuHistory.pop();
            const previousLevel = parseInt(previous.menu.getAttribute('data-level'));
            slideToPanel(previousLevel);
            const panels = slidingContainer.querySelectorAll('.menu-panel');
            panels.forEach(function (panel) {
                if (parseInt(panel.getAttribute('data-level')) > previousLevel) {
                    panel.remove();
                }
            });
            window.scrollTo(0, previous.scrollPosition);
            if (previousLevel === 0) {
                toggleElementsVisibility(false);
            }
        }
    }

    function resetMenu() {
        menuHistory = [];
        slidingContainer.innerHTML = '';
        slidingContainer.style.transform = 'translateX(0)';
        toggleElementsVisibility(false);
    }

    function toggleElementsVisibility(hide) {
        const elements = document.querySelectorAll('.close-on-sliding-active, .cta_menu');
        elements.forEach(function (element) {
            if (hide) {
                element.style.display = 'none';
            } else {
                element.style.display = '';
            }
        });
    }

    toggleMenuButton.addEventListener('click', function () {
        mobMenu.classList.add('menu-open');
        mobMenu.classList.remove('menu-close');
        initMenu();
    });

    closeBtn.addEventListener('click', function () {
        mobMenu.classList.remove('menu-open');
        mobMenu.classList.add('menu-close');
        resetMenu();
    });
    function setupResponsiveMenu() {
        if (window.matchMedia('(max-width: 3999px)').matches) {
            document.body.classList.add('mobile-menu-active');
        } else {
            document.body.classList.remove('mobile-menu-active');
            resetMenu();
        }
    }

    setupResponsiveMenu();
    window.addEventListener('resize', setupResponsiveMenu);
});


////// Mega menu
document.addEventListener("DOMContentLoaded", function () {
    if (window.matchMedia("(min-width: 989px)").matches) {
        let megaMenus = $(".megamenu__container");
        let menuItems = $(".services__mega-menu");

        function showMegaMenu(menu) {
            menu.stop(true, true).slideDown(300).css({
                opacity: 1,
                visibility: "visible",
                transform: "translateY(0)"
            });
        }

        function hideMegaMenu(menu) {
            menu.stop(true, true).animate(
                { opacity: 0 },
                {
                    duration: 500,
                    step: function (now, fx) {
                        if (fx.prop === "opacity") {
                            $(this).css("transform", "translateY(-10px)");
                        }
                    },
                    complete: function () {
                        $(this).css({ visibility: "hidden", display: "none" });
                    }
                }
            );
        }

        menuItems.on("mouseenter", function () {
            let targetMenuId = $(this).attr("class").includes("services__mega-menu") ? "#services__mega-menu" : "#services__mega-menu";
            showMegaMenu($(targetMenuId));
        });

        megaMenus.on("mouseenter", function () {
            clearTimeout(hideTimeout);
        });

        $(document).on("mousemove", function (event) {
            megaMenus.each(function () {
                if (
                    !menuItems.is(event.target) &&
                    !menuItems.has(event.target).length &&
                    !$(this).is(event.target) &&
                    !$(this).has(event.target).length
                ) {
                    hideMegaMenu($(this));
                }
            });
        });
    }
});


///// Footer collapsible menu
$(document).ready(function () {
    const headings = document.querySelectorAll(".footermenu h2");
    const isMobile = () => window.innerWidth <= 989;
    headings.forEach((heading) => {
        heading.addEventListener("click", () => {
            if (isMobile()) {
                const ul = heading.nextElementSibling;
                if (ul.tagName.toLowerCase() === "ul") {
                    if (ul.classList.contains("open")) {
                        ul.style.maxHeight = "0";
                        ul.classList.remove("open");
                        heading.classList.remove("active");
                    } else {
                        document.querySelectorAll(".footermenu ul.open").forEach((openUl) => {
                            openUl.style.maxHeight = "0";
                            openUl.classList.remove("open");
                            openUl.previousElementSibling.classList.remove("active");
                        });
                        ul.style.maxHeight = `${ul.scrollHeight}px`;
                        ul.classList.add("open");
                        heading.classList.add("active");
                    }
                }
            }
        });
    });
});


jQuery(document).ready(function ($) {
    $('.casestudies__slider').owlCarousel({
        loop: true,
        nav: true,
        margin: 15,
        dots: true,
        dotsEach: 3,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.03992 9.03138H23.29V6.89288H5.03992L10.0194 1.91017L8.50778 0.400391L2.01676 6.89074H1.90986V6.99766L0.947756 7.95999L1.90986 8.92231V9.02924H2.01676L2.23912 9.25164L8.50778 15.5217L10.0194 14.0098L5.03992 9.03138Z" fill="black"/> </svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M19.1984 9.03138H0.948242V6.89288H19.1984L14.2189 1.91017L15.7305 0.400391L22.2215 6.89074H22.3284V6.99766L23.2905 7.95999L22.3284 8.92231V9.02924H22.2215L21.9992 9.25164L15.7305 15.5217L14.2189 14.0098L19.1984 9.03138Z" fill="black"/> </svg>'
        ],
        responsive: {
            0: {
                items: 1,
                stagePadding: 30,
            },
            768: {
                items: 2,
                stagePadding: 30,
            },
            989: {
                items: 2,
                stagePadding: 0,
            },
            1280: {
                items: 3,
                stagePadding: 35,
            },
            1380: {
                items: 4,
                stagePadding: 40,
                center: true,
            },
            2000: {
                items: 5,
                stagePadding: 80,
                center: true,
            }
        }
    });
}); 

jQuery(document).ready(function ($) {
    $('.testimonials__slider').owlCarousel({
        loop: true,
        nav: false,
        margin: 15,
        dots: true,
        items: 1
    });
});

///////// Product gallery
jQuery(document).ready(function($) {
    // Store all gallery images for reference
    var galleryImages = [];
    var currentIndex = 0;
    var owlCarousel;
    
    // Collect all images from gallery including featured
    function collectGalleryImages() {
        galleryImages = [];
        $('.product-gallery .gallery-item img').each(function(index) {
            galleryImages.push($(this).attr('src'));
        });
    }
    
    // Initialize Owl Carousel for the product gallery
    owlCarousel = $('.product-gallery').owlCarousel({
        items: 4,
        margin: 10,
        nav: true,
        navText: ['&#10094;', '&#10095;'],
        dots: false,
        loop: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        },
        onInitialized: function() {
            collectGalleryImages();
        }
    });
    
    // Function to update the featured image
    function updateFeaturedImage(imageUrl) {
        $('.main-image img').attr('src', imageUrl);
    }
    
    // Function to sync owl carousel position with our current index
    function syncCarouselPosition(index) {
        owlCarousel.trigger('to.owl.carousel', [index, 300]);
    }
    
    // Change featured image when clicking on a gallery image
    $('.product-gallery').on('click', '.gallery-item img', function() {
        var newImage = $(this).attr('src');
        var clickedIndex = $(this).closest('.gallery-item').data('index');
        
        currentIndex = clickedIndex || 0;
        updateFeaturedImage(newImage);
        syncCarouselPosition(currentIndex);
    });
    
    // Custom Arrows for Featured Image
    $('.next-featured-image').on('click', function() {
        currentIndex = (currentIndex + 1) % galleryImages.length;
        updateFeaturedImage(galleryImages[currentIndex]);
        syncCarouselPosition(currentIndex);
    });
    
    $('.prev-featured-image').on('click', function() {
        currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
        updateFeaturedImage(galleryImages[currentIndex]);
        syncCarouselPosition(currentIndex);
    });
    
    // Listen for Owl Carousel navigation events
    $('.product-gallery').on('changed.owl.carousel', function(event) {
        var element = event.target;
        var currentItem = event.item.index;
        
        // Get the actual index considering the cloned items in loop mode
        var actualIndex = $(element).find('.owl-item').eq(currentItem).find('.gallery-item').data('index');
        
        if (typeof actualIndex !== 'undefined') {
            currentIndex = actualIndex;
            updateFeaturedImage(galleryImages[currentIndex]);
        }
    });
    
    // Initialize with the first gallery image
    if (galleryImages.length > 0) {
        updateFeaturedImage(galleryImages[0]);
    }
});