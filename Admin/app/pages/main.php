<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gov. Lilia "Nanay" Pineda - Official Portfolio</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* CSS Variables for easy theming */
        :root {
            --primary-blue: #3B82F6;
            --primary-blue-dark: #2563EB;
            --primary-blue-light: #60A5FA;
            --bg-primary: #FFFFFF;
            --bg-secondary: #F8FAFC;
            --bg-tertiary: #F1F5F9;
            --text-primary: #1E293B;
            --text-secondary: #64748B;
            --text-tertiary: #94A3B8;
            --border-color: #E2E8F0;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --sidebar-width: 80px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Dark mode variables (can be toggled with JS) */
        [data-theme="dark"] {
            --bg-primary: #0F172A;
            --bg-secondary: #1E293B;
            --bg-tertiary: #334155;
            --text-primary: #F1F5F9;
            --text-secondary: #CBD5E1;
            --text-tertiary: #94A3B8;
            --border-color: #334155;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-secondary);
            color: var(--text-primary);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Loading Spinner */
        .loading-spinner {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 3px solid var(--border-color);
            border-radius: 50%;
            border-top-color: var(--primary-blue);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .loading-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 400px;
        }

        /* Sidebar Navigation */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--bg-primary);
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 0;
            z-index: 1000;
            transition: var(--transition);
        }

        .sidebar-logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 3rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .sidebar-logo:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-lg);
        }

        .nav-menu {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .nav-item {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            cursor: pointer;
            border-radius: 12px;
            transition: var(--transition);
            position: relative;
        }

        .nav-item:hover {
            background: var(--bg-tertiary);
            color: var(--primary-blue);
        }

        .nav-item.active {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            color: white;
        }

        .nav-item i {
            font-size: 1.3rem;
        }

        .nav-tooltip {
            position: absolute;
            left: 70px;
            background: var(--text-primary);
            color: var(--bg-primary);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            white-space: nowrap;
            font-size: 0.875rem;
            opacity: 0;
            pointer-events: none;
            transition: var(--transition);
        }

        .nav-item:hover .nav-tooltip {
            opacity: 1;
            left: 80px;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        /* Hero Section with Carousel */
        .hero-section {
            position: relative;
            height: 100vh;
            background: var(--bg-primary);
            overflow: hidden;
        }

        .carousel-container {
            position: relative;
            height: 100%;
            width: 100%;
        }

        .carousel-slide {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            display: flex;
            align-items: center;
            padding: 0 5%;
        }

        .carousel-slide.active {
            opacity: 1;
        }

        .slide-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        .slide-text {
            animation: slideInLeft 0.8s ease-out;
        }

        .slide-category {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: var(--primary-blue);
            color: white;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .slide-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--text-primary), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .slide-description {
            font-size: 1.125rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .slide-stats {
            display: flex;
            gap: 3rem;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            display: block;
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--text-tertiary);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .slide-visual {
            position: relative;
            height: 500px;
            animation: slideInRight 0.8s ease-out;
        }

        .slide-number {
            position: absolute;
            top: -50px;
            right: 0;
            font-size: 15rem;
            font-weight: 900;
            color: var(--bg-tertiary);
            z-index: 1;
            line-height: 1;
        }

        .slide-image {
            position: relative;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            border-radius: 24px;
            overflow: hidden;
            z-index: 2;
            box-shadow: var(--shadow-xl);
        }

        .slide-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel-controls {
            position: absolute;
            bottom: 3rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 1rem;
            z-index: 10;
        }

        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--border-color);
            cursor: pointer;
            transition: var(--transition);
        }

        .carousel-dot.active {
            width: 40px;
            border-radius: 6px;
            background: var(--primary-blue);
        }

        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: var(--bg-primary);
            border: 2px solid var(--border-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            z-index: 10;
        }

        .carousel-nav:hover {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }

        .carousel-prev {
            left: 2rem;
        }

        .carousel-next {
            right: 2rem;
        }

        /* Projects Section */
        .projects-section {
            padding: 5rem 5%;
            background: var(--bg-secondary);
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        .category-tabs {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .category-tab {
            padding: 0.75rem 2rem;
            background: var(--bg-primary);
            border: 2px solid var(--border-color);
            border-radius: 50px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .category-tab:hover {
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .category-tab.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }

        .category-count {
            display: inline-block;
            margin-left: 0.5rem;
            padding: 0.125rem 0.5rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            font-size: 0.75rem;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .project-card {
            background: var(--bg-primary);
            border-radius: 20px;
            overflow: hidden;
            transition: var(--transition);
            cursor: pointer;
            box-shadow: var(--shadow-md);
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .project-image {
            height: 200px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            position: relative;
            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .project-number {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 3rem;
            font-weight: 900;
            color: rgba(255, 255, 255, 0.2);
        }

        .project-content {
            padding: 2rem;
        }

        .project-category {
            display: inline-block;
            padding: 0.25rem 1rem;
            background: var(--bg-tertiary);
            color: var(--primary-blue);
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .project-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .project-description {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .project-stats {
            display: flex;
            gap: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .project-stat {
            flex: 1;
            text-align: center;
        }

        .project-stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            display: block;
        }

        .project-stat-label {
            font-size: 0.75rem;
            color: var(--text-tertiary);
            text-transform: uppercase;
        }

        /* About Section */
        .about-section {
            padding: 5rem 5%;
            background: var(--bg-primary);
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-content h2 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 2rem;
        }

        .about-text {
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .about-visual {
            position: relative;
        }

        .about-image-container {
            position: relative;
            width: 400px;
            height: 400px;
            margin: 0 auto;
        }

        .about-shape {
            position: absolute;
            border-radius: 30px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
        }

        .shape-1 {
            width: 350px;
            height: 350px;
            top: 0;
            left: 0;
            opacity: 0.1;
        }

        .shape-2 {
            width: 150px;
            height: 150px;
            bottom: -30px;
            left: -30px;
            opacity: 0.2;
        }

        .shape-3 {
            width: 100px;
            height: 100px;
            top: -20px;
            right: -20px;
            background: #EA580C;
            opacity: 0.3;
        }

        .about-avatar {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: white;
            box-shadow: var(--shadow-xl);
        }

        /* Political Journey Section */
        .journey-section {
            padding: 5rem 5%;
            background: var(--bg-secondary);
        }

        .timeline-container {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--border-color);
            transform: translateX(-50%);
        }

        .timeline-item {
            display: flex;
            margin-bottom: 4rem;
            position: relative;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-content {
            flex: 1;
            padding: 2rem;
            background: var(--bg-primary);
            border-radius: 20px;
            box-shadow: var(--shadow-md);
            position: relative;
            margin: 0 2rem;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            top: 2rem;
            width: 20px;
            height: 20px;
            background: var(--primary-blue);
            border: 4px solid var(--bg-secondary);
            border-radius: 50%;
            transform: translateX(-50%);
            z-index: 2;
        }

        .timeline-date {
            color: var(--primary-blue);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .timeline-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .timeline-description {
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .timeline-spacer {
            flex: 1;
        }

        .current-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: #10B981;
            color: white;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 1rem;
        }

        /* Stats Summary */
        .stats-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1000px;
            margin: 3rem auto;
            padding: 2rem;
            background: var(--bg-primary);
            border-radius: 20px;
            box-shadow: var(--shadow-md);
        }

        .summary-stat {
            text-align: center;
        }

        .summary-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            display: block;
        }

        .summary-label {
            font-size: 0.875rem;
            color: var(--text-tertiary);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .slide-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .slide-visual {
                display: none;
            }

            .about-container {
                grid-template-columns: 1fr;
            }

            .timeline-item,
            .timeline-item:nth-child(even) {
                flex-direction: column;
            }

            .timeline-line {
                left: 20px;
            }

            .timeline-dot {
                left: 20px;
            }
        }

        @media (max-width: 768px) {
            :root {
                --sidebar-width: 60px;
            }

            .slide-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .stats-summary {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Navigation -->
    <nav class="sidebar">
        <div class="sidebar-logo">LP</div>
        <div class="nav-menu">
            <div class="nav-item active" data-section="hero">
                <i class="fas fa-home"></i>
                <span class="nav-tooltip">Home</span>
            </div>
            <div class="nav-item" data-section="projects">
                <i class="fas fa-briefcase"></i>
                <span class="nav-tooltip">Projects</span>
            </div>
            <div class="nav-item" data-section="about">
                <i class="fas fa-user"></i>
                <span class="nav-tooltip">About</span>
            </div>
            <div class="nav-item" data-section="journey">
                <i class="fas fa-route"></i>
                <span class="nav-tooltip">Journey</span>
            </div>
        </div>
    </nav>

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
            <div class="carousel-controls" id="carouselControls" style="display: none;">
            </div>

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

            <!-- Stats Summary -->
            <div class="stats-summary" id="statsSummary" style="display: none;">
                <div class="summary-stat">
                    <span class="summary-value" id="totalProjects">0</span>
                    <span class="summary-label">Total Projects</span>
                </div>
                <div class="summary-stat">
                    <span class="summary-value" id="totalInvestment">₱0</span>
                    <span class="summary-label">Total Investment</span>
                </div>
                <div class="summary-stat">
                    <span class="summary-value" id="yearsService">0</span>
                    <span class="summary-label">Years of Service</span>
                </div>
                <div class="summary-stat">
                    <span class="summary-value" id="featuredProjects">0</span>
                    <span class="summary-label">Featured Projects</span>
                </div>
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
                    <p class="about-text">
                        Born Lilia Paule Garcia on February 21, 1951, Governor Lilia "Nanay" 
                        Pineda has dedicated over three decades to public service in Pampanga. 
                        Known for her compassionate leadership and innovative governance, she 
                        has transformed the province through strategic development programs and 
                        inclusive policies that put Kapampangans first.
                    </p>
                    <p class="about-text">
                        From her early days as a community leader to becoming one of the 
                        Philippines' most respected governors, Nanay Lilia's journey is marked by 
                        unwavering commitment to progress, transparency, and social justice. Her 
                        legacy continues to shape Pampanga's future as a progressive province in 
                        Central Luzon.
                    </p>
                </div>
                <div class="about-visual">
                    <div class="about-image-container">
                        <div class="about-shape shape-1"></div>
                        <div class="about-shape shape-2"></div>
                        <div class="about-shape shape-3"></div>
                        <div class="about-avatar">
                            <i class="fas fa-user"></i>
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // API Base URL - adjust based on your setup
            const API_BASE = window.location.origin;
            
            // State management
            let featuredProjects = [];
            let allProjects = [];
            let categories = [];
            let currentSlide = 0;
            let slideInterval;

            // Load all data on page load
            loadFeaturedProjects();
            loadCategories();
            loadProjects();
            loadPoliticalJourney();
            loadPortfolioStats();

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
                        $('#carouselContainer').html('<p class="text-center">Error loading featured projects</p>');
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
                        $('#projectsGrid').html('<p class="text-center">Error loading projects</p>');
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

            function loadPortfolioStats() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/stats`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderStats(response.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading portfolio stats:', error);
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
                    const slideNumber = String(project.project_number || index + 1).padStart(2, '0');
                    
                    slidesHtml += `
                        <div class="carousel-slide ${isActive}">
                            <div class="slide-content">
                                <div class="slide-text">
                                    <span class="slide-category" style="background: ${project.color_code || '#3B82F6'}">${project.category_name || 'Project'}</span>
                                    <h1 class="slide-title">${project.title}</h1>
                                    <p class="slide-description">${project.description}</p>
                                    <div class="slide-stats">
                                        ${project.stats.map(stat => `
                                            <div class="stat-item">
                                                <span class="stat-value">${stat.value}</span>
                                                <span class="stat-label">${stat.label}</span>
                                            </div>
                                        `).join('')}
                                    </div>
                                </div>
                                <div class="slide-visual">
                                    <div class="slide-number">${slideNumber}</div>
                                    <div class="slide-image" style="background: linear-gradient(135deg, ${project.color_code || '#3B82F6'}, ${project.color_code || '#3B82F6'}99);">
                                        ${project.image_url ? `<img src="${project.image_url}" alt="${project.title}">` : ''}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    dotsHtml += `<span class="carousel-dot ${isActive}" data-slide="${index}"></span>`;
                });
                
                $('#carouselContainer').html(slidesHtml);
                $('#carouselControls').html(dotsHtml).show();
                $('.carousel-nav').show();
                
                // Start auto-play
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
                                ${project.stats && project.stats.length > 0 ? `
                                    <div class="project-stats">
                                        ${project.stats.map(stat => `
                                            <div class="project-stat">
                                                <span class="project-stat-value">${stat.value}</span>
                                                <span class="project-stat-label">${stat.label}</span>
                                            </div>
                                        `).join('')}
                                    </div>
                                ` : ''}
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

            function renderStats(stats) {
                $('#totalProjects').text(stats.total_projects || 0);
                $('#totalInvestment').text(stats.total_investment_display || '₱0');
                $('#yearsService').text(stats.years_of_service || 0);
                $('#featuredProjects').text(stats.featured_count || 0);
                $('#statsSummary').fadeIn();
            }

            // Carousel functionality
            function showSlide(index) {
                const slides = $('.carousel-slide');
                const dots = $('.carousel-dot');
                
                slides.removeClass('active');
                dots.removeClass('active');
                
                slides.eq(index).addClass('active');
                dots.eq(index).addClass('active');
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
                if (slideInterval) {
                    clearInterval(slideInterval);
                }
            }

            // Event Handlers
            $(document).on('click', '.carousel-next', nextSlide);
            $(document).on('click', '.carousel-prev', prevSlide);
            
            $(document).on('click', '.carousel-dot', function() {
                currentSlide = parseInt($(this).data('slide'));
                showSlide(currentSlide);
                startCarousel(); // Restart auto-play
            });

            // Pause carousel on hover
            $('#carouselContainer').hover(stopCarousel, startCarousel);

            // Category filter
            $(document).on('click', '.category-tab', function() {
                $('.category-tab').removeClass('active');
                $(this).addClass('active');
                
                const category = $(this).data('category');
                loadProjects(category === 'all' ? null : category);
            });

            // Navigation
            $('.nav-item').click(function() {
                $('.nav-item').removeClass('active');
                $(this).addClass('active');
                
                const section = $(this).data('section');
                const target = $('#' + section);
                
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 800);
                }
            });

            // Scroll spy for navigation
            $(window).scroll(function() {
                const scrollPos = $(document).scrollTop() + 100;
                
                $('section').each(function() {
                    const top = $(this).offset().top;
                    const bottom = top + $(this).outerHeight();
                    const id = $(this).attr('id');
                    
                    if (scrollPos >= top && scrollPos <= bottom) {
                        $('.nav-item').removeClass('active');
                        $(`.nav-item[data-section="${id}"]`).addClass('active');
                    }
                });
            });

            // Animate elements on scroll
            function animateOnScroll() {
                $('.project-card, .timeline-item').each(function() {
                    const elementTop = $(this).offset().top;
                    const elementBottom = elementTop + $(this).outerHeight();
                    const viewportTop = $(window).scrollTop();
                    const viewportBottom = viewportTop + $(window).height();
                    
                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $(this).css({
                            'opacity': '1',
                            'transform': 'translateY(0)'
                        });
                    }
                });
            }

            $(window).on('scroll', animateOnScroll);
            animateOnScroll();
        });
    </script>
</body>
</html>