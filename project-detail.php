<?php
$pageTitle = "Project Details - Gov. Lilia 'Nanay' Pineda";
$pageDescription = "Detailed information about governance projects in Pampanga.";
$additionalCSS = ['css/project-detail.css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
</head>
<body>
    <div class="project-detail-page">
        <!-- Back Button -->
        <a href="index.php#projects" class="back-button" title="Back to Projects">
            <i class="fas fa-arrow-left"></i>
        </a>

        <!-- Loading State -->
        <div id="loadingState" class="loading-container" style="min-height: 100vh;">
            <div class="loading-spinner"></div>
        </div>

        <!-- Project Content -->
        <div id="projectContent" style="display: none;">
            <!-- Hero Section -->
            <section class="project-hero" id="projectHero">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <span class="hero-category" id="heroCategory"></span>
                    <h1 class="hero-title" id="heroTitle"></h1>
                    <div class="hero-meta" id="heroMeta"></div>
                </div>
            </section>

            <!-- Project Details Container -->
            <div class="project-container">
                <!-- Main Content -->
                <div class="project-main">
                    <!-- Overview Section -->
                    <section class="detail-section">
                        <h2 class="section-heading">
                            <i class="fas fa-info-circle"></i>
                            Project Overview
                        </h2>
                        <p class="overview-text" id="overviewText"></p>
                    </section>

                    <!-- Stats Section -->
                    <!-- <section class="detail-section">
                        <div class="stats-grid" id="statsGrid"></div>
                    </section> -->

                    <!-- Objectives Section -->
                    <section class="detail-section">
                        <h2 class="section-heading">
                            <i class="fas fa-bullseye"></i>
                            Project Objectives
                        </h2>
                        <p class="content-text" id="objectivesText"></p>
                    </section>

                    <!-- Highlights Section -->
                    <section class="detail-section" id="highlightsSection">
                        <h2 class="section-heading">
                            <i class="fas fa-star"></i>
                            Key Highlights
                        </h2>
                        <ul class="highlights-list" id="highlightsList"></ul>
                    </section>

                    <!-- Impact Section -->
                    <section class="detail-section">
                        <h2 class="section-heading">
                            <i class="fas fa-chart-line"></i>
                            Impact & Results
                        </h2>
                        <p class="content-text" id="impactText"></p>
                    </section>

                    <!-- Gallery Section -->
                    <section class="detail-section" id="gallerySection" style="display: none;">
                        <h2 class="section-heading">
                            <i class="fas fa-images"></i>
                            Project Gallery
                        </h2>
                        <div class="gallery-grid" id="galleryGrid"></div>
                    </section>
                </div>

                <!-- Sidebar -->
                <aside class="project-sidebar">
                    <!-- Info Card -->
                    <div class="sidebar-card">
                        <h3 class="card-title">Project Information</h3>
                        <div class="info-list" id="infoList"></div>
                    </div>

                    <!-- Related Projects -->
                    <div class="sidebar-card" id="relatedCard" style="display: none;">
                        <h3 class="card-title">Related Projects</h3>
                        <div class="related-projects" id="relatedProjects"></div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    
    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
    
        <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const API_BASE = window.location.origin;
            
            // Get project ID from URL parameter
            const urlParams = new URLSearchParams(window.location.search);
            const projectId = urlParams.get('id');
            
            if (!projectId) {
                alert('No project specified');
                window.location.href = 'index.php#projects';
                return;
            }
            
            // Load project details
            loadProjectDetails(projectId);
            
            function loadProjectDetails(id) {
                $.ajax({
                    url: `${API_BASE}/Admin/api/projects/${id}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderProjectDetails(response.data);
                            $('#loadingState').hide();
                            $('#projectContent').fadeIn();
                            
                            // Load related projects
                            if (response.data.category_id) {
                                loadRelatedProjects(response.data.category_id, id);
                            }
                        } else {
                            alert('Project not found');
                            window.location.href = 'index.php#projects';
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading project:', error);
                        alert('Failed to load project details');
                        window.location.href = 'index.php#projects';
                    }
                });
            }
            
            function renderProjectDetails(project) {
                // Update page title
                document.title = `${project.title} - Gov. Lilia "Nanay" Pineda`;
                
                // Hero Section
                if (project.image_url) {
                    $('#projectHero').css('background-image', `url('${project.image_url}')`);
                }
                $('#heroCategory').text(project.category_name || 'Project');
                $('#heroCategory').css('background', project.color_code || '#3B82F6');
                $('#heroTitle').text(project.title);
                
                // Hero Meta
                let metaHtml = '';
                if (project.location) {
                    metaHtml += `
                        <div class="meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>${project.location}</span>
                        </div>
                    `;
                }
                if (project.status) {
                    metaHtml += `
                        <div class="meta-item">
                            <i class="fas fa-check-circle"></i>
                            <span>${project.status}</span>
                        </div>
                    `;
                }
                if (project.start_date) {
                    const startYear = new Date(project.start_date).getFullYear();
                    const endYear = project.end_date ? new Date(project.end_date).getFullYear() : 'Present';
                    metaHtml += `
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>${startYear} - ${endYear}</span>
                        </div>
                    `;
                }
                $('#heroMeta').html(metaHtml);
                
                // Overview
                $('#overviewText').text(project.full_description || project.description);
                
                // Stats
                if (project.stats && project.stats.length > 0) {
                    let statsHtml = '';
                    project.stats.forEach(stat => {
                        statsHtml += `
                            <div class="stat-card">
                                <div class="stat-value">${stat.value}</div>
                                <div class="stat-label">${stat.label}</div>
                            </div>
                        `;
                    });
                    $('#statsGrid').html(statsHtml);
                } else {
                    $('#statsGrid').closest('.detail-section').hide();
                }
                
                // Objectives
                $('#objectivesText').text(project.objectives || 'Information not available');
                
                // Highlights
                if (project.highlights && project.highlights.length > 0) {
                    let highlightsHtml = '';
                    project.highlights.forEach(highlight => {
                        highlightsHtml += `<li>${highlight.highlight_text}</li>`;
                    });
                    $('#highlightsList').html(highlightsHtml);
                } else {
                    $('#highlightsSection').hide();
                }
                
                // Impact
                $('#impactText').text(project.impact || 'Information not available');
                
                // Gallery
                if (project.gallery && project.gallery.length > 0) {
                    let galleryHtml = '';
                    project.gallery.forEach(image => {
                        galleryHtml += `
                            <div class="gallery-item">
                                <img src="${image.url}" alt="${image.caption || project.title}">
                                ${image.caption ? `<p class="gallery-caption">${image.caption}</p>` : ''}
                            </div>
                        `;
                    });
                    $('#galleryGrid').html(galleryHtml);
                    $('#gallerySection').show();
                }
                
                // Sidebar Info
                let infoHtml = '';
                
                if (project.category_name) {
                    infoHtml += `
                        <div class="info-item">
                            <div class="info-icon" style="background: ${project.color_code || '#3B82F6'}">
                                <i class="fas fa-folder"></i>
                            </div>
                            <div class="info-content">
                                <h4>Category</h4>
                                <p>${project.category_name}</p>
                            </div>
                        </div>
                    `;
                }
                
                if (project.budget_display) {
                    infoHtml += `
                        <div class="info-item">
                            <div class="info-icon" style="background: #10B981">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="info-content">
                                <h4>Budget</h4>
                                <p>${project.budget_display}</p>
                            </div>
                        </div>
                    `;
                }
                
                if (project.location) {
                    infoHtml += `
                        <div class="info-item">
                            <div class="info-icon" style="background: #F59E0B">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Location</h4>
                                <p>${project.location}</p>
                            </div>
                        </div>
                    `;
                }
                
                if (project.start_date) {
                    infoHtml += `
                        <div class="info-item">
                            <div class="info-icon" style="background: #8B5CF6">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <div class="info-content">
                                <h4>Timeline</h4>
                                <p>${formatDate(project.start_date)} - ${project.end_date ? formatDate(project.end_date) : 'Present'}</p>
                            </div>
                        </div>
                    `;
                }
                
                if (project.status) {
                    const statusColor = project.status === 'Ongoing' ? '#3B82F6' : '#10B981';
                    infoHtml += `
                        <div class="info-item">
                            <div class="info-icon" style="background: ${statusColor}">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="info-content">
                                <h4>Status</h4>
                                <p>${project.status}</p>
                            </div>
                        </div>
                    `;
                }
                
                $('#infoList').html(infoHtml);
            }
            
            function loadRelatedProjects(categoryId, currentProjectId) {
                $.ajax({
                    url: `${API_BASE}/Admin/api/projects?category=${categoryId}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            const related = response.data.filter(p => p.id != currentProjectId).slice(0, 3);
                            if (related.length > 0) {
                                renderRelatedProjects(related);
                            }
                        }
                    }
                });
            }
            
            function renderRelatedProjects(projects) {
                let html = '';
                projects.forEach(project => {
                    html += `
                        <a href="project-detail.php?id=${project.id}" class="related-item">
                            <div class="related-image" style="background: linear-gradient(135deg, ${project.color_code}, ${project.color_code}99);">
                                ${project.image_url ? `<img src="${project.image_url}" alt="${project.title}">` : ''}
                            </div>
                            <div class="related-content">
                                <h4>${project.title}</h4>
                                <p>${project.category_name}</p>
                            </div>
                        </a>
                    `;
                });
                $('#relatedProjects').html(html);
                $('#relatedCard').show();
            }
            
            function formatDate(dateString) {
                const date = new Date(dateString);
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return date.toLocaleDateString('en-US', options);
            }
            
            // Smooth page load
            $('body').css('opacity', '0').animate({opacity: 1}, 500);
            
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
        });
    </script>
</body>
</html>