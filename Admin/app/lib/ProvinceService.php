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
                    id,
                    data_type,
                    label,
                    value,
                    year,
                    source,
                    display_order
                FROM demographics_data
                ORDER BY display_order ASC
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
                    id,
                    info_type,
                    name,
                    description,
                    coordinates,
                    area_sqkm,
                    population
                FROM geographic_info
                ORDER BY 
                    CASE info_type
                        WHEN 'municipality' THEN 1
                        WHEN 'landmark' THEN 2
                        WHEN 'boundary' THEN 3
                        ELSE 4
                    END,
                    name ASC
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