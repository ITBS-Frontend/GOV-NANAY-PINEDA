<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Gov. Lilia "Nanay" Pineda</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
    

</head>
<body>
    <div class="about-page">
        <!-- Back Button -->
        <a href="index.php" class="back-button" title="Back to Home">
            <i class="fas fa-arrow-left"></i>
        </a>

        <div class="about-page-content">
            <!-- Header -->
            <div class="about-header">
                <h1>About Governor Lilia "Nanay" Pineda</h1>
                <p class="about-subtitle">A Legacy of Service, Leadership, and Compassion</p>
            </div>

            <!-- Main Content Grid -->
            <div class="about-grid">
                <!-- Left Column - Image and Details -->
                <div class="about-image-section">
                    <img id="profileImage" src="assets/profile.jpg" alt="Gov. Lilia Pineda" class="profile-image">
                    
                    <div class="profile-details" id="profileDetails">
                        <div class="loading-container">
                            <div class="loading-spinner"></div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Bio -->
                <div class="about-bio" id="aboutBio">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </div>

            <!-- Achievements Section -->
            <div class="achievements-section">
                <div class="about-header" style="border-bottom: none; padding-bottom: 0;">
                    <h2 style="font-size: 2.5rem;">Key Achievements</h2>
                </div>

                <div class="achievements-grid" id="achievementsGrid">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // API Base URL
            const API_BASE = window.location.origin;
            
            // Load all data
            loadProfileImage();
            loadProfileDetails();
            loadAboutContent();
            loadAchievements();
            
            // Load profile image
            function loadProfileImage() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/about/image`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data.image_url) {
                            $('#profileImage').attr('src', response.data.image_url);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading profile image:', error);
                    }
                });
            }
            
            // Load profile details
            function loadProfileDetails() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/about/profile`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderProfileDetails(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading profile details:', error);
                        $('#profileDetails').html('<p>Error loading profile details</p>');
                    }
                });
            }
            
            // Load about content
            function loadAboutContent() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/about/content`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderAboutContent(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading about content:', error);
                        $('#aboutBio').html('<p>Error loading content</p>');
                    }
                });
            }
            
            // Load achievements
            function loadAchievements() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/about/achievements`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderAchievements(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading achievements:', error);
                        $('#achievementsGrid').html('<p>Error loading achievements</p>');
                    }
                });
            }
            
            // Render profile details
            function renderProfileDetails(details) {
                let html = '';
                
                details.forEach(detail => {
                    html += `
                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="${detail.icon_class || 'fas fa-info-circle'}"></i>
                            </div>
                            <div class="detail-content">
                                <h4>${detail.detail_label}</h4>
                                <p>${detail.detail_value}</p>
                            </div>
                        </div>
                    `;
                });
                
                $('#profileDetails').html(html);
            }
            
            // Render about content
            function renderAboutContent(contentData) {
                let html = '';
                
                // Render main content
                if (contentData.main) {
                    contentData.main.forEach((item, index) => {
                        if (item.title) {
                            html += `<h2>${item.title}</h2>`;
                        }
                        html += `<p>${item.content}</p>`;
                    });
                }
                
                // Render vision section
                if (contentData.vision) {
                    contentData.vision.forEach(item => {
                        if (item.title) {
                            html += `<h2 style="margin-top: 2rem;">${item.title}</h2>`;
                        }
                        html += `<p>${item.content}</p>`;
                    });
                }
                
                // Render mission section
                if (contentData.mission) {
                    contentData.mission.forEach(item => {
                        if (item.title) {
                            html += `<h2 style="margin-top: 2rem;">${item.title}</h2>`;
                        }
                        html += `<p>${item.content}</p>`;
                    });
                }
                
                $('#aboutBio').html(html);
            }
            
            // Render achievements
            function renderAchievements(achievements) {
                let html = '';
                
                achievements.forEach(achievement => {
                    html += `
                        <div class="achievement-card">
                            <div class="achievement-icon">
                                <i class="${achievement.icon_class || 'fas fa-star'}"></i>
                            </div>
                            <h3>${achievement.title}</h3>
                            <p>${achievement.description || ''}</p>
                        </div>
                    `;
                });
                
                $('#achievementsGrid').html(html);
            }
            
            // Smooth page load animation
            $('body').css('opacity', '0').animate({opacity: 1}, 500);
        });
    </script>
</body>
</html>