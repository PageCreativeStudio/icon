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