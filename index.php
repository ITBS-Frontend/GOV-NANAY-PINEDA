<?php
// Page specific variables
$pageTitle = "Gov. Lilia 'Nanay' Pineda - Official Portfolio";
$pageDescription = "Official portfolio showcasing transformative governance and development initiatives in Pampanga under Governor Lilia 'Nanay' Pineda.";
$additionalCSS = []; // Add any page-specific CSS files here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
</head>
<body>
    <!-- Header Navigation -->
    <?php include 'components/header.php'; ?>

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
            <div class="carousel-controls" id="carouselControls" style="display: none;"></div>

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
                    <div id="aboutPreview">
                        <div class="loading-container">
                            <div class="loading-spinner"></div>
                        </div>
                    </div>
                    <a href="about.php" class="learn-more-btn">
                        Learn More About Nanay Lilia
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="about-visual">
                    <div class="about-image-container">
                        <div class="about-shape shape-1"></div>
                        <div class="about-shape shape-2"></div>
                        <div class="about-shape shape-3"></div>
                        <div class="about-avatar">
                            <img id="aboutProfileImage" src="assets/profile.jpg" alt="Gov. Lilia Pineda">
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

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Scripts -->
    <?php include 'components/scripts.php'; ?>
    
    <!-- Page Specific JavaScript -->
    <script>
        $(document).ready(function() {
            const API_BASE = window.location.origin;
            
            let featuredProjects = [];
            let allProjects = [];
            let categories = [];
            let currentSlide = 0;
            let slideInterval;

            // Load all data
            loadFeaturedProjects();
            loadCategories();
            loadProjects();
            loadPoliticalJourney();
            loadAboutPreview();

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

            function loadAboutPreview() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/about/image`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data.image_url) {
                            $('#aboutProfileImage').attr('src', response.data.image_url);
                        }
                    }
                });
                
                $.ajax({
                    url: `${API_BASE}/Admin/api/about/content`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderAboutPreview(response.data);
                        }
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
                    
                    slidesHtml += `
                        <div class="carousel-slide ${isActive}"
                            style="background-image: url('${project.image_url || ''}');
                                    background-size: cover;
                                    background-position: center;">
                            <div class="slide-content">
                                <div class="slide-overlay"></div>
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
                                <a href="project-detail.php?id=${project.id}" class="project-read-more">
                                    Read More
                                    <i class="fas fa-arrow-right"></i>
                                </a>
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

            function renderAboutPreview(contentData) {
                let html = '';
                
                if (contentData.main && contentData.main.length > 0) {
                    const previewItems = contentData.main.slice(0, 2);
                    previewItems.forEach(item => {
                        html += `<p class="about-text">${item.content}</p>`;
                    });
                }
                
                $('#aboutPreview').html(html);
            }

            // Carousel functions
            function showSlide(index) {
                $('.carousel-slide').removeClass('active');
                $('.carousel-dot').removeClass('active');
                $('.carousel-slide').eq(index).addClass('active');
                $('.carousel-dot').eq(index).addClass('active');
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
                if (slideInterval) clearInterval(slideInterval);
            }

            // Event handlers
            $(document).on('click', '.carousel-next', nextSlide);
            $(document).on('click', '.carousel-prev', prevSlide);
            $(document).on('click', '.carousel-dot', function() {
                currentSlide = parseInt($(this).data('slide'));
                showSlide(currentSlide);
                startCarousel();
            });

            $('#carouselContainer').hover(stopCarousel, startCarousel);

            $(document).on('click', '.category-tab', function() {
                $('.category-tab').removeClass('active');
                $(this).addClass('active');
                
                const category = $(this).data('category');
                loadProjects(category === 'all' ? null : category);
            });
        });
    </script>
</body>
</html>