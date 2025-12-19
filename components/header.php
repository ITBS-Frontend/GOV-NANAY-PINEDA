<!-- Header Navigation Component -->
<nav class="site-header">
    <div class="logo-icon"><img src="assets/Ph_seal_pampanga.png" alt=""></div>
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
        
        <!-- Combined Dropdown for About, Government, Tourism, Programs -->
        <div class="nav-item has-dropdown <?php 
            $activePages = ['about-pampanga.php', 'government.php', 'tourism.php', 'tourism-detail.php', 'programs.php'];
            echo in_array(basename($_SERVER['PHP_SELF']), $activePages) ? 'active' : ''; 
        ?>">
            <div class="nav-link">
                <span class="nav-text">More</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu">
                <a href="about-pampanga.php" class="dropdown-item">
                    <i class="fas fa-info-circle"></i> About Pampanga
                </a>
                <a href="government.php" class="dropdown-item">
                    <i class="fas fa-landmark"></i> Government
                </a>
                <a href="tourism.php" class="dropdown-item">
                    <i class="fas fa-map-marked-alt"></i> Tourism
                </a>
                <a href="programs.php" class="dropdown-item">
                    <i class="fas fa-hands-helping"></i> Programs and Services
                </a>
            </div>
        </div>
    
    </div>
</nav>
<style>

nav {
    display: flex;
    width: 100%;
    max-width: 100vw;
    flex-direction: row;
    align-items: center;
    gap: 10px;
    background: #DEDBC0;
    box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.25);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    margin: 0;
    transition: transform 0.3s ease;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: space-around;
}

nav.hide {
    transform: translateY(-100%);
}

.nav-container {
    display: flex;
    height: 80px;
    max-width: 1400px;
    width: 100%;
    padding: 16px;
    justify-content: space-between;
    align-items: center;
}

.logo-icon {
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo-icon img {
    height: 60px;
    width: auto;
}

.nav-menu {
    display: flex;
    padding: 15px 20px;
    justify-content: center;
    align-items: center;
    gap: 34px;
    border-radius: 50px;
    background: #FFF;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 4px 10px;
    border-radius: 100px;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.nav-item.active {
    background: #FFF;
    box-shadow: 4px 4px 4px 0 rgba(0, 0, 0, 0.25);
}

.nav-item:hover:not(.active) {
    background: rgba(255, 255, 255, 0.5);
}

.nav-item i {
    font-size: 18px;
    color: #333;
}

.nav-text {
    font-size: 14px;
    font-weight: 500;
    color: #333;
    white-space: nowrap;
}

.hamburger {
    display: none;
    flex-direction: column;
    gap: 4px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
}

.hamburger span {
    width: 25px;
    height: 3px;
    background: #333;
    border-radius: 2px;
    transition: all 0.3s ease;
}

.nav-item.has-dropdown {
    position: relative;
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}

.dropdown-icon {
    font-size: 12px;
    transition: transform 0.3s ease;
}

.nav-item.has-dropdown.active .dropdown-icon {
    transform: rotate(180deg);
}

.dropdown-menu {
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    background: #FFF;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    padding: 8px;
    min-width: 220px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    z-index: 1001;
}

.dropdown-menu.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    color: #333;
    text-decoration: none;
    border-radius: 8px;
    transition: background 0.2s ease;
}

.dropdown-item:hover {
    background: #F5F5F5;
}

.dropdown-item i {
    font-size: 16px;
    width: 20px;
}

body {
    padding-top: 80px;
}
nav.hide {
    transform: translateY(-100%);
}


.indicator {
    display: none;
}

html {
    scroll-behavior: smooth;
}
    </style>
<script>
$(document).ready(function() {
    // Hamburger menu toggle
    $('.hamburger').click(function(e) {
        e.stopPropagation();
        $(this).toggleClass('active');
        $('.nav-menu').toggleClass('active');
        $('body').toggleClass('menu-open');
    });

    // Dropdown toggle
    $('.nav-item.has-dropdown .nav-link').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const $parent = $(this).parent();
        const $dropdown = $parent.find('.dropdown-menu');
        
        // Toggle dropdown
        $parent.toggleClass('active');
        $dropdown.toggleClass('show');
    });

    // Close dropdown when clicking dropdown item
    $('.dropdown-item').click(function() {
        $('.hamburger').removeClass('active');
        $('.nav-menu').removeClass('active');
        $('body').removeClass('menu-open');
        $('.dropdown-menu').removeClass('show');
        $('.nav-item.has-dropdown').removeClass('active');
    });

    // Close menu when clicking regular nav item
    $('.nav-item:not(.has-dropdown)').click(function() {
        $('.hamburger').removeClass('active');
        $('.nav-menu').removeClass('active');
        $('body').removeClass('menu-open');
    });

    // Close menu and dropdowns when clicking outside
    $(document).click(function(event) {
        if (!$(event.target).closest('nav').length) {
            $('.hamburger').removeClass('active');
            $('.nav-menu').removeClass('active');
            $('body').removeClass('menu-open');
            $('.dropdown-menu').removeClass('show');
            $('.nav-item.has-dropdown').removeClass('active');
        }
    });

    // Prevent clicks inside nav menu from closing it
    $('.nav-menu').click(function(e) {
        e.stopPropagation();
    });

    // Navigation handling for non-dropdown items
    $('.nav-item:not(.has-dropdown)').click(function() {
        const page = $(this).data('page');
        const section = $(this).data('section');

        if (page) {
            window.location.href = page;
        } else if (section) {
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

    // Header show/hide: only visible at scrollY === 0
    function handleHeaderVisibility() {
        if (window.scrollY === 0) {
            $('nav.site-header').removeClass('hide');
        } else {
            $('nav.site-header').addClass('hide');
        }
    }
    // Initial check
    handleHeaderVisibility();
    // Listen to scroll
    $(window).on('scroll', handleHeaderVisibility);
});
</script>