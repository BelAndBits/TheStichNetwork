document.addEventListener('DOMContentLoaded', function() {
    // Check if we are on the "My Library" page
    if (document.getElementById('my-library-page')) {
        const sections = document.querySelectorAll('.content-section');
        const links = document.querySelectorAll('nav.bg-green a'); // Specify links only within the special nav

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default link behavior

                // Identify the section to show based on the href attribute of the link
                const sectionId = this.getAttribute('href').substring(1); // Remove the '#' from href

                // Hide all sections
                sections.forEach(section => {
                    section.style.display = 'none';
                });

                // Display the corresponding section
                const activeSection = document.getElementById(sectionId);
                if (activeSection) {
                    activeSection.style.display = 'block'; // Set to block to show the section
                }
            });
        });
    }
});
