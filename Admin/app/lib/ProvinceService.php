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
        
        // Get province preview content
        $sql = "
            SELECT 
                id,
                title,
                content,
                featured_image
            FROM province_history
            WHERE is_active = true
            AND title = 'Province Overview'
            LIMIT 1
        ";
        
        $preview = $conn->executeQuery($sql)->fetchAssociative();
        
        if ($preview) {
            // Truncate content for homepage
            $preview['content'] = substr(strip_tags($preview['content']), 0, 300) . '...';
            
            if (!empty($preview['featured_image'])) {
                $preview['image_url'] = getPresignedUrl('gov-pineda-images/' . $preview['featured_image']);
            }
            
            // Get 2 additional showcase images from province_history
            $showcaseSql = "
                SELECT featured_image
                FROM province_history
                WHERE is_active = true
                AND featured_image IS NOT NULL
                AND id != ?
                ORDER BY display_order ASC
                LIMIT 2
            ";
            
            $showcaseImages = $conn->executeQuery($showcaseSql, [$preview['id']])->fetchAllAssociative();
            
            $preview['showcase_images'] = array_map(function($img) {
                return getPresignedUrl('gov-pineda-images/' . $img['featured_image']);
            }, $showcaseImages);
        }
        
        return [
            'success' => true,
            'data' => $preview ?: [
                'content' => 'Pampanga, the Culinary Capital of the Philippines...',
                'image_url' => null,
                'showcase_images' => []
            ]
        ];
        
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
        
        // Get key statistics
        $facts = [];
        
        // Municipalities count
        $munSql = "SELECT COUNT(*) as count FROM geographic_info WHERE info_type = 'municipality'";
        $munCount = $conn->executeQuery($munSql)->fetchOne();
        $facts[] = [
            'label' => 'Municipalities',
            'value' => $munCount,
            'icon' => 'fas fa-map'
        ];
        
        // Population
        $popSql = "SELECT value FROM demographics_data WHERE label = 'Total Population' LIMIT 1";
        $population = $conn->executeQuery($popSql)->fetchOne();
        $facts[] = [
            'label' => 'Population',
            'value' => $population ?: '2.6M+',
            'icon' => 'fas fa-users'
        ];
        
        // Total area
        $areaSql = "SELECT SUM(area_sqkm) as total FROM geographic_info WHERE info_type = 'municipality'";
        $totalArea = $conn->executeQuery($areaSql)->fetchOne();
        $facts[] = [
            'label' => 'Area',
            'value' => number_format($totalArea, 0) . ' km²',
            'icon' => 'fas fa-expand'
        ];
        
        return [
            'success' => true,
            'data' => $facts
        ];
        
    } catch (\Exception $e) {
        error_log('Get quick facts error: ' . $e->getMessage());
        return [
            'success' => true,
            'data' => [
                ['label' => 'Municipalities', 'value' => '19', 'icon' => 'fas fa-map'],
                ['label' => 'Population', 'value' => '2.6M+', 'icon' => 'fas fa-users'],
                ['label' => 'Area', 'value' => '2,181 km²', 'icon' => 'fas fa-expand']
            ]
        ];
    }
}


}