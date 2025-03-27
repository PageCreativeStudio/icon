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

