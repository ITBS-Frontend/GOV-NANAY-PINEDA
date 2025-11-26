<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

// Health programs endpoint
$app->get("/programs/health", function ($request, $response, $args) {
    try {
        $status = $request->getQueryParam('status', null);
        
        $service = new ProgramsService();
        $result = $service->getHealthPrograms($status);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Social welfare programs endpoint
$app->get("/programs/social-welfare", function ($request, $response, $args) {
    try {
        $categoryId = $request->getQueryParam('category', null);
        
        $service = new ProgramsService();
        $result = $service->getSocialWelfarePrograms($categoryId);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Education programs endpoint
$app->get("/programs/education", function ($request, $response, $args) {
    try {
        $service = new ProgramsService();
        $result = $service->getEducationPrograms();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Program categories endpoint
$app->get("/programs/categories", function ($request, $response, $args) {
    try {
        $service = new ProgramsService();
        $result = $service->getProgramCategories();
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});