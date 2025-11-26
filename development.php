<?php
$pageTitle = 'Infrastructure & Development - Gov. Lilia "Nanay" Pineda';
$pageDescription = 'Infrastructure projects and economic development initiatives in Pampanga';
$additionalCSS = ['css/development.css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
      <?php include 'components/scripts.php'; ?>
</head>
<body>
    <?php include 'components/header.php'; ?>

    <!-- Hero Section -->
    <section class="page-hero">
        <div class="hero-content">
            <h1 class="hero-title">Infrastructure & Development</h1>
            <p class="hero-subtitle">Building Pampanga's future through strategic infrastructure and economic development</p>
        </div>
    </section>

    <!-- Economic Overview Section -->
    <section class="economic-overview">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Economic Indicators</h2>
                <p class="section-subtitle">Key economic performance metrics of Pampanga</p>
            </div>
            
            <div class="indicators-grid" id="indicatorsGrid">
                <div class="loading-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading indicators...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Sectors Section -->
    <section class="business-sectors">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Key Business Sectors</h2>
                <p class="section-subtitle">Major economic drivers of the province</p>
            </div>
            
            <div class="sectors-grid" id="sectorsGrid">
                <div class="loading-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading sectors...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Infrastructure Projects Section -->
    <section class="infrastructure-projects">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Infrastructure Projects</h2>
                <p class="section-subtitle">Major development projects transforming Pampanga</p>
            </div>

            <!-- Municipality Filter -->
            <div class="filter-tabs" id="municipalityTabs">
                <button class="filter-tab active" data-municipality="">All Projects</button>
            </div>

            <!-- Projects Grid -->
            <div class="projects-grid" id="projectsGrid">
                <div class="loading-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading projects...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Opportunities Section -->
    <section class="investment-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Investment Opportunities</h2>
                <p class="section-subtitle">Explore investment opportunities in Pampanga</p>
            </div>
            
            <div class="opportunities-grid" id="opportunitiesGrid">
                <div class="loading-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading opportunities...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Detail Modal -->
    <div class="modal" id="projectModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <button class="modal-close">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal-body" id="projectModalBody"></div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            const API_BASE = window.location.origin;
            let allProjects = [];
            let municipalities = [];

            // Load all data
            loadEconomicIndicators();
            loadBusinessSectors();
            loadInfrastructureProjects();
            loadInvestmentOpportunities();

            // Municipality filter click
            $(document).on('click', '.filter-tab', function() {
                $('.filter-tab').removeClass('active');
                $(this).addClass('active');
                const municipality = $(this).data('municipality');
                loadInfrastructureProjects(municipality);
            });

            // Project card click
            $(document).on('click', '.project-card', function() {
                const projectData = $(this).data('project');
                showProjectModal(projectData);
            });

            // Modal close
            $('.modal-close, .modal-overlay').on('click', function() {
                $('#projectModal').removeClass('active');
            });

            function loadEconomicIndicators() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/development/economic-indicators`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            renderIndicators(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load indicators:', error);
                        $('#indicatorsGrid').html(`
                            <div class="error-state">
                                <i class="fas fa-exclamation-circle"></i>
                                <p>Failed to load economic indicators.</p>
                            </div>
                        `);
                    }
                });
            }

            function loadBusinessSectors() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/development/business-sectors`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            renderBusinessSectors(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load sectors:', error);
                    }
                });
            }

            function loadInfrastructureProjects(municipality = '') {
                const url = municipality 
                    ? `${API_BASE}/Admin/api/development/infrastructure?municipality=${municipality}`
                    : `${API_BASE}/Admin/api/development/infrastructure`;

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            allProjects = response.data;
                            renderProjects(allProjects);
                            extractMunicipalities(allProjects);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load projects:', error);
                        $('#projectsGrid').html(`
                            <div class="error-state">
                                <i class="fas fa-exclamation-circle"></i>
                                <p>Failed to load projects.</p>
                            </div>
                        `);
                    }
                });
            }

            function loadInvestmentOpportunities() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/development/investment-opportunities`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            renderOpportunities(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load opportunities:', error);
                    }
                });
            }

            function renderIndicators(indicators) {
                if (!indicators || indicators.length === 0) {
                    $('#indicatorsGrid').html('<p class="text-center">No indicators available.</p>');
                    return;
                }

                let html = '';
                indicators.forEach(function(indicator) {
                    html += `
                        <div class="indicator-card">
                            <div class="indicator-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="indicator-content">
                                <h3 class="indicator-name">${indicator.indicator_name}</h3>
                                <div class="indicator-value">${indicator.value} ${indicator.unit || ''}</div>
                                <div class="indicator-meta">
                                    ${indicator.year ? `<span class="indicator-year">${indicator.year}</span>` : ''}
                                    ${indicator.quarter ? `<span class="indicator-quarter">Q${indicator.quarter}</span>` : ''}
                                </div>
                            </div>
                        </div>
                    `;
                });

                $('#indicatorsGrid').html(html);
            }

            function renderBusinessSectors(sectors) {
                if (!sectors || sectors.length === 0) {
                    $('#sectorsGrid').html('<p class="text-center">No sectors available.</p>');
                    return;
                }

                let html = '';
                sectors.forEach(function(sector) {
                    html += `
                        <div class="sector-card">
                            <div class="sector-icon">
                                <i class="${sector.icon_class || 'fas fa-industry'}"></i>
                            </div>
                            <h3 class="sector-name">${sector.sector_name}</h3>
                            <p class="sector-description">${sector.description || ''}</p>
                            <div class="sector-stats">
                                ${sector.number_of_establishments ? `
                                    <div class="sector-stat">
                                        <span class="stat-value">${sector.number_of_establishments}</span>
                                        <span class="stat-label">Establishments</span>
                                    </div>
                                ` : ''}
                                ${sector.employment_generated ? `
                                    <div class="sector-stat">
                                        <span class="stat-value">${sector.employment_generated}</span>
                                        <span class="stat-label">Jobs</span>
                                    </div>
                                ` : ''}
                                ${sector.contribution_to_gdp ? `
                                    <div class="sector-stat">
                                        <span class="stat-value">${sector.contribution_to_gdp}%</span>
                                        <span class="stat-label">GDP Share</span>
                                    </div>
                                ` : ''}
                            </div>
                        </div>
                    `;
                });

                $('#sectorsGrid').html(html);
            }

            function extractMunicipalities(projects) {
                const municipalitySet = new Set();
                projects.forEach(function(project) {
                    if (project.municipality) {
                        municipalitySet.add(project.municipality);
                    }
                });

                municipalities = Array.from(municipalitySet).sort();
                renderMunicipalityTabs();
            }

            function renderMunicipalityTabs() {
                let html = '<button class="filter-tab active" data-municipality="">All Projects</button>';
                
                municipalities.forEach(function(municipality) {
                    html += `<button class="filter-tab" data-municipality="${municipality}">${municipality}</button>`;
                });

                $('#municipalityTabs').html(html);
            }

            function renderProjects(projects) {
                if (!projects || projects.length === 0) {
                    $('#projectsGrid').html(`
                        <div class="empty-state">
                            <i class="fas fa-folder-open"></i>
                            <p>No projects found.</p>
                        </div>
                    `);
                    return;
                }

                let html = '';
                projects.forEach(function(project) {
                    html += `
                        <div class="project-card" data-project='${JSON.stringify(project)}'>
                            ${project.image_url ? `
                                <div class="project-image">
                                    <img src="${project.image_url}" alt="${project.title}">
                                    <div class="project-status ${project.status.toLowerCase()}">${project.status}</div>
                                </div>
                            ` : `
                                <div class="project-image placeholder" style="background: ${project.color_code || '#3B82F6'}">
                                    <div class="project-status ${project.status.toLowerCase()}">${project.status}</div>
                                </div>
                            `}
                            
                            <div class="project-content">
                                <div class="project-header">
                                    <span class="project-category" style="color: ${project.color_code || '#3B82F6'}">
                                        ${project.category_name || 'Infrastructure'}
                                    </span>
                                    ${project.municipality ? `
                                        <span class="project-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            ${project.municipality}
                                        </span>
                                    ` : ''}
                                </div>
                                
                                <h3 class="project-title">${project.title}</h3>
                                <p class="project-description">${truncateText(project.description, 100)}</p>
                                
                                <div class="project-footer">
                                    ${project.budget_display ? `
                                        <div class="project-budget">
                                            <i class="fas fa-coins"></i>
                                            ${project.budget_display}
                                        </div>
                                    ` : ''}
                                    
                                    <button class="btn-view-details">
                                        View Details
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                });

                $('#projectsGrid').html(html);
            }

            function renderOpportunities(opportunities) {
                if (!opportunities || opportunities.length === 0) {
                    $('#opportunitiesGrid').html('<p class="text-center">No opportunities available.</p>');
                    return;
                }

                let html = '';
                opportunities.forEach(function(opp) {
                    html += `
                        <div class="opportunity-card">
                            <div class="opportunity-badge">${opp.sector}</div>
                            <h3 class="opportunity-title">${opp.opportunity_title}</h3>
                            <p class="opportunity-description">${truncateText(opp.description, 120)}</p>
                            
                            <div class="opportunity-details">
                                ${opp.location ? `
                                    <div class="detail-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>${opp.location}</span>
                                    </div>
                                ` : ''}
                                ${opp.estimated_investment ? `
                                    <div class="detail-item">
                                        <i class="fas fa-dollar-sign"></i>
                                        <span>${opp.estimated_investment}</span>
                                    </div>
                                ` : ''}
                            </div>
                            
                            ${opp.contact_info ? `
                                <div class="opportunity-contact">
                                    <i class="fas fa-phone"></i>
                                    ${opp.contact_info}
                                </div>
                            ` : ''}
                        </div>
                    `;
                });

                $('#opportunitiesGrid').html(html);
            }

            function showProjectModal(project) {
                const modalBody = `
                    <div class="project-detail">
                        ${project.image_url ? `
                            <div class="project-detail-image">
                                <img src="${project.image_url}" alt="${project.title}">
                            </div>
                        ` : ''}
                        
                        <div class="project-detail-header">
                            <div class="project-detail-meta">
                                <span class="project-category" style="color: ${project.color_code || '#3B82F6'}">
                                    ${project.category_name || 'Infrastructure'}
                                </span>
                                <span class="project-status ${project.status.toLowerCase()}">${project.status}</span>
                            </div>
                            <h2 class="project-detail-title">${project.title}</h2>
                            ${project.location ? `<p class="project-location"><i class="fas fa-map-marker-alt"></i> ${project.location}</p>` : ''}
                        </div>

                        <div class="project-detail-body">
                            <div class="detail-section">
                                <h4><i class="fas fa-info-circle"></i> Description</h4>
                                <p>${project.full_description || project.description}</p>
                            </div>

                            <div class="project-info-grid">
                                ${project.budget_display ? `
                                    <div class="info-item">
                                        <i class="fas fa-coins"></i>
                                        <div>
                                            <span class="info-label">Budget</span>
                                            <span class="info-value">${project.budget_display}</span>
                                        </div>
                                    </div>
                                ` : ''}
                                
                                ${project.start_date ? `
                                    <div class="info-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        <div>
                                            <span class="info-label">Start Date</span>
                                            <span class="info-value">${formatDate(project.start_date)}</span>
                                        </div>
                                    </div>
                                ` : ''}
                                
                                ${project.end_date ? `
                                    <div class="info-item">
                                        <i class="fas fa-calendar-check"></i>
                                        <div>
                                            <span class="info-label">Target Completion</span>
                                            <span class="info-value">${formatDate(project.end_date)}</span>
                                        </div>
                                    </div>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                `;

                $('#projectModalBody').html(modalBody);
                $('#projectModal').addClass('active');
            }

            function truncateText(text, maxLength) {
                if (!text) return '';
                if (text.length <= maxLength) return text;
                return text.substring(0, maxLength) + '...';
            }

            function formatDate(dateString) {
                if (!dateString) return '';
                const date = new Date(dateString);
                return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
            }
        });
    </script>
</body>
</html>