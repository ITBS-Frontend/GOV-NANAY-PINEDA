<?php
$pageTitle = 'Programs & Services - Gov. Lilia "Nanay" Pineda';
$pageDescription = 'Social programs and services for the people of Pampanga';
$additionalCSS = ['css/programs.css'];
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
            <h1 class="hero-title">Programs & Services</h1>
            <p class="hero-subtitle">Comprehensive social programs serving the people of Pampanga</p>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="programs-section">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header">
                <h2 class="section-title">Our Programs</h2>
                <p class="section-subtitle">
                    Browse through our various social welfare, health, and education programs
                </p>
            </div>

            <!-- Category Tabs -->
            <div class="category-tabs" id="categoryTabs">
                <div class="category-tab active" data-category="all">
                    All Programs
                </div>
            </div>

            <!-- Programs Grid -->
            <div class="programs-grid" id="programsGrid">
                <div class="loading-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading programs...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Detail Modal -->
    <div class="modal" id="programModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <button class="modal-close">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal-body" id="programModalBody">
                <!-- Content loaded dynamically -->
            </div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>

    <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            const API_BASE = window.location.origin;
            let allPrograms = [];
            let currentCategory = 'all';

            // Load categories
            loadCategories();
            
            // Load programs
            loadPrograms();

            // Category tab click
            $(document).on('click', '.category-tab', function() {
                currentCategory = $(this).data('category');
                $('.category-tab').removeClass('active');
                $(this).addClass('active');
                
                if (currentCategory === 'all') {
                    loadPrograms();
                } else {
                    loadProgramsByCategory(currentCategory);
                }
            });

            // Program card click
            $(document).on('click', '.program-card', function() {
                const programData = $(this).data('program');
                showProgramModal(programData);
            });

            // Modal close
            $('.modal-close, .modal-overlay').on('click', function() {
                $('#programModal').removeClass('active');
            });

            function loadCategories() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/programs/categories`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            renderCategories(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load categories:', error);
                    }
                });
            }

            function loadPrograms() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/programs/social-welfare`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            allPrograms = response.data;
                            renderPrograms(allPrograms);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load programs:', error);
                        $('#programsGrid').html(`
                            <div class="error-state">
                                <i class="fas fa-exclamation-circle"></i>
                                <p>Failed to load programs. Please try again.</p>
                            </div>
                        `);
                    }
                });
            }

            function loadProgramsByCategory(categoryId) {
                $.ajax({
                    url: `${API_BASE}/Admin/api/programs/social-welfare?category=` + categoryId,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            renderPrograms(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load programs:', error);
                    }
                });
            }

            function renderCategories(categories) {
                let html = `
                    <div class="category-tab active" data-category="all">
                        All Programs
                    </div>
                `;
                
                categories.forEach(function(category) {
                    html += `
                        <div class="category-tab" data-category="${category.id}">
                            <i class="${category.icon_class}"></i>
                            ${category.name}
                            ${category.program_count > 0 ? `<span class="category-count">${category.program_count}</span>` : ''}
                        </div>
                    `;
                });
                
                $('#categoryTabs').html(html);
            }

            function renderPrograms(programs) {
                if (!programs || programs.length === 0) {
                    $('#programsGrid').html(`
                        <div class="empty-state">
                            <i class="fas fa-folder-open"></i>
                            <p>No programs found in this category.</p>
                        </div>
                    `);
                    return;
                }
                
                let html = '';
                
                programs.forEach(function(program) {
                    html += `
                        <div class="program-card" data-program='${JSON.stringify(program)}'>
                            <div class="program-icon" style="background: ${program.color_code}20; color: ${program.color_code}">
                                <i class="${program.icon_class}"></i>
                            </div>
                            <div class="program-content">
                                <span class="program-category" style="color: ${program.color_code}">${program.category_name}</span>
                                <h3 class="program-title">${program.program_name}</h3>
                                <p class="program-description">${truncateText(program.description, 120)}</p>
                                
                                ${program.statistics && program.statistics.length > 0 ? `
                                    <div class="program-stats">
                                        ${program.statistics.slice(0, 2).map(stat => `
                                            <div class="stat-item">
                                                <span class="stat-value">${stat.stat_value}</span>
                                                <span class="stat-label">${stat.stat_label}</span>
                                            </div>
                                        `).join('')}
                                    </div>
                                ` : ''}
                                
                                <button class="btn-view-more">
                                    View Details
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    `;
                });
                
                $('#programsGrid').html(html);
            }

            function showProgramModal(program) {
                const modalBody = `
                    <div class="program-detail">
                        <div class="program-detail-header">
                            <div class="program-icon-large" style="background: ${program.color_code}20; color: ${program.color_code}">
                                <i class="${program.icon_class}"></i>
                            </div>
                            <div>
                                <span class="program-category" style="color: ${program.color_code}">${program.category_name}</span>
                                <h2 class="program-detail-title">${program.program_name}</h2>
                            </div>
                        </div>

                        <div class="program-detail-body">
                            <div class="detail-section">
                                <h4><i class="fas fa-info-circle"></i> Description</h4>
                                <p>${program.description}</p>
                            </div>

                            ${program.eligibility_criteria ? `
                                <div class="detail-section">
                                    <h4><i class="fas fa-user-check"></i> Eligibility</h4>
                                    <p>${program.eligibility_criteria}</p>
                                </div>
                            ` : ''}

                            ${program.benefits ? `
                                <div class="detail-section">
                                    <h4><i class="fas fa-gift"></i> Benefits</h4>
                                    <p>${program.benefits}</p>
                                </div>
                            ` : ''}

                            ${program.how_to_apply ? `
                                <div class="detail-section">
                                    <h4><i class="fas fa-clipboard-list"></i> How to Apply</h4>
                                    <p>${program.how_to_apply}</p>
                                </div>
                            ` : ''}

                            ${program.required_documents ? `
                                <div class="detail-section">
                                    <h4><i class="fas fa-file-alt"></i> Required Documents</h4>
                                    <p>${program.required_documents}</p>
                                </div>
                            ` : ''}

                            ${program.contact_info ? `
                                <div class="detail-section">
                                    <h4><i class="fas fa-phone-alt"></i> Contact Information</h4>
                                    <p>${program.contact_info}</p>
                                </div>
                            ` : ''}

                            ${program.statistics && program.statistics.length > 0 ? `
                                <div class="detail-section">
                                    <h4><i class="fas fa-chart-bar"></i> Program Statistics</h4>
                                    <div class="stats-grid">
                                        ${program.statistics.map(stat => `
                                            <div class="stat-card">
                                                <div class="stat-value">${stat.stat_value}</div>
                                                <div class="stat-label">${stat.stat_label}</div>
                                                ${stat.year ? `<div class="stat-year">${stat.year}</div>` : ''}
                                            </div>
                                        `).join('')}
                                    </div>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                `;
                
                $('#programModalBody').html(modalBody);
                $('#programModal').addClass('active');
            }

            function truncateText(text, maxLength) {
                if (!text) return '';
                if (text.length <= maxLength) return text;
                return text.substring(0, maxLength) + '...';
            }
        });
    </script>
</body>
</html>