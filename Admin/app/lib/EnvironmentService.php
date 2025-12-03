<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

class EnvironmentService
{
    /**
     * Get environmental programs
     */
    public function getPrograms($programTypeId = null, $statusId = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = [];
            $params = [];
            
            if ($programTypeId) {
                $whereClauses[] = "ep.program_type_id = ?";
                $params[] = $programTypeId;
            }
            
            if ($statusId) {
                $whereClauses[] = "ep.status_id = ?";
                $params[] = $statusId;
            }
            
            $whereClause = count($whereClauses) > 0 ? 'WHERE ' . implode(' AND ', $whereClauses) : '';
            
            $sql = "
                SELECT 
                    ep.id,
                    ep.program_name,
                    ept.type_name as program_type,
                    st.type_name as status,
                    st.color_code as status_color,
                    ep.description,
                    ep.objectives,
                    ep.coverage_area,
                    ep.implementation_date,
                    ep.featured_image
                FROM environmental_programs ep
                LEFT JOIN environmental_program_types ept ON ep.program_type_id = ept.id
                LEFT JOIN status_types st ON ep.status_id = st.id
                $whereClause
                ORDER BY 
                    st.display_order ASC,
                    ep.implementation_date DESC
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
                    dp.id,
                    dt.type_name as disaster_type,
                    dt.icon_class,
                    dp.preparedness_guide,
                    dp.emergency_hotlines,
                    dp.evacuation_centers,
                    dp.relief_procedures,
                    dp.featured_image,
                    dp.display_order
                FROM disaster_preparedness dp
                LEFT JOIN disaster_types dt ON dp.disaster_type_id = dt.id
                ORDER BY dp.display_order ASC
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
                    ef.id,
                    eft.type_name as facility_type,
                    eft.icon_class,
                    ef.name,
                    ef.municipality,
                    ef.address,
                    ef.capacity,
                    ef.contact_number,
                    ef.coordinates
                FROM emergency_facilities ef
                LEFT JOIN emergency_facility_types eft ON ef.facility_type_id = eft.id
                WHERE ef.is_active = true
                ORDER BY ef.municipality ASC, eft.display_order ASC, ef.name ASC
            ";
            
            $facilities = $conn->executeQuery($facilitiesSql)->fetchAllAssociative();
            
            // Get historical incidents (last 5)
            $incidentsSql = "
                SELECT 
                    di.id,
                    dt.type_name as incident_type,
                    di.incident_name,
                    di.occurrence_date,
                    di.affected_areas,
                    di.casualties,
                    di.damages_estimated,
                    di.response_actions
                FROM disaster_incidents di
                LEFT JOIN disaster_types dt ON di.incident_type_id = dt.id
                ORDER BY di.occurrence_date DESC
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
    public function getEmergencyFacilities($facilityTypeId = null, $municipality = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = ["ef.is_active = true"];
            $params = [];
            
            if ($facilityTypeId) {
                $whereClauses[] = "ef.facility_type_id = ?";
                $params[] = $facilityTypeId;
            }
            
            if ($municipality) {
                $whereClauses[] = "ef.municipality = ?";
                $params[] = $municipality;
            }
            
            $whereClause = implode(' AND ', $whereClauses);
            
            $sql = "
                SELECT 
                    ef.id,
                    eft.type_name as facility_type,
                    eft.icon_class,
                    ef.name,
                    ef.municipality,
                    ef.address,
                    ef.capacity,
                    ef.contact_number,
                    ef.coordinates
                FROM emergency_facilities ef
                LEFT JOIN emergency_facility_types eft ON ef.facility_type_id = eft.id
                WHERE $whereClause
                ORDER BY ef.municipality ASC, eft.display_order ASC, ef.name ASC
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
    public function getDisasterIncidents($incidentTypeId = null, $year = null) 
    {
        try {
            $conn = Conn();
            
            $whereClauses = [];
            $params = [];
            
            if ($incidentTypeId) {
                $whereClauses[] = "di.incident_type_id = ?";
                $params[] = $incidentTypeId;
            }
            
            if ($year) {
                $whereClauses[] = "EXTRACT(YEAR FROM di.occurrence_date) = ?";
                $params[] = $year;
            }
            
            $whereClause = count($whereClauses) > 0 ? 'WHERE ' . implode(' AND ', $whereClauses) : '';
            
            $sql = "
                SELECT 
                    di.id,
                    dt.type_name as incident_type,
                    di.incident_name,
                    di.occurrence_date,
                    di.affected_areas,
                    di.casualties,
                    di.damages_estimated,
                    di.response_actions,
                    di.lessons_learned
                FROM disaster_incidents di
                LEFT JOIN disaster_types dt ON di.incident_type_id = dt.id
                $whereClause
                ORDER BY di.occurrence_date DESC
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