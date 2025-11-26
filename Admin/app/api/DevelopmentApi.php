<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

// Infrastructure projects endpoint
$app->get("/development/infrastructure", function ($request, $response, $args) {
    try {
        $municipality = $request->getQueryParam('municipality', null);
        
        $service = new DevelopmentService();
        $result = $service->getInfrastructureProjects($municipality);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Economic indicators endpoint
$app->get("/development/economic-indicators", function ($request, $response, $args) {
    try {
        $year = $request->getQueryParam('year', null);
        
        $service = new DevelopmentService();
        $result = $service->getEconomicIndicators($year);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Business sectors endpoint
$app->get("/development/business-sectors", function ($request, $response, $args) {
    try {
        $service = new DevelopmentService();
        $result = $service->getBusinessSectors();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Investment opportunities endpoint
$app->get("/development/investments", function ($request, $response, $args) {
    try {
        $sector = $request->getQueryParam('sector', null);
        
        $service = new DevelopmentService();
        $result = $service->getInvestmentOpportunities($sector);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});