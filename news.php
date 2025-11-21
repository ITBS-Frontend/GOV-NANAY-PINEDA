<?php
$pageTitle = "News & Updates - Gov. Lilia 'Nanay' Pineda";
$pageDescription = "Latest news, updates, and announcements from the office of Governor Lilia 'Nanay' Pineda and the provincial government of Pampanga.";
$additionalCSS = ['css/news.css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
</head>
<body>
    <!-- Back Button -->
    <a href="index.php" class="back-button" title="Back to Home">
        <i class="fas fa-arrow-left"></i>
    </a>

    <main class="news-page">
        <!-- Page Header with Search -->
        <section class="page-header">
            <div class="header-content">
                <h1 class="page-title">News & Updates</h1>
                <p class="page-subtitle">Stay informed with the latest developments and initiatives</p>
                
                <!-- Search Bar -->
                <div class="search-container">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Search news articles..." class="search-input">
                        <button class="search-clear" id="searchClear" style="display: none;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured News Hero -->
        <section class="featured-hero-section">
            <div class="container">
                <div class="hero-grid" id="heroGrid">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- What's New Section -->
        <section class="whats-new-section">
            <div class="container">
                <div class="section-header-row">
                    <h2 class="whats-new-title">What's New</h2>
                    <div class="category-tabs-inline" id="categoryTabsInline">
                        <div class="loading-spinner"></div>
                    </div>
                </div>

                <div class="news-content-layout">
                    <!-- Main News List -->
                    <div class="news-list-main">
                        <div class="news-list" id="newsList">
                            <div class="loading-container">
                                <div class="loading-spinner"></div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="pagination-container" id="paginationContainer" style="display: none;"></div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="news-sidebar">
                        <!-- Most Recent -->
                        <div class="sidebar-section">
                            <h3 class="sidebar-title">Most Recent</h3>
                            <div class="recent-posts" id="recentPosts">
                                <div class="loading-spinner"></div>
                            </div>
                        </div>

                        <!-- Popular Posts -->
                        <div class="sidebar-section">
                            <h3 class="sidebar-title">Popular Posts</h3>
                            <div class="popular-posts" id="popularPosts">
                                <div class="loading-spinner"></div>
                            </div>
                        </div>
                    </aside>
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
            let currentPage = 1;
            let currentCategory = 'all';
            let searchQuery = '';
            let searchTimeout;
            
            loadFeaturedHero();
            loadCategories();
            loadNews();
            loadRecentPosts();
            loadPopularPosts();
            
            // Search functionality
            $('#searchInput').on('input', function() {
                const value = $(this).val().trim();
                
                if (value) {
                    $('#searchClear').show();
                } else {
                    $('#searchClear').hide();
                }
                
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    searchQuery = value;
                    loadNews(1);
                }, 500);
            });
            
            $('#searchClear').click(function() {
                $('#searchInput').val('');
                $(this).hide();
                searchQuery = '';
                loadNews(1);
            });
            
            function loadFeaturedHero() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/news/featured?limit=3`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderHeroGrid(response.data);
                        }
                    }
                });
            }
            
            function loadCategories() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/news/categories/list`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderInlineCategories(response.data);
                        }
                    }
                });
            }
            
            function loadNews(page = 1) {
                currentPage = page;
                let url = `${API_BASE}/Admin/api/news?category=${currentCategory}&page=${page}&per_page=6`;
                
                if (searchQuery) {
                    url += `&search=${encodeURIComponent(searchQuery)}`;
                }
                
                $('#newsList').html('<div class="loading-container"><div class="loading-spinner"></div></div>');
                
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderNewsList(response.data);
                            renderPagination(response.pagination);
                        }
                    }
                });
            }
            
            function loadRecentPosts() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/news?per_page=4`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderSidebarPosts(response.data, 'recent');
                        }
                    }
                });
            }
            
            function loadPopularPosts() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/news?per_page=4&sort=views`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderSidebarPosts(response.data, 'popular');
                        }
                    }
                });
            }
            
            function renderHeroGrid(posts) {
                if (posts.length === 0) return;
                
                const mainPost = posts[0];
                const sidePosts = posts.slice(1, 3);
                
                let html = `
                    <div class="hero-main">
                        <a href="news-detail.php?slug=${mainPost.slug}" class="hero-main-link">
                            <div class="hero-main-image" style="background-image: url('${mainPost.image_url || 'assets/placeholder.jpg'}')">
                                <span class="hero-badge" style="background: ${mainPost.color_code}">${mainPost.category_name}</span>
                            </div>
                            <div class="hero-main-content">
                                <h2 class="hero-main-title">${mainPost.title}</h2>
                                <div class="hero-meta">
                                    <span>by ${mainPost.author_name || 'Admin'}</span>
                                    <span>${mainPost.formatted_date}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="hero-side">
                `;
                
                sidePosts.forEach(post => {
                    html += `
                        <a href="news-detail.php?slug=${post.slug}" class="hero-side-card">
                            <div class="hero-side-image" style="background-image: url('${post.image_url || 'assets/placeholder.jpg'}')">
                                <span class="hero-badge" style="background: ${post.color_code}">${post.category_name}</span>
                            </div>
                            <div class="hero-side-content">
                                <h3 class="hero-side-title">${post.title}</h3>
                                <div class="hero-meta">
                                    <span>by ${post.author_name || 'Admin'}</span>
                                    <span>${post.formatted_date}</span>
                                </div>
                            </div>
                        </a>
                    `;
                });
                
                html += '</div>';
                $('#heroGrid').html(html);
            }
            
            function renderInlineCategories(categories) {
                let html = '<button class="category-tab-inline active" data-category="all">Lifestyle</button>';
                categories.forEach(cat => {
                    html += `<button class="category-tab-inline" data-category="${cat.id}">${cat.name}</button>`;
                });
                $('#categoryTabsInline').html(html);
            }
            
            function renderNewsList(posts) {
                if (posts.length === 0) {
                    $('#newsList').html('<p class="no-results">No articles found</p>');
                    return;
                }
                
                let html = '';
                posts.forEach(post => {
                    html += `
                        <article class="news-list-item">
                            <a href="news-detail.php?slug=${post.slug}" class="news-list-link">
                                <div class="news-list-image" style="background-image: url('${post.image_url || 'assets/placeholder.jpg'}')"></div>
                                <div class="news-list-content">
                                    <span class="news-list-category" style="color: ${post.color_code}">${post.category_name}</span>
                                    <h3 class="news-list-title">${post.title}</h3>
                                    <div class="news-list-meta">
                                        <span>${post.formatted_date}</span>
                                    </div>
                                    <p class="news-list-excerpt">${post.excerpt || ''}</p>
                                </div>
                            </a>
                        </article>
                    `;
                });
                $('#newsList').html(html);
            }
            
            function renderSidebarPosts(posts, type) {
                let html = '';
                posts.forEach(post => {
                    html += `
                        <a href="news-detail.php?slug=${post.slug}" class="sidebar-post">
                            <div class="sidebar-post-image" style="background-image: url('${post.image_url || 'assets/placeholder.jpg'}')"></div>
                            <div class="sidebar-post-content">
                                <span class="sidebar-post-category" style="color: ${post.color_code}">${post.category_name}</span>
                                <h4 class="sidebar-post-title">${post.title}</h4>
                                <span class="sidebar-post-date">${post.formatted_date}</span>
                            </div>
                        </a>
                    `;
                });
                
                if (type === 'recent') {
                    $('#recentPosts').html(html);
                } else {
                    $('#popularPosts').html(html);
                }
            }
            
            function renderPagination(pagination) {
                if (pagination.total_pages <= 1) {
                    $('#paginationContainer').hide();
                    return;
                }
                
                let html = '<div class="pagination">';
                
                if (pagination.current_page > 1) {
                    html += `<button class="page-btn" data-page="${pagination.current_page - 1}"><i class="fas fa-chevron-left"></i></button>`;
                }
                
                for (let i = 1; i <= pagination.total_pages; i++) {
                    if (i === 1 || i === pagination.total_pages || (i >= pagination.current_page - 1 && i <= pagination.current_page + 1)) {
                        html += `<button class="page-btn ${i === pagination.current_page ? 'active' : ''}" data-page="${i}">${i}</button>`;
                    } else if (i === pagination.current_page - 2 || i === pagination.current_page + 2) {
                        html += '<span class="page-dots">...</span>';
                    }
                }
                
                if (pagination.current_page < pagination.total_pages) {
                    html += `<button class="page-btn" data-page="${pagination.current_page + 1}"><i class="fas fa-chevron-right"></i></button>`;
                }
                
                html += '</div>';
                $('#paginationContainer').html(html).show();
            }
            
            // Event handlers
            $(document).on('click', '.category-tab-inline', function() {
                $('.category-tab-inline').removeClass('active');
                $(this).addClass('active');
                currentCategory = $(this).data('category');
                loadNews(1);
            });
            
            $(document).on('click', '.page-btn', function() {
                const page = $(this).data('page');
                if (page) {
                    loadNews(page);
                    $('html, body').animate({ scrollTop: $('.whats-new-section').offset().top - 100 }, 500);
                }
            });
        });
    </script>
</body>
</html>