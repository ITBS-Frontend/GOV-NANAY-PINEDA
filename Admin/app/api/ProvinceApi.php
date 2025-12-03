<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

// Province history endpoint
$app->get("/province/history", function ($request, $response, $args) {
    try {
        $service = new ProvinceService();
        $result = $service->getHistory();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Demographics data endpoint
$app->get("/province/demographics", function ($request, $response, $args) {
    try {
        $service = new ProvinceService();
        $result = $service->getDemographics();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Geographic information endpoint
$app->get("/province/geography", function ($request, $response, $args) {
    try {
        $service = new ProvinceService();
        $result = $service->getGeography();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Municipalities list endpoint
$app->get("/province/municipalities", function ($request, $response, $args) {
    try {
        $service = new ProvinceService();
        $result = $service->getMunicipalities();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Province preview endpoint (for homepage)
$app->get("/province/preview", function ($request, $response, $args) {
    try {
        $service = new ProvinceService();
        $result = $service->getPreview();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Quick facts endpoint (for homepage)
$app->get("/province/quick-facts", function ($request, $response, $args) {
    try {
        $service = new ProvinceService();
        $result = $service->getQuickFacts();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});