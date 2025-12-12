<?php
$pageTitle = "Tourism - Discover Pampanga";
$pageDescription = "Explore the best tourist destinations, attractions, hotels, and restaurants in Pampanga.";
$additionalCSS = ['css/tourism.css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
    <?php include 'components/scripts.php'; ?>
</head>
<body>
    <?php include 'components/header.php'; ?>

    <main class="tourism-page">
        <!-- Hero Section -->
        <section class="tourism-hero">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title">Discover Pampanga</h1>
                <p class="hero-subtitle">Experience the perfect blend of history, culture, adventure, and culinary excellence</p>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <span class="stat-value" id="destinationsCount">-</span>
                        <span class="stat-label">Destinations</span>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-value" id="facilitiesCount">-</span>
                        <span class="stat-label">Facilities</span>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-value">8</span>
                        <span class="stat-label">Municipalities</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Destinations -->
        <section class="featured-destinations-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Featured Destinations</h2>
                    <p class="section-subtitle">Must-visit places in Pampanga</p>
                </div>

                <div class="featured-grid" id="featuredGrid">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Destinations by Category -->
        <section class="destinations-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Explore by Category</h2>
                    <p class="section-subtitle">Find the perfect destination for your interests</p>
                </div>

                <!-- Category Tabs -->
                <div class="category-tabs-container">
                    <button class="category-scroll-btn scroll-left" id="categoryScrollLeft">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    
                    <div class="category-tabs-wrapper" id="categoryTabsWrapper">
                        <div class="category-tabs" id="categoryTabs">
                            <div class="loading-spinner"></div>
                        </div>
                    </div>
                    
                    <button class="category-scroll-btn scroll-right" id="categoryScrollRight">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Destinations Grid -->
                <div class="destinations-grid" id="destinationsGrid">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tourism Facilities -->
        <section class="facilities-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Where to Stay & Dine</h2>
                    <p class="section-subtitle">Hotels, restaurants, and services for your convenience</p>
                </div>

                <!-- Facility Type Tabs -->
                <div class="facility-type-tabs">
                    <button class="facility-tab active" data-type="all">
                        <i class="fas fa-th"></i>
                        <span>All</span>
                    </button>
                    <button class="facility-tab" data-type="Hotel">
                        <i class="fas fa-hotel"></i>
                        <span>Hotels</span>
                    </button>
                    <button class="facility-tab" data-type="Restaurant">
                        <i class="fas fa-utensils"></i>
                        <span>Restaurants</span>
                    </button>
                    <button class="facility-tab" data-type="Transport Service">
                        <i class="fas fa-bus"></i>
                        <span>Transport</span>
                    </button>
                    <button class="facility-tab" data-type="Tour Operator">
                        <i class="fas fa-suitcase"></i>
                        <span>Tour Operators</span>
                    </button>
                </div>

                <!-- Ownership Filter -->
                <div class="ownership-filter">
                    <button class="ownership-btn active" data-ownership="all">All Facilities</button>
                    <button class="ownership-btn" data-ownership="Government">Government</button>
                    <button class="ownership-btn" data-ownership="Private">Private</button>
                </div>

                <!-- Facilities Grid -->
                <div class="facilities-grid" id="facilitiesGrid">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Travel Tips Section -->
        <section class="travel-tips-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Travel Tips</h2>
                    <p class="section-subtitle">Make the most of your Pampanga experience</p>
                </div>

                <div class="tips-grid">
                    <div class="tip-card">
                        <div class="tip-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Best Time to Visit</h3>
                        <p>November to April offers the best weather. The Giant Lantern Festival happens in December!</p>
                    </div>
                    <div class="tip-card">
                        <div class="tip-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h3>Getting Around</h3>
                        <p>Jeepneys, tricycles, and ride-hailing apps are readily available. Consider renting a car for flexibility.</p>
                    </div>
                    <div class="tip-card">
                        <div class="tip-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h3>Food Capital</h3>
                        <p>Don't miss sisig, tocino, and other Kapampangan delicacies. Angeles City is the sisig capital!</p>
                    </div>
                    <div class="tip-card">
                        <div class="tip-icon">
                            <i class="fas fa-language"></i>
                        </div>
                        <h3>Language</h3>
                        <p>Kapampangan is the local language, but English and Tagalog are widely understood.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'components/footer.php'; ?>
    
    <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
    $(document).ready(function() {
        const API_BASE = window.location.origin;
        let currentCategory = 'all';
        let currentFacilityType = 'all';
        let currentOwnership = 'all';
        let facilityTypes = {}; // Store type name to ID mapping
        let ownershipTypes = {}; // Store ownership name to ID mapping
        
        // Load facility types first
        loadFacilityTypes();
        
        // Load data
        loadFeaturedDestinations();
        loadCategories();
        loadDestinations();
        
        // Wait for facility types to load before loading facilities
        setTimeout(function() {
            loadFacilities();
        }, 500);
        
        loadCounts();
        
        // Load facility types
        function loadFacilityTypes() {
            $.ajax({
                url: `${API_BASE}/Admin/api/tourism/facility-types`,
                method: 'GET',
                success: function(response) {
                    if (response.success && response.data) {
                        response.data.forEach(type => {
                            // Store by exact type_name from database
                            facilityTypes[type.type_name] = type.id;
                        });
                    }
                }
            });
            
            // Store ownership type IDs
            ownershipTypes = {
                'Government': 1,
                'Private': 2
            };
        }
        
        // Category scroll functionality
        function updateCategoryScrollButtons() {
            const container = $('#categoryTabs')[0];
            const wrapper = $('#categoryTabsWrapper');
            
            if (!container) return;
            
            const isScrollable = container.scrollWidth > container.clientWidth;
            const isAtStart = container.scrollLeft <= 10;
            const isAtEnd = container.scrollLeft + container.clientWidth >= container.scrollWidth - 10;
            
            if (isScrollable) {
                wrapper.addClass('has-scroll');
                wrapper.toggleClass('at-start', isAtStart);
                wrapper.toggleClass('at-end', isAtEnd);
            } else {
                wrapper.removeClass('has-scroll at-start at-end');
            }
        }
        
        $('#categoryScrollLeft').click(function() {
            $('#categoryTabs').animate({ scrollLeft: '-=200' }, 300, updateCategoryScrollButtons);
        });
        
        $('#categoryScrollRight').click(function() {
            $('#categoryTabs').animate({ scrollLeft: '+=200' }, 300, updateCategoryScrollButtons);
        });
        
        $('#categoryTabs').scroll(updateCategoryScrollButtons);
        $(window).resize(updateCategoryScrollButtons);
        
        // Load counts
        function loadCounts() {
            $.ajax({
                url: `${API_BASE}/Admin/api/tourism/destinations`,
                method: 'GET',
                success: function(response) {
                    if (response.success && response.data) {
                        $('#destinationsCount').text(response.data.length);
                    }
                }
            });
            
            $.ajax({
                url: `${API_BASE}/Admin/api/tourism/facilities`,
                method: 'GET',
                success: function(response) {
                    if (response.success && response.data) {
                        $('#facilitiesCount').text(response.data.length);
                    }
                }
            });
        }
        
        // Load featured destinations
        function loadFeaturedDestinations() {
            $.ajax({
                url: `${API_BASE}/Admin/api/tourism/destinations?featured=true`,
                method: 'GET',
                success: function(response) {
                    if (response.success && response.data) {
                        renderFeaturedDestinations(response.data);
                    }
                },
                error: function() {
                    $('#featuredGrid').html('<p class="no-data">Failed to load featured destinations</p>');
                }
            });
        }
        
        function renderFeaturedDestinations(destinations) {
            if (destinations.length === 0) {
                $('#featuredGrid').html('<p class="no-data">No featured destinations available</p>');
                return;
            }
            
            let html = '';
            destinations.forEach((dest, index) => {
                const size = index === 0 ? 'large' : 'small';
                html += `
                    <a href="tourism-detail.php?id=${dest.id}" class="featured-card ${size}">
                        <div class="featured-image" style="background-image: url('${dest.image_url || 'assets/placeholder.jpg'}')">
                            <div class="featured-overlay"></div>
                            <span class="featured-badge" style="background: ${dest.color_code || '#3B82F6'}">
                                ${dest.category_name}
                            </span>
                            <div class="featured-content">
                                <h3 class="featured-title">${dest.name}</h3>
                                <p class="featured-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    ${dest.municipality}
                                </p>
                                ${dest.description ? `<p class="featured-description">${dest.description}</p>` : ''}
                            </div>
                        </div>
                    </a>
                `;
            });
            
            $('#featuredGrid').html(html);
        }
        
        // Load categories
        function loadCategories() {
            $.ajax({
                url: `${API_BASE}/Admin/api/tourism/categories`,
                method: 'GET',
                success: function(response) {
                    if (response.success && response.data) {
                        renderCategories(response.data);
                        setTimeout(updateCategoryScrollButtons, 100);
                    }
                }
            });
        }
        
        function renderCategories(categories) {
            let html = `
                <button class="category-tab active" data-category="all">
                    <i class="fas fa-th"></i>
                    <span>All Destinations</span>
                </button>
            `;
            
            categories.forEach(cat => {
                html += `
                    <button class="category-tab" data-category="${cat.id}" style="--tab-color: ${cat.color_code}">
                        <i class="${cat.icon_class || 'fas fa-map-marker-alt'}"></i>
                        <span>${cat.name}</span>
                        ${cat.destination_count > 0 ? `<span class="tab-count">${cat.destination_count}</span>` : ''}
                    </button>
                `;
            });
            
            $('#categoryTabs').html(html);
        }
        
        // Category tab click
        $(document).on('click', '.category-tab', function() {
            $('.category-tab').removeClass('active');
            $(this).addClass('active');
            currentCategory = $(this).data('category');
            loadDestinations();
        });
        
        // Load destinations
        function loadDestinations() {
            const url = currentCategory === 'all' 
                ? `${API_BASE}/Admin/api/tourism/destinations`
                : `${API_BASE}/Admin/api/tourism/destinations?category=${currentCategory}`;
            
            $('#destinationsGrid').html('<div class="loading-container"><div class="loading-spinner"></div></div>');
            
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    if (response.success && response.data) {
                        renderDestinations(response.data);
                    }
                },
                error: function() {
                    $('#destinationsGrid').html('<p class="no-data">Failed to load destinations</p>');
                }
            });
        }
        
        function renderDestinations(destinations) {
            if (destinations.length === 0) {
                $('#destinationsGrid').html('<p class="no-data">No destinations found</p>');
                return;
            }
            
            let html = '';
            destinations.forEach(dest => {
                html += `
                    <a href="tourism-detail.php?id=${dest.id}" class="destination-card">
                        <div class="dest-image" style="background-image: url('${dest.image_url || 'assets/placeholder.jpg'}')">
                            <span class="dest-category" style="background: ${dest.color_code || '#3B82F6'}">
                                ${dest.category_name}
                            </span>
                        </div>
                        <div class="dest-content">
                            <h3 class="dest-title">${dest.name}</h3>
                            <p class="dest-location">
                                <i class="fas fa-map-marker-alt"></i>
                                ${dest.municipality}
                            </p>
                            ${dest.description ? `<p class="dest-description">${dest.description}</p>` : ''}
                            <div class="dest-info">
                                ${dest.entry_fee ? `
                                    <span class="dest-info-item">
                                        <i class="fas fa-ticket-alt"></i>
                                        ${dest.entry_fee}
                                    </span>
                                ` : ''}
                                ${dest.operating_hours ? `
                                    <span class="dest-info-item">
                                        <i class="fas fa-clock"></i>
                                        ${dest.operating_hours}
                                    </span>
                                ` : ''}
                            </div>
                            ${dest.activities && dest.activities.length > 0 ? `
                                <div class="dest-activities">
                                    <i class="fas fa-hiking"></i>
                                    <span>${dest.activities.length} Activities</span>
                                </div>
                            ` : ''}
                        </div>
                    </a>
                `;
            });
            
            $('#destinationsGrid').html(html);
        }
        
        // Facility type tabs
        $('.facility-tab').click(function() {
            $('.facility-tab').removeClass('active');
            $(this).addClass('active');
            currentFacilityType = $(this).data('type');
            loadFacilities();
        });
        
        // Ownership filter
        $('.ownership-btn').click(function() {
            $('.ownership-btn').removeClass('active');
            $(this).addClass('active');
            currentOwnership = $(this).data('ownership');
            loadFacilities();
        });
        
        // Load facilities
        function loadFacilities() {
            let url = `${API_BASE}/Admin/api/tourism/facilities`;
            const params = [];
            
            if (currentFacilityType !== 'all') {
                // Get ID from mapping
                const typeId = facilityTypes[currentFacilityType];
                if (typeId) {
                    params.push(`type=${typeId}`);
                }
            }
            
            if (currentOwnership !== 'all') {
                // Get ID from mapping
                const ownershipId = ownershipTypes[currentOwnership];
                if (ownershipId) {
                    params.push(`ownership=${ownershipId}`);
                }
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
                    'Hotel': 'fas fa-hotel',
                    'Restaurant': 'fas fa-utensils',
                    'Transport Service': 'fas fa-bus',
                    'Tour Operator': 'fas fa-suitcase'
                };
                
                const icon = typeIcons[facility.facility_type] || 'fas fa-building';
                
                html += `
                    <div class="facility-card">
                        ${facility.image_url ? `
                            <div class="facility-image" style="background-image: url('${facility.image_url}')"></div>
                        ` : `
                            <div class="facility-image-placeholder">
                                <i class="${icon}"></i>
                            </div>
                        `}
                        
                        <div class="facility-content">
                            <div class="facility-header">
                                <span class="facility-type">
                                    <i class="${icon}"></i>
                                    ${facility.facility_type}
                                </span>
                                ${facility.is_verified ? '<span class="verified-badge"><i class="fas fa-check-circle"></i> Verified</span>' : ''}
                            </div>
                            
                            <h3 class="facility-name">${facility.name}</h3>
                            
                            ${facility.description ? `<p class="facility-description">${facility.description}</p>` : ''}
                            
                            <div class="facility-details">
                                <div class="facility-detail">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>${facility.municipality}</span>
                                </div>
                                ${facility.ownership ? `
                                    <div class="facility-detail">
                                        <i class="fas fa-building"></i>
                                        <span>${facility.ownership}</span>
                                    </div>
                                ` : ''}
                                ${facility.price_range ? `
                                    <div class="facility-detail">
                                        <i class="fas fa-tag"></i>
                                        <span>${facility.price_range}</span>
                                    </div>
                                ` : ''}
                                ${facility.rating ? `
                                    <div class="facility-detail">
                                        <i class="fas fa-star"></i>
                                        <span>${facility.rating}/5.0</span>
                                    </div>
                                ` : ''}
                            </div>
                            
                            ${facility.amenities ? `
                                <div class="facility-amenities">
                                    <i class="fas fa-check-circle"></i>
                                    <span>${facility.amenities}</span>
                                </div>
                            ` : ''}
                            
                            <div class="facility-actions">
                                ${facility.contact_number ? `
                                    <a href="tel:${facility.contact_number}" class="facility-btn">
                                        <i class="fas fa-phone"></i>
                                        Call
                                    </a>
                                ` : ''}
                                ${facility.website ? `
                                    <a href="${facility.website}" target="_blank" class="facility-btn">
                                        <i class="fas fa-globe"></i>
                                        Website
                                    </a>
                                ` : ''}
                                ${facility.email ? `
                                    <a href="mailto:${facility.email}" class="facility-btn">
                                        <i class="fas fa-envelope"></i>
                                        Email
                                    </a>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                `;
            });
            
            $('#facilitiesGrid').html(html);
        }
        
        // Smooth scroll to sections
        $('a[href^="#"]').click(function(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800);
            }
        });
    });
    </script>
</body>
</html>