<?php
// Page specific variables
$pageTitle = "About Gov. Lilia 'Nanay' Pineda";
$pageDescription = "Learn about the life, career, and achievements of Governor Lilia 'Nanay' Pineda - a dedicated public servant transforming Pampanga through compassionate leadership.";
$additionalCSS = ['css/about.css'];
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
    <div class="about-page">
        <!-- Back Button -->
        <!-- <a href="index.php" class="back-button" title="Back to Home">
            <i class="fas fa-arrow-left"></i>
        </a> -->

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
            
            loadProfileImage();
            loadProfileDetails();
            loadAboutContent();
            loadAchievements();
            
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
            
            function loadProfileDetails() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/about/profile`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderProfileDetails(response.data);
                        }
                    }
                });
            }
            
            function loadAboutContent() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/about/content`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderAboutContent(response.data);
                        }
                    }
                });
            }
            
            function loadAchievements() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/about/achievements`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderAchievements(response.data);
                        }
                    }
                });
            }
            
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
            
            function renderAboutContent(contentData) {
                let html = '';
                
                if (contentData.main) {
                    contentData.main.forEach((item, index) => {
                        if (item.title) html += `<h2>${item.title}</h2>`;
                        html += `<p>${item.content}</p>`;
                    });
                }
                
                if (contentData.vision) {
                    contentData.vision.forEach(item => {
                        if (item.title) html += `<h2 style="margin-top: 2rem;">${item.title}</h2>`;
                        html += `<p>${item.content}</p>`;
                    });
                }
                
                if (contentData.mission) {
                    contentData.mission.forEach(item => {
                        if (item.title) html += `<h2 style="margin-top: 2rem;">${item.title}</h2>`;
                        html += `<p>${item.content}</p>`;
                    });
                }
                
                $('#aboutBio').html(html);
            }
            
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
        });
    </script>
</body>
</html>