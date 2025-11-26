<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

class ProgramsService
{
    /**
     * Get health programs
     */
    public function getHealthPrograms($status = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = ["is_active = true"];
            $params = [];
            
            if ($status) {
                $whereClauses[] = "status = ?";
                $params[] = $status;
            }
            
            $whereClause = implode(' AND ', $whereClauses);
            
            $sql = "
                SELECT 
                    id,
                    program_name,
                    description,
                    objectives,
                    target_beneficiaries,
                    coverage_area,
                    implementation_date,
                    status,
                    contact_info,
                    featured_image
                FROM health_programs
                WHERE $whereClause
                ORDER BY 
                    CASE status
                        WHEN 'Active' THEN 1
                        WHEN 'Planned' THEN 2
                        WHEN 'Completed' THEN 3
                    END,
                    program_name ASC
            ";
            
            $programs = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            foreach ($programs as &$program) {
                if (!empty($program['featured_image'])) {
                    $program['image_url'] = getPresignedUrl('gov-pineda-images/' . $program['featured_image']);
                } else {
                    $program['image_url'] = null;
                }
                
                // Get statistics
                $program['statistics'] = $this->getProgramStatistics($program['id'], 'health');
            }
            
            return [
                'success' => true,
                'data' => $programs
            ];
            
        } catch (\Exception $e) {
            error_log('Get health programs error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch health programs'];
        }
    }
    
    /**
     * Get social welfare programs
     */
    public function getSocialWelfarePrograms($categoryId = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = ["swp.is_active = true"];
            $params = [];
            
            if ($categoryId) {
                $whereClauses[] = "swp.category_id = ?";
                $params[] = $categoryId;
            }
            
            $whereClause = implode(' AND ', $whereClauses);
            
            $sql = "
                SELECT 
                    swp.id,
                    swp.program_name,
                    swp.description,
                    swp.eligibility_criteria,
                    swp.benefits,
                    swp.how_to_apply,
                    swp.required_documents,
                    swp.contact_info,
                    pc.name as category_name,
                    pc.icon_class,
                    pc.color_code
                FROM social_welfare_programs swp
                LEFT JOIN program_categories pc ON swp.category_id = pc.id
                WHERE $whereClause
                ORDER BY swp.program_name ASC
            ";
            
            $programs = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            foreach ($programs as &$program) {
                // Get statistics
                $program['statistics'] = $this->getProgramStatistics($program['id'], 'social_welfare');
            }
            
            return [
                'success' => true,
                'data' => $programs
            ];
            
        } catch (\Exception $e) {
            error_log('Get social welfare programs error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch social welfare programs'];
        }
    }
    
    /**
     * Get education programs (from existing scholarship data)
     */
    public function getEducationPrograms() 
    {
        try {
            $conn = Conn();
            
            // Get scholarship-related projects
            $sql = "
                SELECT 
                    p.id,
                    p.title as program_name,
                    p.description,
                    p.full_description as objectives,
                    p.impact,
                    p.budget_amount,
                    p.featured_image,
                    c.name as category_name
                FROM projects p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE c.name ILIKE '%education%' OR c.name ILIKE '%scholarship%'
                ORDER BY p.project_number ASC
            ";
            
            $programs = $conn->executeQuery($sql)->fetchAllAssociative();
            
            foreach ($programs as &$program) {
                if (!empty($program['featured_image'])) {
                    $program['image_url'] = getPresignedUrl('gov-pineda-images/' . $program['featured_image']);
                } else {
                    $program['image_url'] = null;
                }
                
                // Format budget
                if ($program['budget_amount']) {
                    $billion = $program['budget_amount'] / 1000000000;
                    $program['budget_display'] = '₱' . number_format($billion, 1) . 'B';
                }
            }
            
            return [
                'success' => true,
                'data' => $programs
            ];
            
        } catch (\Exception $e) {
            error_log('Get education programs error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch education programs'];
        }
    }
    
    /**
     * Get program statistics
     */
    private function getProgramStatistics($programId, $programType) 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    stat_label,
                    stat_value,
                    year
                FROM program_statistics
                WHERE program_id = ? AND program_type = ?
                ORDER BY year DESC
            ";
            
            return $conn->executeQuery($sql, [$programId, $programType])->fetchAllAssociative();
            
        } catch (\Exception $e) {
            return [];
        }
    }
    
    /**
     * Get program categories
     */
    public function getProgramCategories() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    pc.id,
                    pc.name,
                    pc.icon_class,
                    pc.color_code,
                    pc.display_order,
                    COUNT(swp.id) as program_count
                FROM program_categories pc
                LEFT JOIN social_welfare_programs swp ON pc.id = swp.category_id AND swp.is_active = true
                GROUP BY pc.id, pc.name, pc.icon_class, pc.color_code, pc.display_order
                ORDER BY pc.display_order ASC
            ";
            
            $categories = $conn->executeQuery($sql)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $categories
            ];
            
        } catch (\Exception $e) {
            error_log('Get program categories error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch program categories'];
        }
    }
}