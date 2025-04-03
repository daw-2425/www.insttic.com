document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const aside = document.querySelector('.aside');
    const overlay = document.querySelector('.sidebar-overlay');
    
    function toggleSidebar() {
        aside.classList.toggle('show');
        overlay.classList.toggle('show');
        document.body.classList.toggle('sidebar-open');
    }

    // Toggle sidebar when menu button is clicked
    if (menuToggle) {
        menuToggle.addEventListener('click', toggleSidebar);
    }

    // Close sidebar when clicking overlay
    if (overlay) {
        overlay.addEventListener('click', toggleSidebar);
    }

    // Close sidebar when clicking outside
    document.addEventListener('click', function(e) {
        if (aside.classList.contains('show') && 
            !aside.contains(e.target) && 
            !menuToggle.contains(e.target)) {
            toggleSidebar();
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 992 && aside.classList.contains('show')) {
            aside.classList.remove('show');
            overlay.classList.remove('show');
            document.body.classList.remove('sidebar-open');
        }
    });
}); 