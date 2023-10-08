document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(function(item) {
        const submenu = item.querySelector('.submenu');
        const toggleIcon = item.querySelector('.toggle-icon');

        item.addEventListener('click', function() {
            submenu.classList.toggle('hidden');
            toggleIcon.querySelector('i').classList.toggle('fa-chevron-down');
            toggleIcon.querySelector('i').classList.toggle('fa-chevron-up');
        });
    });
});