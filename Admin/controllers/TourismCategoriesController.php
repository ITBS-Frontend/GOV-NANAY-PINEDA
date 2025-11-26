<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Delete;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Get;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Map;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Options;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Patch;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Post;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Put;

class TourismCategoriesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/TourismCategoriesList[/{id}]", [PermissionMiddleware::class], "list.tourism_categories")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismCategoriesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/TourismCategoriesAdd[/{id}]", [PermissionMiddleware::class], "add.tourism_categories")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismCategoriesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/TourismCategoriesView[/{id}]", [PermissionMiddleware::class], "view.tourism_categories")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismCategoriesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/TourismCategoriesEdit[/{id}]", [PermissionMiddleware::class], "edit.tourism_categories")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismCategoriesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/TourismCategoriesDelete[/{id}]", [PermissionMiddleware::class], "delete.tourism_categories")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismCategoriesDelete");
    }
}
