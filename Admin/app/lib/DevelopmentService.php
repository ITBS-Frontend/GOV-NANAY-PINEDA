<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

class DevelopmentService
{
    /**
     * Get infrastructure projects
     */
    public function getInfrastructureProjects($municipality = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = ["project_type = 'infrastructure' OR project_type = 'governance'"];
            $params = [];
            
            if ($municipality) {
                $whereClauses[] = "municipality = ?";
                $params[] = $municipality;
            }
            
            $whereClause = implode(' AND ', $whereClauses);
            
            $sql = "
                SELECT 
                    p.id,
                    p.title,
                    p.description,
                    p.full_description,
                    p.municipality,
                    p.location,
                    p.project_type,
                    p.budget_amount,
                    p.start_date,
                    p.end_date,
                    p.status,
                    p.featured_image,
                    c.name as category_name,
                    c.color_code
                FROM projects p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE $whereClause
                ORDER BY p.start_date DESC
            ";
            
            $projects = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            foreach ($projects as &$project) {
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
            }
            
            return [
                'success' => true,
                'data' => $projects
            ];
            
        } catch (\Exception $e) {
            error_log('Get infrastructure projects error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch infrastructure projects'];
        }
    }
    
    /**
     * Get economic indicators
     */
    public function getEconomicIndicators($year = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = [];
            $params = [];
            
            if ($year) {
                $whereClauses[] = "year = ?";
                $params[] = $year;
            }
            
            $whereClause = count($whereClauses) > 0 ? 'WHERE ' . implode(' AND ', $whereClauses) : '';
            
            $sql = "
                SELECT 
                    id,
                    indicator_name,
                    value,
                    unit,
                    year,
                    quarter,
                    source,
                    display_order
                FROM economic_indicators
                $whereClause
                ORDER BY display_order ASC, year DESC
            ";
            
            $indicators = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $indicators
            ];
            
        } catch (\Exception $e) {
            error_log('Get economic indicators error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch economic indicators'];
        }
    }
    
    /**
     * Get business sectors
     */
    public function getBusinessSectors() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    id,
                    sector_name,
                    description,
                    number_of_establishments,
                    employment_generated,
                    contribution_to_gdp,
                    icon_class
                FROM business_sectors
                ORDER BY contribution_to_gdp DESC
            ";
            
            $sectors = $conn->executeQuery($sql)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $sectors
            ];
            
        } catch (\Exception $e) {
            error_log('Get business sectors error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch business sectors'];
        }
    }
    
    /**
     * Get investment opportunities
     */
    public function getInvestmentOpportunities($sector = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = ["is_active = true"];
            $params = [];
            
            if ($sector) {
                $whereClauses[] = "sector = ?";
                $params[] = $sector;
            }
            
            $whereClause = implode(' AND ', $whereClauses);
            
            $sql = "
                SELECT 
                    id,
                    opportunity_title,
                    sector,
                    description,
                    location,
                    estimated_investment,
                    potential_returns,
                    incentives,
                    contact_info,
                    featured_image
                FROM investment_opportunities
                WHERE $whereClause
                ORDER BY created_at DESC
            ";
            
            $opportunities = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            foreach ($opportunities as &$opportunity) {
                if (!empty($opportunity['featured_image'])) {
                    $opportunity['image_url'] = getPresignedUrl('gov-pineda-images/' . $opportunity['featured_image']);
                } else {
                    $opportunity['image_url'] = null;
                }
            }
            
            return [
                'success' => true,
                'data' => $opportunities
            ];
            
        } catch (\Exception $e) {
            error_log('Get investment opportunities error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch investment opportunities'];
        }
    }
}