<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

class NewsService
{
    /**
     * Get featured news posts
     */
    public function getFeaturedNews($limit = 3) 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    np.id,
                    np.title,
                    np.slug,
                    np.excerpt,
                    np.featured_image,
                    np.published_date,
                    np.views_count,
                    nc.name as category_name,
                    nc.slug as category_slug,
                    nc.color_code
                FROM news_posts np
                LEFT JOIN news_categories nc ON np.category_id = nc.id
                WHERE np.is_featured = true 
                AND np.is_published = true
                ORDER BY np.published_date DESC
                LIMIT ?
            ";
            
            $posts = $conn->executeQuery($sql, [$limit])->fetchAllAssociative();
            
            foreach ($posts as &$post) {
                if (!empty($post['featured_image'])) {
                    $post['image_url'] = getPresignedUrl('gov-pineda-images/' . $post['featured_image']);
                } else {
                    $post['image_url'] = null;
                }
                
                $post['formatted_date'] = $this->formatDate($post['published_date']);
                $post['reading_time'] = $this->calculateReadingTime($post['excerpt']);
            }
            
            return [
                'success' => true,
                'data' => $posts
            ];
            
        } catch (\Exception $e) {
            error_log('Get featured news error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch featured news'];
        }
    }
    
    /**
     * Get all news posts with pagination and filters
     */
    public function getNewsPosts($categoryId = null, $tagId = null, $page = 1, $perPage = 9, $search = null) 
    {
        try {
            $conn = Conn();
            
            $offset = ($page - 1) * $perPage;
            
            $whereClauses = ["np.is_published = true"];
            $params = [];
            
            if ($categoryId && $categoryId !== 'all') {
                $whereClauses[] = "np.category_id = ?";
                $params[] = $categoryId;
            }
            
            if ($tagId) {
                $whereClauses[] = "EXISTS (
                    SELECT 1 FROM news_post_tags npt 
                    WHERE npt.post_id = np.id AND npt.tag_id = ?
                )";
                $params[] = $tagId;
            }
            
            if ($search) {
                $whereClauses[] = "(
                    LOWER(np.title) LIKE LOWER(?) OR 
                    LOWER(np.excerpt) LIKE LOWER(?) OR 
                    LOWER(np.content) LIKE LOWER(?)
                )";
                $searchTerm = '%' . $search . '%';
                $params[] = $searchTerm;
                $params[] = $searchTerm;
                $params[] = $searchTerm;
            }
            
            $whereClause = implode(' AND ', $whereClauses);
            
            // Get total count
            $countSql = "
                SELECT COUNT(*) 
                FROM news_posts np
                WHERE $whereClause
            ";
            $total = $conn->executeQuery($countSql, $params)->fetchOne();
            
            // Get posts
            $sql = "
                SELECT 
                    np.id,
                    np.title,
                    np.slug,
                    np.excerpt,
                    np.featured_image,
                    np.published_date,
                    np.views_count,
                    nc.name as category_name,
                    nc.slug as category_slug,
                    nc.color_code
                FROM news_posts np
                LEFT JOIN news_categories nc ON np.category_id = nc.id
                WHERE $whereClause
                ORDER BY np.published_date DESC
                LIMIT ? OFFSET ?
            ";
            
            $params[] = $perPage;
            $params[] = $offset;
            
            $posts = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            foreach ($posts as &$post) {
                if (!empty($post['featured_image'])) {
                    $post['image_url'] = getPresignedUrl('gov-pineda-images/' . $post['featured_image']);
                } else {
                    $post['image_url'] = null;
                }
                
                $post['formatted_date'] = $this->formatDate($post['published_date']);
                $post['reading_time'] = $this->calculateReadingTime($post['excerpt']);
                $post['tags'] = $this->getPostTags($post['id']);
            }
            
            return [
                'success' => true,
                'data' => $posts,
                'pagination' => [
                    'total' => $total,
                    'per_page' => $perPage,
                    'current_page' => $page,
                    'total_pages' => ceil($total / $perPage)
                ]
            ];
            
        } catch (\Exception $e) {
            error_log('Get news posts error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch news posts'];
        }
    }
    
    /**
     * Get single news post details
     */
    public function getNewsPost($slug) 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    np.id,
                    np.title,
                    np.slug,
                    np.excerpt,
                    np.content,
                    np.featured_image,
                    np.author_name,
                    np.published_date,
                    np.views_count,
                    np.category_id,
                    nc.name as category_name,
                    nc.slug as category_slug,
                    nc.color_code
                FROM news_posts np
                LEFT JOIN news_categories nc ON np.category_id = nc.id
                WHERE np.slug = ? AND np.is_published = true
            ";
            
            $post = $conn->executeQuery($sql, [$slug])->fetchAssociative();
            
            if (!$post) {
                return ['success' => false, 'message' => 'Post not found'];
            }
            
            // Increment views
            $conn->executeStatement(
                "UPDATE news_posts SET views_count = views_count + 1 WHERE id = ?",
                [$post['id']]
            );
            
            if (!empty($post['featured_image'])) {
                $post['image_url'] = getPresignedUrl('gov-pineda-images/' . $post['featured_image']);
            } else {
                $post['image_url'] = null;
            }
            
            $post['formatted_date'] = $this->formatDate($post['published_date']);
            $post['reading_time'] = $this->calculateReadingTime($post['content']);
            $post['tags'] = $this->getPostTags($post['id']);
            
            return [
                'success' => true,
                'data' => $post
            ];
            
        } catch (\Exception $e) {
            error_log('Get news post error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch news post'];
        }
    }
    
    /**
     * Get news categories
     */
    public function getCategories() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    nc.id,
                    nc.name,
                    nc.slug,
                    nc.description,
                    nc.color_code,
                    COUNT(np.id) as post_count
                FROM news_categories nc
                LEFT JOIN news_posts np ON nc.id = np.category_id 
                    AND np.is_published = true
                WHERE nc.is_active = true
                GROUP BY nc.id, nc.name, nc.slug, nc.description, nc.color_code, nc.display_order
                ORDER BY nc.display_order ASC
            ";
            
            $categories = $conn->executeQuery($sql)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $categories
            ];
            
        } catch (\Exception $e) {
            error_log('Get news categories error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch categories'];
        }
    }
    
    /**
     * Get related posts
     */
    public function getRelatedPosts($categoryId, $currentPostId, $limit = 3) 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    np.id,
                    np.title,
                    np.slug,
                    np.excerpt,
                    np.featured_image,
                    np.published_date,
                    nc.name as category_name,
                    nc.color_code
                FROM news_posts np
                LEFT JOIN news_categories nc ON np.category_id = nc.id
                WHERE np.category_id = ? 
                AND np.id != ?
                AND np.is_published = true
                ORDER BY np.published_date DESC
                LIMIT ?
            ";
            
            $posts = $conn->executeQuery($sql, [$categoryId, $currentPostId, $limit])->fetchAllAssociative();
            
            foreach ($posts as &$post) {
                if (!empty($post['featured_image'])) {
                    $post['image_url'] = getPresignedUrl('gov-pineda-images/' . $post['featured_image']);
                } else {
                    $post['image_url'] = null;
                }
                $post['formatted_date'] = $this->formatDate($post['published_date']);
            }
            
            return [
                'success' => true,
                'data' => $posts
            ];
            
        } catch (\Exception $e) {
            error_log('Get related posts error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch related posts'];
        }
    }
    
    /**
     * Get post tags
     */
    private function getPostTags($postId) 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT nt.id, nt.name, nt.slug
                FROM news_tags nt
                JOIN news_post_tags npt ON nt.id = npt.tag_id
                WHERE npt.post_id = ?
                ORDER BY nt.name ASC
            ";
            
            return $conn->executeQuery($sql, [$postId])->fetchAllAssociative();
            
        } catch (\Exception $e) {
            return [];
        }
    }
    
    /**
     * Format date
     */
    private function formatDate($dateString) 
    {
        $date = new \DateTime($dateString);
        return $date->format('F j, Y');
    }
    
    /**
     * Calculate reading time
     */
    private function calculateReadingTime($text) 
    {
        $wordCount = str_word_count(strip_tags($text));
        $minutes = ceil($wordCount / 200); // Average reading speed
        return $minutes . ' min read';
    }
}