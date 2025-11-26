<?php
$pageTitle = "Government - Pampanga Provincial Government";
$pageDescription = "Government facilities, public services, and officials of Pampanga province.";
$additionalCSS = ['css/government.css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
     <?php include 'components/scripts.php'; ?>
</head>
<body>
    <?php include 'components/header.php'; ?>

    <main class="government-page">
        <!-- Page Header -->
        <section class="page-header">
            <div class="header-content">
                <h1 class="page-title">Provincial Government</h1>
                <p class="page-subtitle">Serving the people of Pampanga with transparency, efficiency, and dedication</p>
            </div>
        </section>

        <!-- Quick Access Cards -->
        <section class="quick-access-section">
            <div class="container">
                <div class="quick-access-grid">
                    <div class="quick-card" data-scroll="officials">
                        <div class="quick-icon" style="background: #3B82F6;">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3>Officials</h3>
                        <p>Meet our leaders</p>
                    </div>
                    <div class="quick-card" data-scroll="services">
                        <div class="quick-icon" style="background: #10B981;">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3>Public Services</h3>
                        <p>Available services</p>
                    </div>
                    <div class="quick-card" data-scroll="facilities">
                        <div class="quick-icon" style="background: #F59E0B;">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>Facilities</h3>
                        <p>Government offices</p>
                    </div>
                    <div class="quick-card" data-scroll="contact">
                        <div class="quick-icon" style="background: #EF4444;">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3>Contact</h3>
                        <p>Get in touch</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Government Officials Section -->
        <section id="officials" class="officials-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Government Officials</h2>
                    <p class="section-subtitle">Leadership committed to serving Pampanga</p>
                </div>

                <div class="officials-content" id="officialsContent">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Public Services Section -->
        <section id="services" class="services-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Public Services</h2>
                    <p class="section-subtitle">Essential services for citizens and businesses</p>
                </div>

                <!-- Service Categories Filter -->
                <div class="service-categories" id="serviceCategories">
                    <div class="loading-spinner"></div>
                </div>

                <!-- Services Grid -->
                <div class="services-grid" id="servicesGrid">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Government Facilities Section -->
        <section id="facilities" class="facilities-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Government Facilities</h2>
                    <p class="section-subtitle">Offices, hospitals, schools, and public buildings</p>
                </div>

                <!-- Facility Type Filter -->
                <div class="facility-filters">
                    <button class="filter-btn active" data-type="all">
                        <i class="fas fa-th"></i>
                        <span>All Facilities</span>
                    </button>
                    <button class="filter-btn" data-type="office">
                        <i class="fas fa-building"></i>
                        <span>Offices</span>
                    </button>
                    <button class="filter-btn" data-type="hospital">
                        <i class="fas fa-hospital"></i>
                        <span>Hospitals</span>
                    </button>
                    <button class="filter-btn" data-type="school">
                        <i class="fas fa-school"></i>
                        <span>Schools</span>
                    </button>
                    <button class="filter-btn" data-type="barangay_hall">
                        <i class="fas fa-landmark"></i>
                        <span>Barangay Halls</span>
                    </button>
                </div>

                <!-- Municipality Filter -->
                <div class="municipality-filter">
                    <label for="municipalitySelect">
                        <i class="fas fa-map-marker-alt"></i>
                        Filter by Municipality:
                    </label>
                    <select id="municipalitySelect" class="municipality-select">
                        <option value="">All Municipalities</option>
                    </select>
                </div>

                <!-- Facilities Grid -->
                <div class="facilities-grid" id="facilitiesGrid">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Information Section -->
        <section id="contact" class="contact-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Contact Information</h2>
                    <p class="section-subtitle">Get in touch with the provincial government</p>
                </div>

                <div class="contact-grid">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>Main Office</h3>
                        <p>Provincial Capitol<br>San Fernando City, Pampanga</p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>Phone</h3>
                        <p>(045) 961-2505<br>(045) 961-2888</p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Email</h3>
                        <p>info@pampanga.gov.ph<br>tourism@pampanga.gov.ph</p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Office Hours</h3>
                        <p>Monday - Friday<br>8:00 AM - 5:00 PM</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'components/footer.php'; ?>
    
    <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <?php include 'components/scripts.php'; ?>
    
    <script>
        $(document).ready(function() {
            const API_BASE = window.location.origin;
            let currentFacilityType = 'all';
            let currentMunicipality = '';
            
            // Load data
            loadOfficials();
            loadServiceCategories();
            loadServices();
            loadFacilities();
            loadMunicipalities();
            
            // Quick access scroll
            $('.quick-card').click(function() {
                const target = $(this).data('scroll');
                $('html, body').animate({
                    scrollTop: $('#' + target).offset().top - 80
                }, 800);
            });
            
            // Load officials
            function loadOfficials() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/government/officials`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderOfficials(response.data);
                        }
                    },
                    error: function() {
                        $('#officialsContent').html('<p class="no-data">Failed to load officials data</p>');
                    }
                });
            }
            
            function renderOfficials(data) {
                const governor = data.governor;
                
                let html = `
                    <div class="official-main-card">
                        <div class="official-image-section">
                            ${governor.image_url ? 
                                `<img src="${governor.image_url}" alt="${governor.name}" class="official-image">` :
                                `<div class="official-placeholder"><i class="fas fa-user"></i></div>`
                            }
                        </div>
                        <div class="official-info-section">
                            <span class="official-position">${governor.position}</span>
                            <h2 class="official-name">${governor.name}</h2>
                            
                            ${governor.profile_details && governor.profile_details.length > 0 ? `
                                <div class="official-details">
                                    ${governor.profile_details.map(detail => `
                                        <div class="detail-item">
                                            <i class="${detail.icon_class || 'fas fa-info-circle'}"></i>
                                            <div class="detail-content">
                                                <span class="detail-label">${detail.detail_label}</span>
                                                <span class="detail-value">${detail.detail_value}</span>
                                            </div>
                                        </div>
                                    `).join('')}
                                </div>
                            ` : ''}
                            
                            <a href="about.php" class="btn-learn-more">
                                <span>Learn More</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                `;
                
                $('#officialsContent').html(html);
            }
            
            // Load service categories
            function loadServiceCategories() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/government/service-categories`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderServiceCategories(response.data);
                        }
                    }
                });
            }
            
            function renderServiceCategories(categories) {
                let html = `
                    <button class="category-chip active" data-category="all">
                        <i class="fas fa-th"></i>
                        <span>All Services</span>
                    </button>
                `;
                
                categories.forEach(cat => {
                    html += `
                        <button class="category-chip" data-category="${cat.id}" style="--chip-color: ${cat.color_code}">
                            <i class="${cat.icon_class || 'fas fa-circle'}"></i>
                            <span>${cat.name}</span>
                            ${cat.service_count > 0 ? `<span class="chip-count">${cat.service_count}</span>` : ''}
                        </button>
                    `;
                });
                
                $('#serviceCategories').html(html);
            }
            
            // Category chip click
            $(document).on('click', '.category-chip', function() {
                $('.category-chip').removeClass('active');
                $(this).addClass('active');
                
                const category = $(this).data('category');
                loadServices(category === 'all' ? null : category);
            });
            
            // Load services
            function loadServices(categoryId = null) {
                const url = categoryId ? 
                    `${API_BASE}/Admin/api/government/services?category=${categoryId}` : 
                    `${API_BASE}/Admin/api/government/services`;
                
                $('#servicesGrid').html('<div class="loading-container"><div class="loading-spinner"></div></div>');
                
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderServices(response.data);
                        }
                    },
                    error: function() {
                        $('#servicesGrid').html('<p class="no-data">Failed to load services</p>');
                    }
                });
            }
            
            function renderServices(services) {
                if (services.length === 0) {
                    $('#servicesGrid').html('<p class="no-data">No services found</p>');
                    return;
                }
                
                let html = '';
                services.forEach(service => {
                    html += `
                        <div class="service-card">
                            <div class="service-header">
                                <div class="service-icon" style="background: ${service.color_code || '#3B82F6'}">
                                    <i class="${service.icon_class || 'fas fa-file-alt'}"></i>
                                </div>
                                <div class="service-header-text">
                                    <span class="service-category">${service.category_name || 'Service'}</span>
                                    <h3 class="service-title">${service.service_name}</h3>
                                </div>
                            </div>
                            
                            <p class="service-description">${service.description || ''}</p>
                            
                            <div class="service-details">
                                ${service.processing_time ? `
                                    <div class="service-detail-item">
                                        <i class="fas fa-clock"></i>
                                        <span><strong>Processing Time:</strong> ${service.processing_time}</span>
                                    </div>
                                ` : ''}
                                
                                ${service.fees ? `
                                    <div class="service-detail-item">
                                        <i class="fas fa-money-bill"></i>
                                        <span><strong>Fee:</strong> ${service.fees}</span>
                                    </div>
                                ` : ''}
                                
                                ${service.contact_info ? `
                                    <div class="service-detail-item">
                                        <i class="fas fa-phone"></i>
                                        <span><strong>Contact:</strong> ${service.contact_info}</span>
                                    </div>
                                ` : ''}
                            </div>
                            
                            ${service.requirements || service.process_steps ? `
                                <button class="btn-view-details" onclick="showServiceDetails(${service.id}, '${escapeHtml(service.service_name)}', '${escapeHtml(service.requirements || '')}', '${escapeHtml(service.process_steps || '')}', '${escapeHtml(service.required_documents || '')}')">
                                    <span>View Full Details</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            ` : ''}
                        </div>
                    `;
                });
                
                $('#servicesGrid').html(html);
            }
            
            // Load municipalities for filter
            function loadMunicipalities() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/municipalities`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            let options = '<option value="">All Municipalities</option>';
                            response.data.forEach(muni => {
                                options += `<option value="${muni.name}">${muni.name}</option>`;
                            });
                            $('#municipalitySelect').html(options);
                        }
                    }
                });
            }
            
            // Municipality filter change
            $('#municipalitySelect').change(function() {
                currentMunicipality = $(this).val();
                loadFacilities();
            });
            
            // Facility type filter
            $('.filter-btn').click(function() {
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');
                
                currentFacilityType = $(this).data('type');
                loadFacilities();
            });
            
            // Load facilities
            function loadFacilities() {
                let url = `${API_BASE}/Admin/api/government/facilities`;
                const params = [];
                
                if (currentFacilityType !== 'all') {
                    params.push(`type=${currentFacilityType}`);
                }
                
                if (currentMunicipality) {
                    params.push(`municipality=${encodeURIComponent(currentMunicipality)}`);
                }
                
                if (params.length > 0) {
                    url += '?' + params.join('&');
                }
                
                $('#facilitiesGrid').html('<div class="loading-container"><div class="loading-spinner"></div></div>');
                
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderFacilities(response.data);
                        }
                    },
                    error: function() {
                        $('#facilitiesGrid').html('<p class="no-data">Failed to load facilities</p>');
                    }
                });
            }
            
            function renderFacilities(facilities) {
                if (facilities.length === 0) {
                    $('#facilitiesGrid').html('<p class="no-data">No facilities found</p>');
                    return;
                }
                
                let html = '';
                facilities.forEach(facility => {
                    const typeIcons = {
                        'hospital': 'fas fa-hospital',
                        'school': 'fas fa-school',
                        'office': 'fas fa-building',
                        'barangay_hall': 'fas fa-landmark'
                    };
                    
                    const typeColors = {
                        'hospital': '#EF4444',
                        'school': '#F59E0B',
                        'office': '#3B82F6',
                        'barangay_hall': '#10B981'
                    };
                    
                    const icon = typeIcons[facility.facility_type] || 'fas fa-building';
                    const color = typeColors[facility.facility_type] || '#3B82F6';
                    
                    html += `
                        <div class="facility-card">
                            ${facility.image_url ? `
                                <div class="facility-image" style="background-image: url('${facility.image_url}')"></div>
                            ` : `
                                <div class="facility-image-placeholder" style="background: ${color}">
                                    <i class="${icon}"></i>
                                </div>
                            `}
                            
                            <div class="facility-content">
                                <span class="facility-type" style="background: ${color}">
                                    <i class="${icon}"></i>
                                    ${facility.facility_type.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase())}
                                </span>
                                
                                <h3 class="facility-name">${facility.name}</h3>
                                
                                <div class="facility-info">
                                    ${facility.municipality ? `
                                        <div class="facility-info-item">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>${facility.municipality}</span>
                                        </div>
                                    ` : ''}
                                    
                                    ${facility.address ? `
                                        <div class="facility-info-item">
                                            <i class="fas fa-location-arrow"></i>
                                            <span>${facility.address}</span>
                                        </div>
                                    ` : ''}
                                    
                                    ${facility.contact_number ? `
                                        <div class="facility-info-item">
                                            <i class="fas fa-phone"></i>
                                            <span>${facility.contact_number}</span>
                                        </div>
                                    ` : ''}
                                    
                                    ${facility.email ? `
                                        <div class="facility-info-item">
                                            <i class="fas fa-envelope"></i>
                                            <span>${facility.email}</span>
                                        </div>
                                    ` : ''}
                                    
                                    ${facility.operating_hours ? `
                                        <div class="facility-info-item">
                                            <i class="fas fa-clock"></i>
                                            <span>${facility.operating_hours}</span>
                                        </div>
                                    ` : ''}
                                    
                                    ${facility.services_offered ? `
                                        <div class="facility-services">
                                            <strong>Services:</strong>
                                            <p>${facility.services_offered}</p>
                                        </div>
                                    ` : ''}
                                </div>
                                
                                ${facility.coordinates ? `
                                    <a href="https://www.google.com/maps?q=${facility.coordinates}" target="_blank" class="btn-view-map">
                                        <i class="fas fa-map-marked-alt"></i>
                                        <span>View on Map</span>
                                    </a>
                                ` : ''}
                            </div>
                        </div>
                    `;
                });
                
                $('#facilitiesGrid').html(html);
            }
        });
        
        // Helper function to escape HTML
        function escapeHtml(text) {
            if (!text) return '';
            return text.replace(/'/g, "\\'").replace(/"/g, '\\"').replace(/\n/g, '\\n');
        }
        
        // Show service details modal
        function showServiceDetails(id, name, requirements, steps, documents) {
            let content = `<h2>${name}</h2>`;
            
            if (requirements) {
                content += `<h3>Requirements:</h3><p>${requirements}</p>`;
            }
            
            if (steps) {
                content += `<h3>Process Steps:</h3><p>${steps}</p>`;
            }
            
            if (documents) {
                content += `<h3>Required Documents:</h3><p>${documents}</p>`;
            }
            
            // Simple alert for now - you can replace with a proper modal
            alert(content.replace(/<[^>]*>/g, '\n'));
        }
    </script>
</body>
</html>