<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

class ProvinceService
{
    /**
     * Get province history
     */
    public function getHistory() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    id,
                    title,
                    period,
                    content,
                    timeline_year,
                    featured_image,
                    display_order
                FROM province_history
                WHERE is_active = true
                ORDER BY display_order ASC, timeline_year ASC
            ";
            
            $history = $conn->executeQuery($sql)->fetchAllAssociative();
            
            foreach ($history as &$item) {
                if (!empty($item['featured_image'])) {
                    $item['image_url'] = getPresignedUrl('gov-pineda-images/' . $item['featured_image']);
                } else {
                    $item['image_url'] = null;
                }
            }
            
            return [
                'success' => true,
                'data' => $history
            ];
            
        } catch (\Exception $e) {
            error_log('Get province history error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch province history'];
        }
    }
    
    /**
     * Get demographics data
     */
    public function getDemographics() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    dd.id,
                    dt.type_name as data_type,
                    dd.label,
                    dd.value,
                    dd.year,
                    dd.source,
                    dd.display_order
                FROM demographics_data dd
                LEFT JOIN demographics_types dt ON dd.data_type_id = dt.id
                ORDER BY dd.display_order ASC
            ";
            
            $demographics = $conn->executeQuery($sql)->fetchAllAssociative();
            
            // Group by data type
            $grouped = [];
            foreach ($demographics as $item) {
                $type = $item['data_type'];
                if (!isset($grouped[$type])) {
                    $grouped[$type] = [];
                }
                $grouped[$type][] = $item;
            }
            
            return [
                'success' => true,
                'data' => $demographics,
                'grouped' => $grouped
            ];
            
        } catch (\Exception $e) {
            error_log('Get demographics error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch demographics data'];
        }
    }
    
    /**
     * Get geographic information
     */
    public function getGeography() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    gi.id,
                    git.type_name as info_type,
                    gi.name,
                    gi.description,
                    gi.coordinates,
                    gi.area_sqkm,
                    gi.population
                FROM geographic_info gi
                LEFT JOIN geographic_info_types git ON gi.info_type_id = git.id
                ORDER BY 
                    git.display_order ASC,
                    gi.name ASC
            ";
            
            $geography = $conn->executeQuery($sql)->fetchAllAssociative();
            
            // Group by info type
            $grouped = [];
            foreach ($geography as $item) {
                $type = $item['info_type'];
                if (!isset($grouped[$type])) {
                    $grouped[$type] = [];
                }
                $grouped[$type][] = $item;
            }
            
            return [
                'success' => true,
                'data' => $geography,
                'grouped' => $grouped
            ];
            
        } catch (\Exception $e) {
            error_log('Get geography error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch geographic information'];
        }
    }
    
    /**
     * Get municipalities list
     */
    public function getMunicipalities() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    id,
                    name,
                    population,
                    area_sqkm,
                    coordinates,
                    mayor_name,
                    contact_number,
                    email,
                    display_order
                FROM municipalities
                ORDER BY display_order ASC, name ASC
            ";
            
            $municipalities = $conn->executeQuery($sql)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $municipalities
            ];
            
        } catch (\Exception $e) {
            error_log('Get municipalities error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch municipalities'];
        }
    }

/**
 * Get Pampanga preview for homepage
 */
public function getPreview() 
{
    try {
        $conn = Conn();
        
        $sql = "
            SELECT 
                preview_text,
                main_image,
                showcase_image_1,
                showcase_image_2
            FROM pampanga_about
            ORDER BY updated_at DESC
            LIMIT 1
        ";
        
        $about = $conn->executeQuery($sql)->fetchAssociative();
        
        if ($about) {
            $data = [
                'content' => $about['preview_text'],
                'main_image' => !empty($about['main_image']) ? 
                    getPresignedUrl('gov-pineda-images/' . $about['main_image']) : null,
                'showcase_image_1' => !empty($about['showcase_image_1']) ? 
                    getPresignedUrl('gov-pineda-images/' . $about['showcase_image_1']) : null,
                'showcase_image_2' => !empty($about['showcase_image_2']) ? 
                    getPresignedUrl('gov-pineda-images/' . $about['showcase_image_2']) : null
            ];
        } else {
            $data = [
                'content' => 'Pampanga, the Culinary Capital of the Philippines...',
                'main_image' => null,
                'showcase_image_1' => null,
                'showcase_image_2' => null
            ];
        }
        
        return ['success' => true, 'data' => $data];
        
    } catch (\Exception $e) {
        error_log('Get preview error: ' . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to fetch preview'];
    }
}

/**
 * Get quick facts for homepage
 */
public function getQuickFacts() 
{
    try {
        $conn = Conn();
        
        $sql = "
            SELECT 
                icon,
                title,
                description
            FROM quick_facts
            WHERE is_active = true
            ORDER BY display_order ASC
        ";
        
        $facts = $conn->executeQuery($sql)->fetchAllAssociative();
        
        return [
            'success' => true,
            'data' => array_map(function($fact) {
                return [
                    'icon' => $fact['icon'],
                    'title' => $fact['title'],
                    'description' => $fact['description']
                ];
            }, $facts)
        ];
        
    } catch (\Exception $e) {
        error_log('Get quick facts error: ' . $e->getMessage());
        return [
            'success' => true,
            'data' => [
                ['icon' => 'fas fa-map', 'title' => '19', 'description' => 'Municipalities'],
                ['icon' => 'fas fa-users', 'title' => '2.6M+', 'description' => 'Population'],
                ['icon' => 'fas fa-expand', 'title' => '2,181 km²', 'description' => 'Area']
            ]
        ];
    }
}


}