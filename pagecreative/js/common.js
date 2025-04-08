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
    $('.product-gallery').owlCarousel({
        items: 5,
        margin: 10,
        nav: true,
        dots: false,
        loop: true,
        center: false,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="40" viewBox="0 0 22 40" fill="none"> <path d="M20.4113 0.893554L1.625 19.6799L20.4113 38.4662" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="40" viewBox="0 0 22 40" fill="none"> <path d="M1.55339 0.893554L20.3397 19.6799L1.55339 38.4662" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>'
        ],
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
        }
    });

    function updateFeaturedImage() {
        var currentImage = $('.product-gallery .owl-item.active img').attr('src');
        var currentSrcset = $('.product-gallery .owl-item.active img').attr('srcset');
        var currentAlt = $('.product-gallery .owl-item.active img').attr('alt');

        $('.main-image img').attr('src', currentImage);
        $('.main-image img').attr('srcset', currentSrcset);
        $('.main-image img').attr('alt', currentAlt);
        document.title = currentAlt;
    }
    $('.product-gallery .gallery-item img').on('click', function () {
        var new_image = $(this).attr('src');
        var new_srcset = $(this).attr('srcset');
        var new_alt = $(this).attr('alt');

        $('.main-image img').attr('src', new_image);
        $('.main-image img').attr('srcset', new_srcset);
        $('.main-image img').attr('alt', new_alt);
    });

    $('.product-gallery').on('changed.owl.carousel', function (event) {
        updateFeaturedImage();
    });
    $('.next-featured-image').on('click', function () {
        $('.product-gallery').trigger('next.owl.carousel');
        updateFeaturedImage();
    });

    $('.prev-featured-image').on('click', function () {
        $('.product-gallery').trigger('prev.owl.carousel');
        updateFeaturedImage();
    });
});


function changeColour(colourSlug) {
    // Update the variant selection (e.g., update the WooCommerce product variation)
    var product = document.querySelector('input[name="attribute_pa_colour"]');
    if (product) {
        product.value = colourSlug;  // Set the selected colour value
        jQuery('form.cart').trigger('submit');  // Submit the form to update the product price and images based on selection
    }
    
    // You can also add custom code to change the image or other features when a colour is clicked
    // For example, if you have an image mapped to each colour, you can add a function to change the image
    console.log('Colour selected: ' + colourSlug);  // Debugging
}