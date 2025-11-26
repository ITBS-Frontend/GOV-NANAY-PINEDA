<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

class GovernmentService
{
    /**
     * Get government officials (reuse existing about content)
     */
    public function getOfficials() 
    {
        try {
            $conn = Conn();
            
            // Get Gov. Pineda info from existing tables
            $aboutSql = "
                SELECT 
                    section_type,
                    title,
                    content,
                    display_order
                FROM about_content
                WHERE is_active = true
                ORDER BY display_order ASC
            ";
            
            $aboutContent = $conn->executeQuery($aboutSql)->fetchAllAssociative();
            
            // Get profile details
            $profileSql = "
                SELECT 
                    detail_key,
                    detail_label,
                    detail_value,
                    icon_class
                FROM profile_details
                WHERE is_active = true
                ORDER BY display_order ASC
            ";
            
            $profileDetails = $conn->executeQuery($profileSql)->fetchAllAssociative();
            
            // Get profile image
            $imageSql = "
                SELECT image_path
                FROM profile_images
                WHERE is_primary = true AND image_type = 'profile'
                LIMIT 1
            ";
            
            $imageResult = $conn->executeQuery($imageSql)->fetchAssociative();
            $imageUrl = null;
            if ($imageResult && !empty($imageResult['image_path'])) {
                $imageUrl = getPresignedUrl('gov-pineda-images/' . $imageResult['image_path']);
            }
            
            return [
                'success' => true,
                'data' => [
                    'governor' => [
                        'name' => 'Gov. Lilia "Nanay" Pineda',
                        'position' => 'Vice Governor of Pampanga',
                        'image_url' => $imageUrl,
                        'profile_details' => $profileDetails,
                        'about_content' => $aboutContent
                    ]
                ]
            ];
            
        } catch (\Exception $e) {
            error_log('Get officials error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch government officials'];
        }
    }
    
    /**
     * Get government facilities
     */
    public function getFacilities($facilityType = null, $municipality = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = ["is_active = true"];
            $params = [];
            
            if ($facilityType) {
                $whereClauses[] = "facility_type = ?";
                $params[] = $facilityType;
            }
            
            if ($municipality) {
                $whereClauses[] = "municipality = ?";
                $params[] = $municipality;
            }
            
            $whereClause = implode(' AND ', $whereClauses);
            
            $sql = "
                SELECT 
                    id,
                    facility_type,
                    name,
                    address,
                    municipality,
                    contact_number,
                    email,
                    operating_hours,
                    services_offered,
                    coordinates,
                    featured_image
                FROM government_facilities
                WHERE $whereClause
                ORDER BY municipality ASC, name ASC
            ";
            
            $facilities = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            foreach ($facilities as &$facility) {
                if (!empty($facility['featured_image'])) {
                    $facility['image_url'] = getPresignedUrl('gov-pineda-images/' . $facility['featured_image']);
                } else {
                    $facility['image_url'] = null;
                }
            }
            
            return [
                'success' => true,
                'data' => $facilities
            ];
            
        } catch (\Exception $e) {
            error_log('Get facilities error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch government facilities'];
        }
    }
    
    /**
     * Get public services
     */
    public function getServices($categoryId = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = ["ps.is_active = true"];
            $params = [];
            
            if ($categoryId) {
                $whereClauses[] = "ps.category_id = ?";
                $params[] = $categoryId;
            }
            
            $whereClause = implode(' AND ', $whereClauses);
            
            $sql = "
                SELECT 
                    ps.id,
                    ps.service_name,
                    ps.description,
                    ps.requirements,
                    ps.process_steps,
                    ps.processing_time,
                    ps.fees,
                    ps.contact_info,
                    ps.online_link,
                    ps.display_order,
                    sc.name as category_name,
                    sc.icon_class,
                    sc.color_code
                FROM public_services ps
                LEFT JOIN service_categories sc ON ps.category_id = sc.id
                WHERE $whereClause
                ORDER BY ps.display_order ASC, ps.service_name ASC
            ";
            
            $services = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $services
            ];
            
        } catch (\Exception $e) {
            error_log('Get services error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch public services'];
        }
    }
    
    /**
     * Get service categories
     */
    public function getServiceCategories() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    sc.id,
                    sc.name,
                    sc.icon_class,
                    sc.color_code,
                    sc.display_order,
                    COUNT(ps.id) as service_count
                FROM service_categories sc
                LEFT JOIN public_services ps ON sc.id = ps.category_id AND ps.is_active = true
                GROUP BY sc.id, sc.name, sc.icon_class, sc.color_code, sc.display_order
                ORDER BY sc.display_order ASC
            ";
            
            $categories = $conn->executeQuery($sql)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $categories
            ];
            
        } catch (\Exception $e) {
            error_log('Get service categories error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch service categories'];
        }
    }
}