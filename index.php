<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gov. Lilia "Nanay" Pineda - Official Portfolio</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
     
</head>
<body>
    <!-- Sidebar Navigation -->
    <nav class="">
        <div class="logo">LP</div>
        <button class="hamburger" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="nav-menu">
            <div class="nav-item active" data-section="hero">
                <i class="fas fa-home"></i>
                <span class="nav-tooltip">Home</span>
            </div>
            <div class="nav-item" data-section="projects">
                <i class="fas fa-briefcase"></i>
                <span class="nav-tooltip">Projects</span>
            </div>
            <div class="nav-item" data-section="about">
                <i class="fas fa-user"></i>
                <span class="nav-tooltip">About</span>
            </div>
            <div class="nav-item" data-section="journey">
                <i class="fas fa-route"></i>
                <span class="nav-tooltip">Journey</span>
            </div>
            <div class="indicator"></div> <!-- moved here -->
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section with Carousel -->
        <section id="hero" class="hero-section">
            <div class="carousel-container" id="carouselContainer">
                <div class="loading-container">
                    <div class="loading-spinner"></div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <div class="carousel-controls" id="carouselControls" style="display: none;">
            </div>

            <div class="carousel-nav carousel-prev" style="display: none;">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="carousel-nav carousel-next" style="display: none;">
                <i class="fas fa-chevron-right"></i>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="projects-section">
            <div class="section-header">
                <h2 class="section-title">Governance Portfolio</h2>
                <p class="section-subtitle">
                    Transformative initiatives that have positioned Pampanga as a model 
                    province through innovative governance and inclusive development.
                </p>
            </div>

            <div class="category-tabs" id="categoryTabs">
                <div class="loading-spinner"></div>
            </div>

            <div class="projects-grid" id="projectsGrid">
                <div class="loading-container">
                    <div class="loading-spinner"></div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about-section">
            <div class="about-container">
                <div class="about-content">
                    <h2>About Nanay Lilia</h2>
                    <p class="about-text">
                        Born Lilia Paule Garcia on February 21, 1951, Governor Lilia "Nanay" 
                        Pineda has dedicated over three decades to public service in Pampanga. 
                        Known for her compassionate leadership and innovative governance, she 
                        has transformed the province through strategic development programs and 
                        inclusive policies that put Kapampangans first.
                    </p>
                    <p class="about-text">
                        From her early days as a community leader to becoming one of the 
                        Philippines' most respected governors, Nanay Lilia's journey is marked by 
                        unwavering commitment to progress, transparency, and social justice. Her 
                        legacy continues to shape Pampanga's future as a progressive province in 
                        Central Luzon.
                    </p>
                </div>
                <div class="about-visual">
                    <div class="about-image-container">
                        <div class="about-shape shape-1"></div>
                        <div class="about-shape shape-2"></div>
                        <div class="about-shape shape-3"></div>
                        <div class="about-avatar">
                            <img src="assets/profile.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Political Journey Section -->
        <section id="journey" class="journey-section">
            <div class="section-header">
                <h2 class="section-title">Political Journey</h2>
                <p class="section-subtitle">
                    A remarkable career spanning decades of dedicated public service 
                    and transformative leadership in Pampanga.
                </p>
            </div>

            <div class="timeline-container" id="timelineContainer">
                <div class="timeline-line"></div>
                <div class="loading-container">
                    <div class="loading-spinner"></div>
                </div>
            </div>
        </section>
    </main>

    <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // API Base URL - adjust based on your setup
            const API_BASE = window.location.origin;
            //  const API_BASE = '/admin';
            
            // State management
            let featuredProjects = [];
            let allProjects = [];
            let categories = [];
            let currentSlide = 0;
            let slideInterval;

            // Load all data on page load
            loadFeaturedProjects();
            loadCategories();
            loadProjects();
            loadPoliticalJourney();
            loadPortfolioStats();

            // API Functions
            function loadFeaturedProjects() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/projects/featured`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            featuredProjects = response.data;
                            renderCarousel();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading featured projects:', error);
                        $('#carouselContainer').html('<p class="text-center">Error loading featured projects</p>');
                    }
                });
            }

            function loadCategories() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/categories`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            categories = response.data;
                            renderCategoryTabs();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading categories:', error);
                    }
                });
            }

            function loadProjects(categoryId = null) {
                const url = categoryId ? `${API_BASE}/Admin/api/projects?category=${categoryId}` : `${API_BASE}/Admin/api/projects`;
                
                $('#projectsGrid').html('<div class="loading-container"><div class="loading-spinner"></div></div>');
                
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            allProjects = response.data;
                            renderProjects();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading projects:', error);
                        $('#projectsGrid').html('<p class="text-center">Error loading projects</p>');
                    }
                });
            }

            function loadPoliticalJourney() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/journey`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderTimeline(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading political journey:', error);
                    }
                });
            }

            function loadPortfolioStats() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/stats`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderStats(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading portfolio stats:', error);
                    }
                });
            }


            // Render Functions
            function renderCarousel() {
                if (featuredProjects.length === 0) return;
                
                let slidesHtml = '';
                let dotsHtml = '';
                
                featuredProjects.forEach((project, index) => {
                    const isActive = index === 0 ? 'active' : '';
                    const slideNumber = String(project.project_number || index + 1).padStart(2, '0');
                    
                    slidesHtml += `
                        <div class="carousel-slide ${isActive}"
                            style="background-image: url('${project.image_url || ''}');
                                    background-size: cover;
                                    background-position: center;">
                            <div class="slide-content">
                                <div class="slide-text">
                                    <span class="slide-category" style="background: ${project.color_code || '#3B82F6'}">
                                        ${project.category_name || 'Project'}
                                    </span>
                                    <h1 class="slide-title">${project.title}</h1>
                                    <p class="slide-description">${project.description}</p>
                                </div>
                    
                            </div>
                        </div>
                    `;

                    
                    dotsHtml += `<span class="carousel-dot ${isActive}" data-slide="${index}"></span>`;
                });
                
                $('#carouselContainer').html(slidesHtml);
                $('#carouselControls').html(dotsHtml).show();
                $('.carousel-nav').show();
                
                // Start auto-play
                startCarousel();
            }

            function renderCategoryTabs() {
                let tabsHtml = '<div class="category-tab active" data-category="all">All Projects</div>';
                
                categories.forEach(category => {
                    tabsHtml += `
                        <div class="category-tab" data-category="${category.id}">
                            ${category.name}
                            ${category.project_count > 0 ? `<span class="category-count">${category.project_count}</span>` : ''}
                        </div>
                    `;
                });
                
                $('#categoryTabs').html(tabsHtml);
            }

            function renderProjects() {
                if (allProjects.length === 0) {
                    $('#projectsGrid').html('<p class="text-center">No projects found</p>');
                    return;
                }
                
                let projectsHtml = '';
                
                allProjects.forEach(project => {
                    const projectNumber = project.display_number || String(project.project_number || '').padStart(2, '0');
                    
                    projectsHtml += `
                        <div class="project-card">
                            <div class="project-image" style="background: linear-gradient(135deg, ${project.color_code || '#3B82F6'}, ${project.color_code || '#3B82F6'}99);">
                                ${project.image_url ? `<img src="${project.image_url}" alt="${project.title}">` : ''}
                                <div class="project-number">${projectNumber}</div>
                            </div>
                            <div class="project-content">
                                <span class="project-category">${project.category_name || 'Project'}</span>
                                <h3 class="project-title">${project.title}</h3>
                                <p class="project-description">${project.description}</p>
                            
                            </div>
                        </div>
                    `;
                });
                
                $('#projectsGrid').html(projectsHtml);
            }

            function renderTimeline(journeyData) {
                if (journeyData.length === 0) return;
                
                let timelineHtml = '<div class="timeline-line"></div>';
                
                journeyData.forEach((item, index) => {
                    const isEven = index % 2 === 0;
                    const duration = item.duration_display || `${item.start_year}-${item.end_year || 'Present'}`;
                    
                    timelineHtml += `
                        <div class="timeline-item">
                            ${isEven ? '<div class="timeline-spacer"></div>' : ''}
                            <div class="timeline-content">
                                <div class="timeline-date">
                                    ${duration}
                                    ${item.is_current ? '<span class="current-badge">Current</span>' : ''}
                                </div>
                                <h3 class="timeline-title">${item.position_title}</h3>
                                <p class="timeline-description">${item.description}</p>
                            </div>
                            ${!isEven ? '<div class="timeline-spacer"></div>' : ''}
                            <div class="timeline-dot"></div>
                        </div>
                    `;
                });
                
                $('#timelineContainer').html(timelineHtml);
            }

            // Carousel functionality
            function showSlide(index) {
                const slides = $('.carousel-slide');
                const dots = $('.carousel-dot');
                
                slides.removeClass('active');
                dots.removeClass('active');
                
                slides.eq(index).addClass('active');
                dots.eq(index).addClass('active');
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % featuredProjects.length;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + featuredProjects.length) % featuredProjects.length;
                showSlide(currentSlide);
            }

            function startCarousel() {
                stopCarousel();
                slideInterval = setInterval(nextSlide, 5000);
            }

            function stopCarousel() {
                if (slideInterval) {
                    clearInterval(slideInterval);
                }
            }

            // Event Handlers
            $(document).on('click', '.carousel-next', nextSlide);
            $(document).on('click', '.carousel-prev', prevSlide);
            
            $(document).on('click', '.carousel-dot', function() {
                currentSlide = parseInt($(this).data('slide'));
                showSlide(currentSlide);
                startCarousel(); // Restart auto-play
            });

            // Pause carousel on hover
            $('#carouselContainer').hover(stopCarousel, startCarousel);

            // Category filter
            $(document).on('click', '.category-tab', function() {
                $('.category-tab').removeClass('active');
                $(this).addClass('active');
                
                const category = $(this).data('category');
                loadProjects(category === 'all' ? null : category);
            });

            $('.nav-item').click(function() {
                $('.nav-item').removeClass('active');
                $(this).addClass('active');

                // Slide the indicator immediately
                let itemTop = $(this).position().top;
                $('.indicator').stop().animate({ top: itemTop }, 300); // smooth move

                // Scroll to section
                const section = $(this).data('section');
                const target = $('#' + section);
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 800);
                }
            });

            // Scroll spy (updates indicator on manual scroll)
            $(window).scroll(function() {
                const scrollPos = $(document).scrollTop() + 100;
                $('section').each(function() {
                    const top = $(this).offset().top;
                    const bottom = top + $(this).outerHeight();
                    const id = $(this).attr('id');

                    if (scrollPos >= top && scrollPos <= bottom) {
                        $('.nav-item').removeClass('active');
                        let activeItem = $(`.nav-item[data-section="${id}"]`);
                        activeItem.addClass('active');

                        // Smoothly slide indicator to active item
                        $('.indicator').stop().animate({ top: activeItem.position().top }, 300);
                    }
                });
            });



            // Animate elements on scroll
            function animateOnScroll() {
                $('.project-card, .timeline-item').each(function() {
                    const elementTop = $(this).offset().top;
                    const elementBottom = elementTop + $(this).outerHeight();
                    const viewportTop = $(window).scrollTop();
                    const viewportBottom = viewportTop + $(window).height();
                    
                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $(this).css({
                            'opacity': '1',
                            'transform': 'translateY(0)'
                        });
                    }
                });
            }

            $(window).on('scroll', animateOnScroll);
            animateOnScroll();
        });

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
        });
</script>

</body>
</html>