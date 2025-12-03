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
}