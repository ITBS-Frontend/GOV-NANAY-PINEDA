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

class ServiceCategoriesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ServiceCategoriesList[/{id}]", [PermissionMiddleware::class], "list.service_categories")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ServiceCategoriesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ServiceCategoriesAdd[/{id}]", [PermissionMiddleware::class], "add.service_categories")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ServiceCategoriesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ServiceCategoriesView[/{id}]", [PermissionMiddleware::class], "view.service_categories")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ServiceCategoriesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ServiceCategoriesEdit[/{id}]", [PermissionMiddleware::class], "edit.service_categories")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ServiceCategoriesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ServiceCategoriesDelete[/{id}]", [PermissionMiddleware::class], "delete.service_categories")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ServiceCategoriesDelete");
    }
}
