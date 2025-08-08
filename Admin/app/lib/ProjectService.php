<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

class ProjectService
{
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
}