<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

// Featured news endpoint
$app->get("/news/featured", function ($request, $response, $args) {
    try {
        $limit = $request->getQueryParam('limit', 3);
        
        $service = new NewsService();
        $result = $service->getFeaturedNews($limit);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// All news posts endpoint with filters
$app->get("/news", function ($request, $response, $args) {
    try {
        $categoryId = $request->getQueryParam('category', null);
        $tagId = $request->getQueryParam('tag', null);
        $page = (int)$request->getQueryParam('page', 1);
        $perPage = (int)$request->getQueryParam('per_page', 9);
        $search = $request->getQueryParam('search', null);
        $sortBy = $request->getQueryParam('sort', 'date');
        
        $service = new NewsService();
        $result = $service->getNewsPosts($categoryId, $tagId, $page, $perPage, $search, $sortBy);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// Single news post endpoint
$app->get("/news/{slug}", function ($request, $response, $args) {
    try {
        $slug = $args['slug'];
        
        $service = new NewsService();
        $result = $service->getNewsPost($slug);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});

// News categories endpoint
$app->get("/news/categories/list", function ($request, $response, $args) {
    try {
        $service = new NewsService();
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

// Related posts endpoint
$app->get("/news/{id}/related", function ($request, $response, $args) {
    try {
        $postId = $args['id'];
        $categoryId = $request->getQueryParam('category', null);
        $limit = (int)$request->getQueryParam('limit', 3);
        
        if (!$categoryId) {
            throw new \Exception('Category ID required');
        }
        
        $service = new NewsService();
        $result = $service->getRelatedPosts($categoryId, $postId, $limit);
        
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->write(json_encode($result, JSON_PRETTY_PRINT));
    } catch (\Exception $e) {
        $errorResponse = ['success' => false, 'message' => $e->getMessage()];
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->withStatus(500);
        return $response->write(json_encode($errorResponse, JSON_PRETTY_PRINT));
    }
});