<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

// Government officials endpoint
$app->get("/government/officials", function ($request, $response, $args) {
    try {
        $service = new GovernmentService();
        $result = $service->getOfficials();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Government facilities endpoint
$app->get("/government/facilities", function ($request, $response, $args) {
    try {
        $facilityType = $request->getQueryParam('type', null);
        $municipality = $request->getQueryParam('municipality', null);
        
        $service = new GovernmentService();
        $result = $service->getFacilities($facilityType, $municipality);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Public services endpoint
$app->get("/government/services", function ($request, $response, $args) {
    try {
        $categoryId = $request->getQueryParam('category', null);
        
        $service = new GovernmentService();
        $result = $service->getServices($categoryId);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Service categories endpoint
$app->get("/government/service-categories", function ($request, $response, $args) {
    try {
        $service = new GovernmentService();
        $result = $service->getServiceCategories();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Facility types endpoint
$app->get("/government/facility-types", function ($request, $response, $args) {
    try {
        $service = new GovernmentService();
        $result = $service->getFacilityTypes();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});