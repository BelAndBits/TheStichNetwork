document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('flex'); 
    });

    const userAvatarLink = document.querySelector('.avatar-link');
    const userMenu = document.getElementById('user-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('flex');
    });

    userAvatarLink.addEventListener('click', (event) => {
        event.stopPropagation(); 
        userMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', (event) => {
        if (!userMenu.contains(event.target) && !userAvatarLink.contains(event.target)) {
            userMenu.classList.add('hidden');
        }
    });
});