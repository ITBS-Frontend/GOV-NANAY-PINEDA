<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

class TourismService
{
    /**
     * Get tourism destinations
     */
    public function getDestinations($categoryId = null, $municipality = null, $featured = false) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = ["td.is_active = true"];
            $params = [];
            
            if ($categoryId) {
                $whereClauses[] = "td.category_id = ?";
                $params[] = $categoryId;
            }
            
            if ($municipality) {
                $whereClauses[] = "td.municipality = ?";
                $params[] = $municipality;
            }
            
            if ($featured) {
                $whereClauses[] = "td.is_featured = true";
            }
            
            $whereClause = implode(' AND ', $whereClauses);
            
            $sql = "
                SELECT 
                    td.id,
                    td.name,
                    td.description,
                    td.municipality,
                    td.address,
                    td.coordinates,
                    td.entry_fee,
                    td.operating_hours,
                    td.best_time_to_visit,
                    td.featured_image,
                    td.is_featured,
                    tc.name as category_name,
                    tc.color_code
                FROM tourism_destinations td
                LEFT JOIN tourism_categories tc ON td.category_id = tc.id
                WHERE $whereClause
                ORDER BY td.is_featured DESC, td.name ASC
            ";
            
            $destinations = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            foreach ($destinations as &$destination) {
                if (!empty($destination['featured_image'])) {
                    $destination['image_url'] = getPresignedUrl('gov-pineda-images/' . $destination['featured_image']);
                } else {
                    $destination['image_url'] = null;
                }
                
                // Get activities for this destination
                $destination['activities'] = $this->getDestinationActivities($destination['id']);
            }
            
            return [
                'success' => true,
                'data' => $destinations
            ];
            
        } catch (\Exception $e) {
            error_log('Get destinations error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch tourism destinations'];
        }
    }
    
    /**
     * Get single destination details
     */
    public function getDestinationDetails($destinationId) 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    td.id,
                    td.name,
                    td.description,
                    td.full_description,
                    td.municipality,
                    td.address,
                    td.coordinates,
                    td.entry_fee,
                    td.operating_hours,
                    td.best_time_to_visit,
                    td.how_to_get_there,
                    td.featured_image,
                    tc.name as category_name,
                    tc.color_code
                FROM tourism_destinations td
                LEFT JOIN tourism_categories tc ON td.category_id = tc.id
                WHERE td.id = ? AND td.is_active = true
            ";
            
            $destination = $conn->executeQuery($sql, [$destinationId])->fetchAssociative();
            
            if (!$destination) {
                return ['success' => false, 'message' => 'Destination not found'];
            }
            
            // Get image
            if (!empty($destination['featured_image'])) {
                $destination['image_url'] = getPresignedUrl('gov-pineda-images/' . $destination['featured_image']);
            } else {
                $destination['image_url'] = null;
            }
            
            // Get gallery
            $destination['gallery'] = $this->getDestinationGallery($destinationId);
            
            // Get activities
            $destination['activities'] = $this->getDestinationActivities($destinationId);
            
            return [
                'success' => true,
                'data' => $destination
            ];
            
        } catch (\Exception $e) {
            error_log('Get destination details error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch destination details'];
        }
    }
    
    /**
     * Get destination gallery
     */
    private function getDestinationGallery($destinationId) 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    image_path,
                    caption,
                    display_order
                FROM destination_gallery
                WHERE destination_id = ?
                ORDER BY display_order ASC
            ";
            
            $gallery = $conn->executeQuery($sql, [$destinationId])->fetchAllAssociative();
            
            return array_map(function($img) {
                return [
                    'url' => getPresignedUrl('gov-pineda-images/' . $img['image_path']),
                    'caption' => $img['caption']
                ];
            }, $gallery);
            
        } catch (\Exception $e) {
            return [];
        }
    }
    
    /**
     * Get destination activities
     */
    private function getDestinationActivities($destinationId) 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    activity_name,
                    description,
                    duration,
                    difficulty_level
                FROM tourism_activities
                WHERE destination_id = ?
                ORDER BY display_order ASC
            ";
            
            return $conn->executeQuery($sql, [$destinationId])->fetchAllAssociative();
            
        } catch (\Exception $e) {
            return [];
        }
    }
    
    /**
     * Get tourism facilities
     */
    public function getFacilities($facilityType = null, $ownership = null, $municipality = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = ["is_active = true"];
            $params = [];
            
            if ($facilityType) {
                $whereClauses[] = "facility_type = ?";
                $params[] = $facilityType;
            }
            
            if ($ownership) {
                $whereClauses[] = "ownership = ?";
                $params[] = $ownership;
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
                    ownership,
                    name,
                    description,
                    municipality,
                    address,
                    contact_number,
                    email,
                    website,
                    price_range,
                    amenities,
                    coordinates,
                    featured_image,
                    rating,
                    is_verified
                FROM tourism_facilities
                WHERE $whereClause
                ORDER BY is_verified DESC, rating DESC, name ASC
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
            error_log('Get tourism facilities error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch tourism facilities'];
        }
    }
    
    /**
     * Get tourism categories
     */
    public function getCategories() 
    {
        try {
            $conn = Conn();
            
            $sql = "
                SELECT 
                    tc.id,
                    tc.name,
                    tc.icon_class,
                    tc.color_code,
                    tc.display_order,
                    COUNT(td.id) as destination_count
                FROM tourism_categories tc
                LEFT JOIN tourism_destinations td ON tc.id = td.category_id AND td.is_active = true
                GROUP BY tc.id, tc.name, tc.icon_class, tc.color_code, tc.display_order
                ORDER BY tc.display_order ASC
            ";
            
            $categories = $conn->executeQuery($sql)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $categories
            ];
            
        } catch (\Exception $e) {
            error_log('Get tourism categories error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch tourism categories'];
        }
    }
}