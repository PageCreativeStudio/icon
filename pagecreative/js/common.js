$(document).ready(function () {
    const toggleMenuButton = document.getElementById('toggle-menu');
    const mobMenu = document.querySelector('.mobmenu');
    const closeBtn = document.querySelector('.closebtn');

    toggleMenuButton.addEventListener('click', function () {
        mobMenu.classList.add('menu-open');
        mobMenu.classList.remove('menu-close');
    });

    closeBtn.addEventListener('click', function () {
        mobMenu.classList.remove('menu-open');
        mobMenu.classList.add('menu-close');
    });

    document.querySelectorAll('.mobmain_menu .menu-item-has-children > a').forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const subMenu = link.nextElementSibling;

            if (subMenu.classList.contains('show')) {
                subMenu.style.maxHeight = 0;
                subMenu.classList.remove('show');
            } else {
                subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
                subMenu.classList.add('show');
            }
        });
    });
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
        margin: 0,
        dots: true,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.03992 9.03138H23.29V6.89288H5.03992L10.0194 1.91017L8.50778 0.400391L2.01676 6.89074H1.90986V6.99766L0.947756 7.95999L1.90986 8.92231V9.02924H2.01676L2.23912 9.25164L8.50778 15.5217L10.0194 14.0098L5.03992 9.03138Z" fill="black"/> </svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M19.1984 9.03138H0.948242V6.89288H19.1984L14.2189 1.91017L15.7305 0.400391L22.2215 6.89074H22.3284V6.99766L23.2905 7.95999L22.3284 8.92231V9.02924H22.2215L21.9992 9.25164L15.7305 15.5217L14.2189 14.0098L19.1984 9.03138Z" fill="black"/> </svg>'
        ],
        responsive: {
            0: {
                items: 1,
                stagePadding: 30
            },
            768: {
                items: 2,
                stagePadding: 30
            },
            989: {
                items: 2,
                stagePadding: 0
            },
            1280: {
                items: 3,
                stagePadding: 35
            },
            1380: {
                items: 3,
                stagePadding:50,
                center: false
            }
        }
    });
});