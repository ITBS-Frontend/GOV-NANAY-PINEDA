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

class CategoriesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/CategoriesList[/{id}]", [PermissionMiddleware::class], "list.categories")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CategoriesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/CategoriesAdd[/{id}]", [PermissionMiddleware::class], "add.categories")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CategoriesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/CategoriesView[/{id}]", [PermissionMiddleware::class], "view.categories")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CategoriesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/CategoriesEdit[/{id}]", [PermissionMiddleware::class], "edit.categories")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CategoriesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/CategoriesDelete[/{id}]", [PermissionMiddleware::class], "delete.categories")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CategoriesDelete");
    }
}
