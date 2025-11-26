<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

class EnvironmentService
{
    /**
     * Get environmental programs
     */
    public function getPrograms($programType = null, $status = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = [];
            $params = [];
            
            if ($programType) {
                $whereClauses[] = "program_type = ?";
                $params[] = $programType;
            }
            
            if ($status) {
                $whereClauses[] = "status = ?";
                $params[] = $status;
            }
            
            $whereClause = count($whereClauses) > 0 ? 'WHERE ' . implode(' AND ', $whereClauses) : '';
            
            $sql = "
                SELECT 
                    id,
                    program_name,
                    program_type,
                    description,
                    objectives,
                    coverage_area,
                    implementation_date,
                    status,
                    featured_image
                FROM environmental_programs
                $whereClause
                ORDER BY 
                    CASE status
                        WHEN 'Active' THEN 1
                        WHEN 'Planned' THEN 2
                        WHEN 'Completed' THEN 3
                    END,
                    implementation_date DESC
            ";
            
            $programs = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            foreach ($programs as &$program) {
                if (!empty($program['featured_image'])) {
                    $program['image_url'] = getPresignedUrl('gov-pineda-images/' . $program['featured_image']);
                } else {
                    $program['image_url'] = null;
                }
            }
            
            return [
                'success' => true,
                'data' => $programs
            ];
            
        } catch (\Exception $e) {
            error_log('Get environmental programs error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch environmental programs'];
        }
    }
    
    /**
     * Get disaster management information
     */
    public function getDisasterManagement() 
    {
        try {
            $conn = Conn();
            
            // Get disaster preparedness guides
            $prepSql = "
                SELECT 
                    id,
                    disaster_type,
                    preparedness_guide,
                    emergency_hotlines,
                    evacuation_centers,
                    relief_procedures,
                    featured_image,
                    display_order
                FROM disaster_preparedness
                ORDER BY display_order ASC
            ";
            
            $preparedness = $conn->executeQuery($prepSql)->fetchAllAssociative();
            
            foreach ($preparedness as &$prep) {
                if (!empty($prep['featured_image'])) {
                    $prep['image_url'] = getPresignedUrl('gov-pineda-images/' . $prep['featured_image']);
                } else {
                    $prep['image_url'] = null;
                }
            }
            
            // Get emergency facilities
            $facilitiesSql = "
                SELECT 
                    id,
                    facility_type,
                    name,
                    municipality,
                    address,
                    capacity,
                    contact_number,
                    coordinates
                FROM emergency_facilities
                WHERE is_active = true
                ORDER BY municipality ASC, name ASC
            ";
            
            $facilities = $conn->executeQuery($facilitiesSql)->fetchAllAssociative();
            
            // Get historical incidents (last 5)
            $incidentsSql = "
                SELECT 
                    id,
                    incident_type,
                    incident_name,
                    occurrence_date,
                    affected_areas,
                    casualties,
                    damages_estimated,
                    response_actions
                FROM disaster_incidents
                ORDER BY occurrence_date DESC
                LIMIT 5
            ";
            
            $incidents = $conn->executeQuery($incidentsSql)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => [
                    'preparedness_guides' => $preparedness,
                    'emergency_facilities' => $facilities,
                    'historical_incidents' => $incidents
                ]
            ];
            
        } catch (\Exception $e) {
            error_log('Get disaster management error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch disaster management information'];
        }
    }
    
    /**
     * Get emergency facilities by type
     */
    public function getEmergencyFacilities($facilityType = null, $municipality = null) 
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
                    municipality,
                    address,
                    capacity,
                    contact_number,
                    coordinates
                FROM emergency_facilities
                WHERE $whereClause
                ORDER BY municipality ASC, facility_type ASC, name ASC
            ";
            
            $facilities = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $facilities
            ];
            
        } catch (\Exception $e) {
            error_log('Get emergency facilities error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch emergency facilities'];
        }
    }
    
    /**
     * Get disaster incidents history
     */
    public function getDisasterIncidents($incidentType = null, $year = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = [];
            $params = [];
            
            if ($incidentType) {
                $whereClauses[] = "incident_type = ?";
                $params[] = $incidentType;
            }
            
            if ($year) {
                $whereClauses[] = "EXTRACT(YEAR FROM occurrence_date) = ?";
                $params[] = $year;
            }
            
            $whereClause = count($whereClauses) > 0 ? 'WHERE ' . implode(' AND ', $whereClauses) : '';
            
            $sql = "
                SELECT 
                    id,
                    incident_type,
                    incident_name,
                    occurrence_date,
                    affected_areas,
                    casualties,
                    damages_estimated,
                    response_actions,
                    lessons_learned
                FROM disaster_incidents
                $whereClause
                ORDER BY occurrence_date DESC
            ";
            
            $incidents = $conn->executeQuery($sql, $params)->fetchAllAssociative();
            
            return [
                'success' => true,
                'data' => $incidents
            ];
            
        } catch (\Exception $e) {
            error_log('Get disaster incidents error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Failed to fetch disaster incidents'];
        }
    }
}