<!-- Header Navigation Component -->
<nav>
    <div class="logo-icon"><img src="assets/profile.jpg" alt=""></div>
    <button class="hamburger" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <div class="nav-menu">
        <div class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" data-section="hero" data-page="index.php">
            <i class="fas fa-home"></i>
            <span class="nav-text">Home</span>
        </div>
        <div class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'about-pampanga.php' ? 'active' : ''; ?>" data-page="about-pampanga.php">
            <i class="fas fa-info-circle"></i>
            <span class="nav-text">About Pampanga</span>
        </div>
        <div class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'government.php' ? 'active' : ''; ?>" data-page="government.php">
            <i class="fas fa-landmark"></i>
            <span class="nav-text">Government</span>
        </div>
        <div class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tourism.php' || basename($_SERVER['PHP_SELF']) == 'tourism-detail.php' ? 'active' : ''; ?>" data-page="tourism.php">
            <i class="fas fa-map-marked-alt"></i>
            <span class="nav-text">Tourism</span>
        </div>
        <div class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'programs.php' ? 'active' : ''; ?>" data-page="programs.php">
            <i class="fas fa-hands-helping"></i>
            <span class="nav-text">Programs</span>
        </div>
        <div class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'development.php' ? 'active' : ''; ?>" data-page="development.php">
            <i class="fas fa-chart-line"></i>
            <span class="nav-text">Development</span>
        </div>
        <div class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'environment.php' ? 'active' : ''; ?>" data-page="environment.php">
            <i class="fas fa-leaf"></i>
            <span class="nav-text">Environment</span>
        </div>
        <div class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'news.php' || basename($_SERVER['PHP_SELF']) == 'news-detail.php' ? 'active' : ''; ?>" data-page="news.php">
            <i class="fas fa-newspaper"></i>
            <span class="nav-text">News</span>
        </div>
        <div class="indicator"></div>
    </div>
</nav>

<script>
$(document).ready(function() {
    // Hamburger menu toggle
    $('.hamburger').click(function(e) {
        e.stopPropagation();
        $(this).toggleClass('active');
        $('.nav-menu').toggleClass('active');
        $('body').toggleClass('menu-open');
    });

    // Close menu when clicking nav item
    $('.nav-item').click(function() {
        $('.hamburger').removeClass('active');
        $('.nav-menu').removeClass('active');
        $('body').removeClass('menu-open');
    });

    // Close menu when clicking outside
    $(document).click(function(event) {
        if (!$(event.target).closest('nav').length) {
            $('.hamburger').removeClass('active');
            $('.nav-menu').removeClass('active');
            $('body').removeClass('menu-open');
        }
    });

    // Prevent clicks inside nav menu from closing it
    $('.nav-menu').click(function(e) {
        e.stopPropagation();
    });

    // Navigation handling
    $('.nav-item').click(function() {
        const page = $(this).data('page');
        const section = $(this).data('section');
        
        if (page) {
            // Navigate to specific page
            window.location.href = page;
        } else if (section) {
            // Scroll to section on homepage
            const currentPage = window.location.pathname;
            if (currentPage.includes('index.php') || currentPage === '/' || currentPage.endsWith('/')) {
                const target = $('#' + section);
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 60
                    }, 800);
                }
            } else {
                window.location.href = 'index.php#' + section;
            }
        }
    });
});
</script>