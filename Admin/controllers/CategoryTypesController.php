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

class CategoryTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/CategoryTypesList[/{id}]", [PermissionMiddleware::class], "list.category_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CategoryTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/CategoryTypesAdd[/{id}]", [PermissionMiddleware::class], "add.category_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CategoryTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/CategoryTypesView[/{id}]", [PermissionMiddleware::class], "view.category_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CategoryTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/CategoryTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.category_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CategoryTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/CategoryTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.category_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CategoryTypesDelete");
    }
}
