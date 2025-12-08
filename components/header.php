<!-- Header Navigation Component -->
<nav>
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
.nav-item.has-dropdown {
    position: relative;
}

.nav-item .nav-link {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}

.dropdown-icon {
    font-size: 0.75em;
    transition: transform 0.3s ease;
    margin-left: auto;
}

.nav-item.has-dropdown.active .dropdown-icon {
    transform: rotate(180deg);
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    border-radius: 8px;
    min-width: 220px;
    padding: 8px 0;
    z-index: 1000;
    margin-top: 8px;
}

.dropdown-menu.show {
    display: block;
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 20px;
    color: #333;
    text-decoration: none;
    transition: background 0.2s;
}

.dropdown-item i {
    width: 20px;
    text-align: center;
}

.dropdown-item:hover {
    background: #f5f5f5;
}

/* Mobile styles */
@media (max-width: 768px) {
    .dropdown-menu {
        position: static;
        box-shadow: none;
        background: #f9f9f9;
    }

    .nav-item.has-dropdown {
    flex-direction: column;
    position: relative;
    justify-content: right;
    align-items: flex-start;
}
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
});
</script>