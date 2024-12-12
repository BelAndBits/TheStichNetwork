document.addEventListener('DOMContentLoaded', () => {
    // Get the toggle button for the mobile menu and the mobile menu itself
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    // Add event listener for toggling the mobile menu on click
    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('flex');
    });

    // Attempt to get the user avatar link and user menu
    const userAvatarLink = document.querySelector('.avatar-link');
    const userMenu = document.getElementById('user-menu');

    // Check if the user avatar link and user menu exist before adding event listeners
    if (userAvatarLink && userMenu) {
        // Add click event to toggle the user menu visibility
        userAvatarLink.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent the click from bubbling up to the document
            userMenu.classList.toggle('hidden');
        });

        // Add click event on the document to close the user menu when clicking outside of it
        document.addEventListener('click', (event) => {
            // Check if the click is outside both the user menu and avatar link
            if (!userMenu.contains(event.target) && !userAvatarLink.contains(event.target)) {
                userMenu.classList.add('hidden'); // Hide the user menu
            }
        });
    }
});
