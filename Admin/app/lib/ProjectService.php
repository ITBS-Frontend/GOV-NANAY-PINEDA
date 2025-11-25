<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

class ProjectService
{

        /**
     * Truncate HTML content while preserving tags
     */
    private function truncateHtml($html, $maxLength = 500, $ending = '...') 
    {
        if (strlen(strip_tags($html)) <= $maxLength) {
            return $html;
        }
        
        // Strip tags for length calculation
        $plainText = strip_tags($html);
        
        if (strlen($plainText) <= $maxLength) {
            return $html;
        }
        
        // Truncate plain text
        $truncated = substr($plainText, 0, $maxLength);
        
        // Find last complete word
        $lastSpace = strrpos($truncated, ' ');
        if ($lastSpace !== false) {
            $truncated = substr($truncated, 0, $lastSpace);
        }
        
        return $truncated . $ending;
    }
    
    /**
     * Get featured projects for carousel
     */
    public function getFeaturedProjects() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    p.id,
                    p.title,
                    p.description,
                    p.project_number,
                    p.featured_image,
                    p.budget_amount,
                    c.name as category_name,
                    c.color_code
                FROM projects p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE p.is_featured = true
                ORDER BY p.project_number ASC
                LIMIT 4
            ";
            
            $projects = $conn->executeQuery($sql)->fetchAllAssociative();
            
            foreach ($projects as &$project) {
                // Get stats for each project
                $project['stats'] = $this->getProjectStats($project['id']);
                
                // Generate presigned URL for featured image if exists
                if (!empty($project['featured_image'])) {
                    $project['image_url'] = getPresignedUrl('gov-pineda-images/' . $project['featured_image']);
                } else {
                    $project['image_url'] = null;
                }
            }
            
            return [
                'success' => true,
                'data' => $projects
            ];
            
        } catch (\Exception $e) {
            error_log('Get featured projects error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch featured projects'];
        }
    }
    
    /**
     * Get all projects with optional category filter
     */
    public function getProjects($categoryId = null) 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    p.id,
                    p.title,
                    p.description,
                    p.project_number,
                    p.featured_image,
                    p.budget_amount,
                    p.project_date,
                    c.name as category_name,
                    c.color_code
                FROM projects p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE 1=1
            ";
            
            $params = [];
            
            if ($categoryId && $categoryId !== 'all') {
                $sql .= " AND p.category_id = ?";
                $params[] = $categoryId;
            }
            
            $sql .= " ORDER BY p.project_number ASC";
            
            $projects = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            foreach ($projects as &$project) {
                $project['stats'] = $this->getProjectStats($project['id']);
                
                if (!empty($project['featured_image'])) {
                    $project['image_url'] = getPresignedUrl('gov-pineda-images/' . $project['featured_image']);
                } else {
                    $project['image_url'] = null;
                }
                
                // Format project number
                $project['display_number'] = str_pad($project['project_number'], 2, '0', STR_PAD_LEFT);
            }
            
            return [
                'success' => true,
                'data' => $projects
            ];
            
        } catch (\Exception $e) {
            error_log('Get projects error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch projects'];
        }
    }
    
    /**
     * Get project statistics
     */
    private function getProjectStats($projectId) 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    stat_label as label,
                    stat_value as value,
                    stat_description as description
                FROM project_stats
                WHERE project_id = ?
                ORDER BY id ASC
                LIMIT 3
            ";
            
            return $conn->executeQuery($sql, [$projectId])->fetchAllAssociative();
            
        } catch (\Exception $e) {
            error_log('Get project stats error: ' . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Get all categories
     */
    public function getCategories() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    c.id,
                    c.name,
                    c.color_code,
                    COUNT(p.id) as project_count
                FROM categories c
                LEFT JOIN projects p ON c.id = p.category_id
                GROUP BY c.id, c.name, c.color_code
                ORDER BY c.name ASC
            ";
            
            $categories = $conn->executeQuery($sql)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $categories
            ];
            
        } catch (\Exception $e) {
            error_log('Get categories error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch categories'];
        }
    }
    
    /**
     * Get political journey timeline
     */
    public function getPoliticalJourney() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    id,
                    position_title,
                    start_year,
                    end_year,
                    duration_display,
                    description,
                    is_current
                FROM political_journey
                ORDER BY start_year DESC
            ";
            
            $journey = $conn->executeQuery($sql)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $journey
            ];
            
        } catch (\Exception $e) {
            error_log('Get political journey error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch political journey'];
        }
    }
    
    /**
     * Get portfolio statistics
     */
    public function getPortfolioStats() 
    {
        try {
            $conn = Conn();
            
            $stats = [];
            
            // Total projects
            $stats['total_projects'] = $conn->executeQuery(
                "SELECT COUNT(*) FROM projects"
            )->fetchOne();
            
            // Total budget invested
            $stats['total_investment'] = $conn->executeQuery(
                "SELECT COALESCE(SUM(budget_amount), 0) FROM projects"
            )->fetchOne();
            
            // Featured projects count
            $stats['featured_count'] = $conn->executeQuery(
                "SELECT COUNT(*) FROM projects WHERE is_featured = true"
            )->fetchOne();
            
            // Years of service
            $yearsData = $conn->executeQuery("
                SELECT 
                    MIN(start_year) as first_year,
                    MAX(COALESCE(end_year, EXTRACT(YEAR FROM CURRENT_DATE))) as last_year
                FROM political_journey
            ")->fetchAssociative();
            
            $stats['years_of_service'] = $yearsData ? 
                ($yearsData['last_year'] - $yearsData['first_year']) : 0;
            
            // Format investment for display
            $billion = $stats['total_investment'] / 1000000000;
            $stats['total_investment_display'] = '₱' . number_format($billion, 1) . 'B';
            
            return [
                'success' => true,
                'data' => $stats
            ];
            
        } catch (\Exception $e) {
            error_log('Get portfolio stats error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch portfolio stats'];
        }
    }

    /**
 * Get about page content
 */
public function getAboutContent() 
{
    try {
        $conn = Conn();
        
        $sql = "
            SELECT 
                section_type,
                title,
                content,
                display_order
            FROM about_content
            WHERE is_active = true
            ORDER BY display_order ASC
        ";
        
        $content = $conn->executeQuery($sql)->fetchAllAssociative();
        
        // Group by section type
        $grouped = [];
        foreach ($content as $item) {
            $type = $item['section_type'];
            if (!isset($grouped[$type])) {
                $grouped[$type] = [];
            }
            $grouped[$type][] = $item;
        }
        
        return [
            'success' => true,
            'data' => $grouped
        ];
        
    } catch (\Exception $e) {
        error_log('Get about content error: ' . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to fetch about content'];
    }
}

/**
 * Get profile details
 */
public function getProfileDetails() 
{
    try {
        $conn = Conn();
        
        $sql = "
            SELECT 
                detail_key,
                detail_label,
                detail_value,
                icon_class
            FROM profile_details
            WHERE is_active = true
            ORDER BY display_order ASC
        ";
        
        $details = $conn->executeQuery($sql)->fetchAllAssociative();
        
        return [
            'success' => true,
            'data' => $details
        ];
        
    } catch (\Exception $e) {
        error_log('Get profile details error: ' . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to fetch profile details'];
    }
}

/**
 * Get achievements
 */
public function getAchievements() 
{
    try {
        $conn = Conn();
        
        $sql = "
            SELECT 
                title,
                description,
                icon_class
            FROM achievements
            WHERE is_active = true
            ORDER BY display_order ASC
        ";
        
        $achievements = $conn->executeQuery($sql)->fetchAllAssociative();
        
        return [
            'success' => true,
            'data' => $achievements
        ];
        
    } catch (\Exception $e) {
        error_log('Get achievements error: ' . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to fetch achievements'];
    }
}

/**
 * Get profile image
 */
public function getProfileImage() 
{
    try {
        $conn = Conn();
        
        $sql = "
            SELECT image_path
            FROM profile_images
            WHERE is_primary = true
            AND image_type = 'profile'
            LIMIT 1
        ";
        
        $result = $conn->executeQuery($sql)->fetchAssociative();
        
        $imageUrl = null;
        if ($result && !empty($result['image_path'])) {
            $imageUrl = getPresignedUrl('gov-pineda-images/' . $result['image_path']);
   
        }
        
        return [
            'success' => true,
            'data' => ['image_url' => $imageUrl]
        ];
        
    } catch (\Exception $e) {
        error_log('Get profile image error: ' . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to fetch profile image'];
    }
}

/**
 * Get about preview (first 2 paragraphs + image)
 */
 public function getAboutPreview() 
    {
        try {
            $conn = Conn();
            
            // Get first 2 paragraphs only
            $sql = "
                SELECT content
                FROM about_content
                WHERE is_active = true
                AND section_type = 'main'
                ORDER BY display_order ASC
                LIMIT 2
            ";
            
            $content = $conn->executeQuery($sql)->fetchAllAssociative();
            
            // Truncate each paragraph
            $truncatedContent = [];
            $totalLength = 0;
            $maxTotalLength = 600; // Maximum total characters for homepage
            
            foreach ($content as $item) {
                $remaining = $maxTotalLength - $totalLength;
                
                if ($remaining <= 0) {
                    break;
                }
                
                // Truncate this paragraph if needed
                $truncated = $this->truncateHtml($item['content'], $remaining);
                $truncatedContent[] = ['content' => $truncated];
                
                $totalLength += strlen(strip_tags($truncated));
            }
            
            // Get profile image
            $imgSql = "
                SELECT image_path
                FROM profile_images
                WHERE is_primary = true
                AND image_type = 'profile'
                LIMIT 1
            ";
            
            $imgResult = $conn->executeQuery($imgSql)->fetchAssociative();
            
            $imageUrl = null;
            if ($imgResult && !empty($imgResult['image_path'])) {
                $imageUrl = getPresignedUrl('gov-pineda-images/' . $imgResult['image_path']);
            }
            
            return [
                'success' => true,
                'data' => [
                    'content' => $truncatedContent,
                    'image_url' => $imageUrl,
                    'is_preview' => true // Flag to indicate this is truncated
                ]
            ];
            
        } catch (\Exception $e) {
            error_log('Get about preview error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch about preview'];
        }
    }

/**
 * Get single project details
 */
public function getProjectDetails($projectId) 
{
    try {
        $conn = Conn();
        
        // Get project basic info
        $sql = "
            SELECT 
                p.id,
                p.title,
                p.description,
                p.full_description,
                p.objectives,
                p.impact,
                p.location,
                p.project_number,
                p.featured_image,
                p.budget_amount,
                p.project_date,
                p.start_date,
                p.end_date,
                p.status,
                c.name as category_name,
                c.color_code
            FROM projects p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.id = ?
        ";
        
        $project = $conn->executeQuery($sql, [$projectId])->fetchAssociative();
        
        if (!$project) {
            return ['success' => false, 'message' => 'Project not found'];
        }
        
        // Get project stats
        $project['stats'] = $this->getProjectStats($projectId);
        
        // Get project highlights
        $highlightsSql = "
            SELECT highlight_text
            FROM project_highlights
            WHERE project_id = ?
            ORDER BY display_order ASC
        ";
        $project['highlights'] = $conn->executeQuery($highlightsSql, [$projectId])->fetchAllAssociative();
        
        // Get project gallery
        $gallerySql = "
            SELECT image_path, caption
            FROM project_gallery
            WHERE project_id = ?
            ORDER BY display_order ASC
        ";
        $gallery = $conn->executeQuery($gallerySql, [$projectId])->fetchAllAssociative();
        
        // Generate presigned URLs for gallery images
        $project['gallery'] = array_map(function($img) {
            return [
                'url' => getPresignedUrl('gov-pineda-images/' . $img['image_path']),
                'caption' => $img['caption']
            ];
        }, $gallery);
        
        // Generate presigned URL for featured image
        if (!empty($project['featured_image'])) {
            $project['image_url'] = getPresignedUrl('gov-pineda-images/' . $project['featured_image']);
        } else {
            $project['image_url'] = null;
        }
        
        // Format budget
        if ($project['budget_amount']) {
            $billion = $project['budget_amount'] / 1000000000;
            $project['budget_display'] = '₱' . number_format($billion, 1) . 'B';
        }
        
        return [
            'success' => true,
            'data' => $project
        ];
        
    } catch (\Exception $e) {
        error_log('Get project details error: ' . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to fetch project details'];
    }
}
}