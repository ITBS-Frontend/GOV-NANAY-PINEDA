<?php
$pageTitle = "Destination Details - Pampanga Tourism";
$pageDescription = "Explore detailed information about tourist destinations in Pampanga.";
$additionalCSS = ['css/tourism-detail.css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
     <?php include 'components/scripts.php'; ?>
</head>
<body>
    <?php include 'components/header.php'; ?>

    <!-- Loading State -->
    <div id="loadingState" class="loading-container" style="min-height: 100vh;">
        <div class="loading-spinner"></div>
    </div>

    <!-- Destination Content -->
    <main class="tourism-detail-page" id="destinationContent" style="display: none;">
        <!-- Hero Section -->
        <section class="destination-hero" id="destinationHero">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <span class="hero-category" id="heroCategory"></span>
                <h1 class="hero-title" id="heroTitle"></h1>
                <div class="hero-meta" id="heroMeta"></div>
            </div>
        </section>

        <!-- Destination Container -->
        <div class="destination-container">
            <!-- Main Content -->
            <div class="destination-main">
                <!-- Overview Section -->
                <section class="detail-section">
                    <h2 class="section-heading">
                        <i class="fas fa-info-circle"></i>
                        Overview
                    </h2>
                    <p class="overview-text" id="overviewText"></p>
                </section>

                <!-- Full Description -->
                <section class="detail-section" id="fullDescSection">
                    <h2 class="section-heading">
                        <i class="fas fa-book-open"></i>
                        About This Destination
                    </h2>
                    <div class="content-text" id="fullDescription"></div>
                </section>

                <!-- Activities Section -->
                <section class="detail-section" id="activitiesSection" style="display: none;">
                    <h2 class="section-heading">
                        <i class="fas fa-hiking"></i>
                        Things to Do
                    </h2>
                    <div class="activities-grid" id="activitiesGrid"></div>
                </section>

                <!-- How to Get There -->
                <section class="detail-section" id="howToGetSection">
                    <h2 class="section-heading">
                        <i class="fas fa-map-signs"></i>
                        How to Get There
                    </h2>
                    <div class="content-text" id="howToGetText"></div>
                </section>

                <!-- Best Time to Visit -->
                <section class="detail-section" id="bestTimeSection">
                    <h2 class="section-heading">
                        <i class="fas fa-calendar-check"></i>
                        Best Time to Visit
                    </h2>
                    <p class="content-text" id="bestTimeText"></p>
                </section>

                <!-- Gallery Section -->
                <section class="detail-section" id="gallerySection" style="display: none;">
                    <h2 class="section-heading">
                        <i class="fas fa-images"></i>
                        Photo Gallery
                    </h2>
                    <div class="gallery-grid" id="galleryGrid"></div>
                </section>

                <!-- Tips Section -->
                <section class="detail-section tips-section">
                    <h2 class="section-heading">
                        <i class="fas fa-lightbulb"></i>
                        Visitor Tips
                    </h2>
                    <div class="tips-list">
                        <div class="tip-item">
                            <i class="fas fa-camera"></i>
                            <div class="tip-content">
                                <h4>Photography</h4>
                                <p>Best lighting is during early morning or late afternoon for stunning photos.</p>
                            </div>
                        </div>
                        <div class="tip-item">
                            <i class="fas fa-tshirt"></i>
                            <div class="tip-content">
                                <h4>What to Wear</h4>
                                <p>Comfortable clothing and footwear recommended. Bring sunscreen and a hat.</p>
                            </div>
                        </div>
                        <div class="tip-item">
                            <i class="fas fa-utensils"></i>
                            <div class="tip-content">
                                <h4>Food & Drinks</h4>
                                <p>Bring water and snacks. Local food options may be available nearby.</p>
                            </div>
                        </div>
                        <div class="tip-item">
                            <i class="fas fa-shield-alt"></i>
                            <div class="tip-content">
                                <h4>Safety</h4>
                                <p>Follow posted guidelines and respect the environment. Keep the area clean.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Sidebar -->
            <aside class="destination-sidebar">
                <!-- Quick Info Card -->
                <div class="sidebar-card">
                    <h3 class="card-title">Quick Information</h3>
                    <div class="info-list" id="infoList"></div>
                </div>

                <!-- Contact Card -->
                <div class="sidebar-card" id="contactCard" style="display: none;">
                    <h3 class="card-title">Contact & Inquiries</h3>
                    <div class="contact-info" id="contactInfo"></div>
                </div>

                <!-- Map Card -->
                <div class="sidebar-card" id="mapCard" style="display: none;">
                    <h3 class="card-title">Location</h3>
                    <div class="map-container" id="mapContainer">
                        <button class="btn-view-map" id="btnViewMap">
                            <i class="fas fa-map-marked-alt"></i>
                            View on Google Maps
                        </button>
                    </div>
                </div>

                <!-- Related Destinations -->
                <div class="sidebar-card" id="relatedCard" style="display: none;">
                    <h3 class="card-title">Similar Destinations</h3>
                    <div class="related-destinations" id="relatedDestinations"></div>
                </div>
            </aside>
        </div>

        <!-- Share Section -->
        <section class="share-section">
            <div class="container">
                <h3>Share this destination</h3>
                <div class="share-buttons">
                    <button class="share-btn facebook" onclick="shareOnFacebook()">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </button>
                    <button class="share-btn twitter" onclick="shareOnTwitter()">
                        <i class="fab fa-twitter"></i> Twitter
                    </button>
                    <button class="share-btn link" onclick="copyLink()">
                        <i class="fas fa-link"></i> Copy Link
                    </button>
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
            const urlParams = new URLSearchParams(window.location.search);
            const destinationId = urlParams.get('id');
            
            if (!destinationId) {
                alert('No destination specified');
                window.location.href = 'tourism.php';
                return;
            }
            
            loadDestination(destinationId);
            
            function loadDestination(id) {
                $.ajax({
                    url: `${API_BASE}/Admin/api/tourism/destinations/${id}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderDestination(response.data);
                            $('#loadingState').hide();
                            $('#destinationContent').fadeIn();
                            
                            // Load related destinations
                            if (response.data.category_id) {
                                loadRelatedDestinations(response.data.category_id, id);
                            }
                        } else {
                            alert('Destination not found');
                            window.location.href = 'tourism.php';
                        }
                    },
                    error: function() {
                        alert('Failed to load destination');
                        window.location.href = 'tourism.php';
                    }
                });
            }
            
            function renderDestination(dest) {
                // Update page title
                document.title = `${dest.name} - Pampanga Tourism`;
                
                // Hero Section
                if (dest.image_url) {
                    $('#destinationHero').css('background-image', `url('${dest.image_url}')`);
                }
                
                $('#heroCategory').text(dest.category_name || 'Destination')
                    .css('background', dest.color_code || '#3B82F6');
                $('#heroTitle').text(dest.name);
                
                // Hero Meta
                let metaHtml = '';
                if (dest.municipality) {
                    metaHtml += `
                        <div class="meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>${dest.municipality}, Pampanga</span>
                        </div>
                    `;
                }
                if (dest.entry_fee) {
                    metaHtml += `
                        <div class="meta-item">
                            <i class="fas fa-ticket-alt"></i>
                            <span>${dest.entry_fee}</span>
                        </div>
                    `;
                }
                if (dest.operating_hours) {
                    metaHtml += `
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span>${dest.operating_hours}</span>
                        </div>
                    `;
                }
                $('#heroMeta').html(metaHtml);
                
                // Overview
                $('#overviewText').text(dest.description || 'No description available');
                
                // Full Description
                if (dest.full_description) {
                    $('#fullDescription').html(`<p>${dest.full_description}</p>`);
                    $('#fullDescSection').show();
                } else {
                    $('#fullDescSection').hide();
                }
                
                // Activities
                if (dest.activities && dest.activities.length > 0) {
                    renderActivities(dest.activities);
                    $('#activitiesSection').show();
                }
                
                // How to Get There
                if (dest.how_to_get_there) {
                    $('#howToGetText').html(`<p>${dest.how_to_get_there}</p>`);
                    $('#howToGetSection').show();
                } else {
                    $('#howToGetSection').hide();
                }
                
                // Best Time to Visit
                if (dest.best_time_to_visit) {
                    $('#bestTimeText').text(dest.best_time_to_visit);
                    $('#bestTimeSection').show();
                } else {
                    $('#bestTimeSection').hide();
                }
                
                // Gallery
                if (dest.gallery && dest.gallery.length > 0) {
                    renderGallery(dest.gallery);
                    $('#gallerySection').show();
                }
                
                // Sidebar Info
                let infoHtml = '';
                
                if (dest.category_name) {
                    infoHtml += `
                        <div class="info-item">
                            <div class="info-icon" style="background: ${dest.color_code || '#3B82F6'}">
                                <i class="fas fa-tag"></i>
                            </div>
                            <div class="info-content">
                                <h4>Category</h4>
                                <p>${dest.category_name}</p>
                            </div>
                        </div>
                    `;
                }
                
                if (dest.municipality) {
                    infoHtml += `
                        <div class="info-item">
                            <div class="info-icon" style="background: #10B981">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Location</h4>
                                <p>${dest.municipality}, Pampanga</p>
                            </div>
                        </div>
                    `;
                }
                
                if (dest.address) {
                    infoHtml += `
                        <div class="info-item">
                            <div class="info-icon" style="background: #F59E0B">
                                <i class="fas fa-location-arrow"></i>
                            </div>
                            <div class="info-content">
                                <h4>Address</h4>
                                <p>${dest.address}</p>
                            </div>
                        </div>
                    `;
                }
                
                if (dest.entry_fee) {
                    infoHtml += `
                        <div class="info-item">
                            <div class="info-icon" style="background: #EF4444">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Entry Fee</h4>
                                <p>${dest.entry_fee}</p>
                            </div>
                        </div>
                    `;
                }
                
                if (dest.operating_hours) {
                    infoHtml += `
                        <div class="info-item">
                            <div class="info-icon" style="background: #8B5CF6">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h4>Operating Hours</h4>
                                <p>${dest.operating_hours}</p>
                            </div>
                        </div>
                    `;
                }
                
                $('#infoList').html(infoHtml);
                
                // Map
                if (dest.coordinates) {
                    $('#mapCard').show();
                    $('#btnViewMap').attr('href', `https://www.google.com/maps?q=${dest.coordinates}`);
                    $('#btnViewMap').attr('target', '_blank');
                    $('#btnViewMap').css('display', 'inline-flex');
                }
                
                // Contact (if available through tourism office)
                const contactHtml = `
                    <p><strong>Provincial Tourism Office</strong></p>
                    <p><i class="fas fa-phone"></i> (045) 961-2888</p>
                    <p><i class="fas fa-envelope"></i> tourism@pampanga.gov.ph</p>
                `;
                $('#contactInfo').html(contactHtml);
                $('#contactCard').show();
            }
            
            function renderActivities(activities) {
                let html = '';
                activities.forEach(activity => {
                    const difficultyColors = {
                        'Easy': '#10B981',
                        'Moderate': '#F59E0B',
                        'Challenging': '#EF4444'
                    };
                    
                    const color = difficultyColors[activity.difficulty_level] || '#3B82F6';
                    
                    html += `
                        <div class="activity-card">
                            <div class="activity-header">
                                <h4 class="activity-name">${activity.activity_name}</h4>
                                ${activity.difficulty_level ? `
                                    <span class="activity-difficulty" style="background: ${color}">
                                        ${activity.difficulty_level}
                                    </span>
                                ` : ''}
                            </div>
                            ${activity.description ? `<p class="activity-desc">${activity.description}</p>` : ''}
                            ${activity.duration ? `
                                <div class="activity-info">
                                    <i class="fas fa-clock"></i>
                                    <span>${activity.duration}</span>
                                </div>
                            ` : ''}
                        </div>
                    `;
                });
                
                $('#activitiesGrid').html(html);
            }
            
            function renderGallery(gallery) {
                let html = '';
                gallery.forEach(image => {
                    html += `
                        <div class="gallery-item" onclick="viewImage('${image.url}')">
                            <img src="${image.url}" alt="${image.caption || 'Gallery image'}" loading="lazy">
                            ${image.caption ? `<p class="gallery-caption">${image.caption}</p>` : ''}
                        </div>
                    `;
                });
                
                $('#galleryGrid').html(html);
            }
            
            function loadRelatedDestinations(categoryId, currentId) {
                $.ajax({
                    url: `${API_BASE}/Admin/api/tourism/destinations?category=${categoryId}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            const related = response.data
                                .filter(d => d.id != currentId)
                                .slice(0, 3);
                            
                            if (related.length > 0) {
                                renderRelatedDestinations(related);
                            }
                        }
                    }
                });
            }
            
            function renderRelatedDestinations(destinations) {
                let html = '';
                destinations.forEach(dest => {
                    html += `
                        <a href="tourism-detail.php?id=${dest.id}" class="related-item">
                            <div class="related-image" style="background-image: url('${dest.image_url || 'assets/placeholder.jpg'}')"></div>
                            <div class="related-content">
                                <span class="related-category" style="color: ${dest.color_code}">${dest.category_name}</span>
                                <h4>${dest.name}</h4>
                                <p class="related-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    ${dest.municipality}
                                </p>
                            </div>
                        </a>
                    `;
                });
                
                $('#relatedDestinations').html(html);
                $('#relatedCard').show();
            }
        });
        
        // View image in larger view (simple implementation)
        function viewImage(url) {
            window.open(url, '_blank');
        }
        
        // Share functions
        function shareOnFacebook() {
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
        }
        
        function shareOnTwitter() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent(document.title);
            window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
        }
        
        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert('Link copied to clipboard!');
            });
        }
    </script>
</body>
</html>