<!-- Header Navigation Component -->
<nav>
     <div class="logo-icon"><img src="assets/profile.jpg" alt=""></div>
    <button class="hamburger" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <div class="nav-menu">
        <div class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" data-section="hero">
            <i class="fas fa-home"></i>
            <span class="nav-tooltip">Home</span>
        </div>
        <div class="nav-item" data-section="projects">
            <i class="fas fa-briefcase"></i>
            <span class="nav-tooltip">Projects</span>
        </div>
        <div class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" data-section="about">
            <i class="fas fa-user"></i>
            <span class="nav-tooltip">About</span>
        </div>
        <div class="nav-item" data-section="journey">
            <i class="fas fa-route"></i>
            <span class="nav-tooltip">Journey</span>
        </div>
        <div class="indicator"></div>
    </div>
</nav>

<script>
// Hamburger menu toggle
$('.hamburger').click(function() {
    $(this).toggleClass('active');
    $('.nav-menu').toggleClass('active');
});

// Close menu when clicking nav item
$('.nav-item').click(function() {
    $('.hamburger').removeClass('active');
    $('.nav-menu').removeClass('active');
});

// Close menu when clicking outside
$(document).click(function(event) {
    if (!$(event.target).closest('nav').length) {
        $('.hamburger').removeClass('active');
        $('.nav-menu').removeClass('active');
    }
});

// Navigation handling
$('.nav-item').click(function() {
    const section = $(this).data('section');
    
    // Handle different navigation based on section
    if (section === 'about') {
        window.location.href = 'about.php';
        return;
    }
    
    // Check if we're on index page
    if (window.location.pathname.includes('index.php') || window.location.pathname === '/') {
        // Scroll to section on same page
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
        
        const target = $('#' + section);
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 800);
        }
    } else {
        // Navigate to index page with hash
        window.location.href = 'index.php#' + section;
    }
});
</script>