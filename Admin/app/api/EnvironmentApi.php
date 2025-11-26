<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

// Environmental programs endpoint
$app->get("/environment/programs", function ($request, $response, $args) {
    try {
        $programType = $request->getQueryParam('type', null);
        $status = $request->getQueryParam('status', null);
        
        $service = new EnvironmentService();
        $result = $service->getPrograms($programType, $status);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Disaster management comprehensive endpoint
$app->get("/environment/disaster-management", function ($request, $response, $args) {
    try {
        $service = new EnvironmentService();
        $result = $service->getDisasterManagement();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Emergency facilities endpoint
$app->get("/environment/emergency-facilities", function ($request, $response, $args) {
    try {
        $facilityType = $request->getQueryParam('type', null);
        $municipality = $request->getQueryParam('municipality', null);
        
        $service = new EnvironmentService();
        $result = $service->getEmergencyFacilities($facilityType, $municipality);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Disaster incidents history endpoint
$app->get("/environment/disaster-incidents", function ($request, $response, $args) {
    try {
        $incidentType = $request->getQueryParam('type', null);
        $year = $request->getQueryParam('year', null);
        
        $service = new EnvironmentService();
        $result = $service->getDisasterIncidents($incidentType, $year);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});