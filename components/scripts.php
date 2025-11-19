<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Common Scripts -->
<script>
$(document).ready(function() {
    // Scroll to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.scroll-top').addClass('show');
        } else {
            $('.scroll-top').removeClass('show');
        }
    });

    $('.scroll-top').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });

    // Smooth page load animation
    $('body').css('opacity', '0').animate({opacity: 1}, 500);

    // Handle hash navigation on page load
    if (window.location.hash) {
        setTimeout(function() {
            const target = $(window.location.hash);
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 800);
            }
        }, 500);
    }
});
</script>