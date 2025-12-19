<?php
// Page specific variables
$pageTitle = "Pampanga Provincial Government - Official Website";
$pageDescription = "Official website of Pampanga Provincial Government showcasing programs, services, and development initiatives for the province.";
$additionalCSS = ['css/homepage.css']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
    <?php include 'components/scripts.php'; ?>
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
<style>
.about-pampanga-section {
    background: linear-gradient(110deg, rgba(195, 210, 232, 0.25) 0.45%, #FFF 100.78%);
}
</style>

        <!-- Projects Section -->
<section id="projects" class="projects-section">
    <div class="section-header">
        <h2 class="section-title">Recent Projects</h2>
        <p class="section-subtitle">
            Latest transformative initiatives positioning Pampanga as a model province
        </p>
    </div>

    <div class="projects-grid" id="recentProjectsGrid">
        <div class="loading-container">
            <div class="loading-spinner"></div>
        </div>
    </div>
    
    <div class="view-all-container" style="text-align: center; margin-top: 30px;">
        <a href="development.php" class="view-more">
            View All Projects <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

        <!-- UPDATED: About Pampanga Section -->
        <section id="about" class="about-pampanga-section">
            <div class="about-container">
                <div class="about-content">
                    <div class="section-label">Discover</div>
                    <h2>About Pampanga</h2>
                    <!-- <p class="about-intro">
                        The Culinary Capital of the Philippines and the heartland of Central Luzon
                    </p>
                     -->
                    <div id="pampangaPreview">
                        <div class="loading-container">
                            <div class="loading-spinner"></div>
                        </div>
                    </div>

                    <!-- Quick Facts Grid -->
                    <!-- <div class="quick-facts-grid" id="quickFactsGrid">
                        <div class="loading-container">
                            <div class="loading-spinner"></div>
                        </div>
                    </div> -->

                    <a href="about-pampanga.php" class="learn-more-btn">
                        Explore Pampanga's Rich History
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="about-visual">
                    <div class="about-image-showcase">
                        <!-- Main Image -->
                        <div class="main-showcase-image" id="showcaseMainImage">
                            <div class="image-placeholder"></div>
                        </div>
                        
                        <!-- Small Images Grid -->
                        <div class="showcase-grid">
                            <div class="showcase-item" id="showcaseImage1">
                                <div class="image-placeholder"></div>
                            </div>
                            <div class="showcase-item" id="showcaseImage2">
                                <div class="image-placeholder"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- NEW: Leadership Section -->
        <!-- <section id="leadership" class="leadership-section">
            <div class="leadership-container">
                <div class="leadership-image-col">
                    <div class="governor-card">
                        <div class="governor-image" id="governorImage">
                            <img src="assets/profile.jpg" alt="Gov. Lilia Nanay Pineda">
                        </div>
                        <div class="governor-info">
                            <h3>Gov. Lilia "Nanay" Pineda</h3>
                            <p class="governor-title">Vice Governor of Pampanga</p>
                            <div class="governor-social">
                                <a href="https://www.facebook.com/p/Gov-Nanay-Pineda-100083159116285/" target="_blank" class="social-link">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="leadership-content-col">
                    <div class="section-label">Provincial Leadership</div>
                    <h2>Leading with Heart and Vision</h2>
                    
                    <div id="governorBioPreview">
                        <div class="loading-container">
                            <div class="loading-spinner"></div>
                        </div>
                    </div>

                    <div class="leadership-highlights">
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-hospital"></i>
                            </div>
                            <div class="highlight-text">
                                <strong>Healthcare Champion</strong>
                                <p>Modernized provincial hospitals</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="highlight-text">
                                <strong>Education Advocate</strong>
                                <p>25,000+ scholarship graduates</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="highlight-text">
                                <strong>Economic Growth</strong>
                                <p>180,000+ jobs created</p>
                            </div>
                        </div>
                    </div>

                    <a href="government.php" class="learn-more-btn secondary">
                        View Full Profile & Government
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section> -->

        <!-- UPDATED: Pampanga History Timeline Section -->
        <!-- <section id="history" class="history-section">
            <div class="section-header">
                <div class="section-label">Our Heritage</div>
                <h2 class="section-title">Pampanga Through the Ages</h2>
                <p class="section-subtitle">
                    A rich history spanning centuries of culture, resilience, and progress
                </p>
            </div>

            <div class="history-timeline" id="historyTimeline">
                <div class="timeline-line"></div>
                <div class="loading-container">
                    <div class="loading-spinner"></div>
                </div>
            </div>
        </section> -->

        <!-- NEW: Key Initiatives Section -->
        <section class="key-initiatives-section">
            <div class="container">
                <div class="section-header">
                    <div class="section-label">What We Do</div>
                    <h2 class="section-title">Key Initiatives</h2>
                    <p class="section-subtitle">
                        Discover how we're transforming Pampanga through strategic programs and services
                    </p>
                </div>

                <div class="initiatives-grid">
                    <a href="tourism.php" class="initiative-card tourism">
                        <div class="initiative-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3>Tourism</h3>
                        <p>Explore Pampanga's rich heritage sites and natural attractions</p>
                        <span class="initiative-link">Discover More <i class="fas fa-arrow-right"></i></span>
                    </a>

                    <a href="programs.php" class="initiative-card programs">
                        <div class="initiative-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3>Programs & Services</h3>
                        <p>Social welfare, health, and education programs for all Kapampangans</p>
                        <span class="initiative-link">View Programs <i class="fas fa-arrow-right"></i></span>
                    </a>

                    <a href="development.php" class="initiative-card development">
                        <div class="initiative-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Development</h3>
                        <p>Infrastructure projects and economic growth initiatives</p>
                        <span class="initiative-link">See Projects <i class="fas fa-arrow-right"></i></span>
                    </a>

                    <a href="environment.php" class="initiative-card environment">
                        <div class="initiative-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3>Environment</h3>
                        <p>Sustainability and disaster preparedness programs</p>
                        <span class="initiative-link">Learn More <i class="fas fa-arrow-right"></i></span>
                    </a>
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
            loadPampangaHistory(); // Changed from loadPoliticalJourney
            // NEW: Load Pampanga and Governor data
            loadPampangaPreview();
            loadQuickFacts();
            loadGovernorBioPreview();
            loadRecentProjects();

            // Project Category Scroll Functionality
            function updateProjectScrollButtons() {
                const container = $('#categoryTabs')[0];
                const wrapper = $('#projectTabsWrapper');
                
                if (!container) return;
                
                const isScrollable = container.scrollWidth > container.clientWidth;
                const isAtStart = container.scrollLeft <= 10;
                const isAtEnd = container.scrollLeft >= container.scrollWidth - container.clientWidth - 10;
                
                // Show/hide scroll buttons
                if (isScrollable) {
                    $('#projectScrollLeft').toggleClass('show', !isAtStart);
                    $('#projectScrollRight').toggleClass('show', !isAtEnd);
                    
                    // Add gradient overlays
                    wrapper.toggleClass('show-left-gradient', !isAtStart);
                    wrapper.toggleClass('show-right-gradient', !isAtEnd);
                } else {
                    $('#projectScrollLeft, #projectScrollRight').removeClass('show');
                    wrapper.removeClass('show-left-gradient show-right-gradient');
                }
            }
            
            $('#projectScrollLeft').click(function() {
                const container = $('#categoryTabs')[0];
                container.scrollBy({ left: -200, behavior: 'smooth' });
                setTimeout(updateProjectScrollButtons, 300);
            });
            
            $('#projectScrollRight').click(function() {
                const container = $('#categoryTabs')[0];
                container.scrollBy({ left: 200, behavior: 'smooth' });
                setTimeout(updateProjectScrollButtons, 300);
            });
            
            $('#categoryTabs').on('scroll', function() {
                updateProjectScrollButtons();
            });
            
            $(window).on('resize', function() {
                updateProjectScrollButtons();
            });

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
                            setTimeout(updateProjectScrollButtons, 100);
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
            function loadRecentProjects() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/projects/recent?limit=6`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            displayRecentProjects(response.data);
                        } else {
                            showError('Failed to load projects');
                        }
                    },
                    error: function() {
                        showError('Failed to load projects');
                    }
                });
            }

            function displayRecentProjects(projects) {
                const grid = $('#recentProjectsGrid');
                
                if (!projects || projects.length === 0) {
                    grid.html('<p style="text-align: center;">No projects available</p>');
                    return;
                }
                
                let html = '';
                projects.forEach(project => {
                    html += `
                        <div class="project-card">
                            <div class="project-image">
                                <img src="${project.image_url || 'assets/images/default-project.jpg'}" 
                                    alt="${project.title}" loading="lazy">
                                <span class="project-category" style="background: ${project.color_code}">
                                    ${project.category_name || 'General'}
                                </span>
                            </div>
                            <div class="project-content">
                                <h3 class="project-title">${project.title}</h3>
                                <p class="project-description">${truncateText(project.description, 120)}</p>
                                <div class="project-meta">
                                  
                                    ${project.project_date ? `<span>Date: ${formatDate(project.project_date)}</span>` : ''}
                                </div>
                                <a href="project-detail.php?id=${project.id}" class="project-read-more">
                                    Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    `;
                });
                
                grid.html(html);
            }

            function truncateText(text, maxLength) {
                if (!text || text.length <= maxLength) return text;
                return text.substr(0, maxLength) + '...';
            }

            function formatDate(dateStr) {
                const date = new Date(dateStr);
                return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
            }

            function showError(message) {
                $('#recentProjectsGrid').html(`
                    <div style="text-align: center; padding: 40px;">
                        <i class="fas fa-exclamation-circle" style="font-size: 48px; color: #e53e3e;"></i>
                        <p style="margin-top: 15px;">${message}</p>
                    </div>
                `);
            }

            function loadPampangaHistory() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/history`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderHistoryTimeline(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading Pampanga history:', error);
                        $('#historyTimeline').html('<p class="text-center">Unable to load history timeline</p>');
                    }
                });
            }

            // NEW: Load Pampanga preview
            function loadPampangaPreview() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/preview`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderPampangaPreview(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading Pampanga preview:', error);
                        $('#pampangaPreview').html('<p class="about-text">Pampanga, the Culinary Capital of the Philippines, is a vibrant province in Central Luzon known for its rich history, delicious cuisine, and warm hospitality.</p>');
                    }
                });
            }

            // NEW: Load Quick Facts
            function loadQuickFacts() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/quick-facts`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderQuickFacts(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading quick facts:', error);
                        const fallbackFacts = [
                            { label: 'Municipalities', value: '19', icon: 'fas fa-map' },
                            { label: 'Population', value: '2.6M+', icon: 'fas fa-users' },
                            { label: 'Area', value: '2,181 km²', icon: 'fas fa-expand' }
                        ];
                        renderQuickFacts(fallbackFacts);
                    }
                });
            }

            // NEW: Load Governor Bio Preview
            function loadGovernorBioPreview() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/about/preview`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderGovernorBioPreview(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading governor bio:', error);
                    }
                });

                $.ajax({
                    url: `${API_BASE}/Admin/api/about/image`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data.image_url) {
                            $('#governorImage img').attr('src', response.data.image_url);
                        }
                    }
                });
            }

            // Render Functions (Keep existing ones, add new ones)
            function renderCarousel() {
                if (featuredProjects.length === 0) {
                    $('#carouselContainer').html('<p class="text-center">No featured projects available</p>');
                    return;
                }
                
                let slidesHtml = '';
                let dotsHtml = '';
                
                featuredProjects.forEach((project, index) => {
                    const isActive = index === 0 ? 'active' : '';
                    
                    slidesHtml += `
                        <div class="carousel-slide ${isActive}">
                            <div class="slide-content">
                                <div class="slide-text" style="background: ${project.color_code || '#3B82F6'}">
                                    <span class="slide-category" style="background: ${project.color_code || '#3B82F6'}">
                                        ${project.category_name || 'Project'}
                                    </span>
                                    <h1 class="slide-title">${project.title}</h1>
                                    <p class="slide-description">${project.description}</p>
                                    <div class="slide-links">
                                        <a href="project-detail.php?id=${project.id}" class="project-read-more-home">
                                        Read More
                                    
                                         </a>
                                       
                                    </div>
                                </div>
                                <div class="slide-picture">
                                    <img src="${project.image_url || 'assets/placeholder.jpg'}" alt="${project.title}" />
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
                    const count = category.project_count > 0 ? `<span class="category-count">${category.project_count}</span>` : '';
                    tabsHtml += `
                        <div class="category-tab" data-category="${category.id}">
                            ${category.name}${count}
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
                if (journeyData.length === 0) {
                    $('#timelineContainer').html('<p class="text-center">No timeline data available</p>');
                    return;
                }
                
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

            // NEW: Render Pampanga History Timeline
            function renderHistoryTimeline(historyData) {
                if (historyData.length === 0) {
                    $('#historyTimeline').html('<p class="text-center">No history data available</p>');
                    return;
                }
                
                let timelineHtml = '<div class="timeline-line"></div>';
                
                historyData.forEach((item, index) => {
                    const isLeft = index % 2 === 0;
                    
                    timelineHtml += `
                        <div class="history-item ${isLeft ? 'left' : 'right'}">
                            <div class="history-content">
                                ${item.image_url ? `
                                    <div class="history-image">
                                        <img src="${item.image_url}" alt="${item.title}">
                                    </div>
                                ` : ''}
                                <div class="history-year">${item.timeline_year || item.period}</div>
                                <h3 class="history-title">${item.title}</h3>
                                ${item.period ? `<div class="history-period">${item.period}</div>` : ''}
                                <p class="history-description">${item.content}</p>
                            </div>
                            <div class="history-dot"></div>
                            ${isLeft ? '<div class="timeline-spacer"></div>' : ''}
                            ${!isLeft ? '<div class="timeline-spacer"></div>' : ''}
                        </div>
                    `;
                });
                
                $('#historyTimeline').html(timelineHtml);
            }

            // NEW: Render Pampanga Preview
            function renderPampangaPreview(data) {
                    const html = `<p class="about-text">${data.content || ''}</p>`;
                    $('#pampangaPreview').html(html);
                    
                    // Update showcase images
                    if (data.main_image) {
                        $('#showcaseMainImage').html(`<img src="${data.main_image}" alt="Pampanga">`);
                    }
                    
                    if (data.showcase_image_1) {
                        $('#showcaseImage1').html(`<img src="${data.showcase_image_1}" alt="Pampanga">`);
                    }
                    
                    if (data.showcase_image_2) {
                        $('#showcaseImage2').html(`<img src="${data.showcase_image_2}" alt="Pampanga">`);
                    }
                }

                            // NEW: Render Quick Facts
                        function renderQuickFacts(facts) {
                    const html = facts.map(fact => `
                        <div class="fact-item">
                            <div class="fact-icon">
                                <i class="${fact.icon}"></i>
                            </div>
                            <div class="fact-details">
                                <div class="fact-value">${fact.title}</div>
                                <div class="fact-label">${fact.description}</div>
                            </div>
                        </div>
                    `).join('');
                    
                    $('#quickFactsGrid').html(html);
                }

            // NEW: Render Governor Bio Preview
            function renderGovernorBioPreview(data) {
                let html = '';
                if (data.content && data.content.length > 0) {
                    html = `<p class="bio-text">${data.content[0].content}</p>`;
                }
                $('#governorBioPreview').html(html);
            }

            // Carousel functions (Keep existing)
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
                if (featuredProjects.length > 1) {
                    slideInterval = setInterval(nextSlide, 5000);
                }
            }

            function stopCarousel() {
                if (slideInterval) clearInterval(slideInterval);
            }

            // Event handlers (Keep existing)
            $(document).on('click', '.carousel-next', function(e) {
                e.preventDefault();
                nextSlide();
                startCarousel();
            });
            
            $(document).on('click', '.carousel-prev', function(e) {
                e.preventDefault();
                prevSlide();
                startCarousel();
            });
            
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