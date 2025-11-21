<?php
$pageTitle = "News Article - Gov. Lilia 'Nanay' Pineda";
$pageDescription = "Read the latest news and updates from the provincial government of Pampanga.";
$additionalCSS = ['css/news-detail.css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
</head>
<body>
    <!-- Back Button -->
    <a href="news.php" class="back-button" title="Back to News">
        <i class="fas fa-arrow-left"></i>
    </a>

    <!-- Loading State -->
    <div id="loadingState" class="loading-container" style="min-height: 100vh;">
        <div class="loading-spinner"></div>
    </div>

    <!-- Article Content -->
    <main class="news-detail-page" id="articleContent" style="display: none;">
        <!-- Article Header -->
        <article class="article-header" id="articleHeader">
           
        </article>

        <!-- Article Body -->
        <div class="article-container">
            <div class="article-main">
                <!-- Article Meta -->
                <div class="article-meta" id="articleMeta"></div>

                <!-- Article Content -->
                <div class="article-body" id="articleBody"></div>

                <!-- Article Tags -->
                <div class="article-tags" id="articleTags"></div>

                <!-- Share Section -->
                <div class="article-share">
                    <h3>Share this article</h3>
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
            </div>

            <!-- Sidebar -->
            <aside class="article-sidebar">
                <!-- Category Card -->
                <div class="sidebar-card">
                    <h3 class="sidebar-title">Category</h3>
                    <div id="categoryInfo"></div>
                </div>

                <!-- Related Articles -->
                <div class="sidebar-card" id="relatedCard" style="display: none;">
                    <h3 class="sidebar-title">Related Articles</h3>
                    <div class="related-articles" id="relatedArticles"></div>
                </div>
            </aside>
        </div>
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
            const slug = urlParams.get('slug');
            
            if (!slug) {
                alert('No article specified');
                window.location.href = 'news.php';
                return;
            }
            
            loadArticle(slug);
            
            function loadArticle(slug) {
                $.ajax({
                    url: `${API_BASE}/Admin/api/news/${slug}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderArticle(response.data);
                            $('#loadingState').hide();
                            $('#articleContent').fadeIn();
                            
                            // Load related articles
                            if (response.data.category_id) {
                                loadRelatedArticles(response.data.category_id, response.data.id);
                            }
                        } else {
                            alert('Article not found');
                            window.location.href = 'news.php';
                        }
                    },
                    error: function() {
                        alert('Failed to load article');
                        window.location.href = 'news.php';
                    }
                });
            }
            
            function renderArticle(article) {
                // Update page title
                document.title = `${article.title} - Gov. Lilia "Nanay" Pineda`;
                
                // Header
                const headerHtml = `
                    <div class="header-overlay"></div>
                    <div class="header-image" style="background-image: url('${article.image_url || 'assets/placeholder.jpg'}')"></div>
                    <div class="header-content">
                        <span class="header-category" style="background: ${article.color_code}">${article.category_name}</span>
                        <h1 class="article-title">${article.title}</h1>
                        <div class="header-meta">
                            <span><i class="far fa-calendar"></i> ${article.formatted_date}</span>
                            <span><i class="far fa-user"></i> ${article.author_name}</span>
                            <span><i class="far fa-clock"></i> ${article.reading_time}</span>
                            <span><i class="far fa-eye"></i> ${article.views_count} views</span>
                        </div>
                    </div>
                `;
                $('#articleHeader').html(headerHtml);
                
                // Meta
                const metaHtml = `
                    <div class="meta-item">
                        <i class="fas fa-user-circle"></i>
                        <span>By <strong>${article.author_name}</strong></span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Published on <strong>${article.formatted_date}</strong></span>
                    </div>
                `;
                $('#articleMeta').html(metaHtml);
                
                // Body
                const bodyHtml = `
                    ${article.excerpt ? `<p class="article-excerpt">${article.excerpt}</p>` : ''}
                    <div class="article-text">${formatArticleContent(article.content)}</div>
                `;
                $('#articleBody').html(bodyHtml);
                
                // Tags
                if (article.tags && article.tags.length > 0) {
                    let tagsHtml = '<h3>Tags</h3><div class="tags-list">';
                    article.tags.forEach(tag => {
                        tagsHtml += `<span class="tag">#${tag.name}</span>`;
                    });
                    tagsHtml += '</div>';
                    $('#articleTags').html(tagsHtml);
                } else {
                    $('#articleTags').hide();
                }
                
                // Category Info
                const categoryHtml = `
                    <a href="news.php?category=${article.category_id}" class="category-link" style="background: ${article.color_code}">
                        <i class="fas fa-folder"></i>
                        ${article.category_name}
                    </a>
                `;
                $('#categoryInfo').html(categoryHtml);
            }
            
            function formatArticleContent(content) {
                // Convert line breaks to paragraphs
                return content.split('\n\n').map(paragraph => {
                    if (paragraph.trim()) {
                        return `<p>${paragraph.trim()}</p>`;
                    }
                    return '';
                }).join('');
            }
            
            function loadRelatedArticles(categoryId, currentId) {
                $.ajax({
                    url: `${API_BASE}/Admin/api/news/${currentId}/related?category=${categoryId}&limit=3`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data && response.data.length > 0) {
                            renderRelatedArticles(response.data);
                        }
                    }
                });
            }
            
            function renderRelatedArticles(articles) {
                let html = '';
                articles.forEach(article => {
                    html += `
                        <a href="news-detail.php?slug=${article.slug}" class="related-item">
                            <div class="related-image" style="background-image: url('${article.image_url || 'assets/placeholder.jpg'}')"></div>
                            <div class="related-content">
                                <span class="related-category" style="color: ${article.color_code}">${article.category_name}</span>
                                <h4>${article.title}</h4>
                                <span class="related-date">${article.formatted_date}</span>
                            </div>
                        </a>
                    `;
                });
                $('#relatedArticles').html(html);
                $('#relatedCard').show();
            }
        });
        
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