<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

// Tourism destinations endpoint
$app->get("/tourism/destinations", function ($request, $response, $args) {
    try {
        $categoryId = $request->getQueryParam('category', null);
        $municipality = $request->getQueryParam('municipality', null);
        $featured = $request->getQueryParam('featured', false);
        
        $service = new TourismService();
        $result = $service->getDestinations($categoryId, $municipality, filter_var($featured, FILTER_VALIDATE_BOOLEAN));
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Single destination details endpoint
$app->get("/tourism/destinations/{id}", function ($request, $response, $args) {
    try {
        $destinationId = $args['id'];
        
        $service = new TourismService();
        $result = $service->getDestinationDetails($destinationId);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Tourism facilities endpoint
$app->get("/tourism/facilities", function ($request, $response, $args) {
    try {
        $facilityType = $request->getQueryParam('type', null);
        $ownership = $request->getQueryParam('ownership', null);
        $municipality = $request->getQueryParam('municipality', null);
        
        $service = new TourismService();
        $result = $service->getFacilities($facilityType, $ownership, $municipality);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Tourism categories endpoint
$app->get("/tourism/categories", function ($request, $response, $args) {
    try {
        $service = new TourismService();
        $result = $service->getCategories();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});