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

class OwnershipTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/OwnershipTypesList[/{id}]", [PermissionMiddleware::class], "list.ownership_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "OwnershipTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/OwnershipTypesAdd[/{id}]", [PermissionMiddleware::class], "add.ownership_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "OwnershipTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/OwnershipTypesView[/{id}]", [PermissionMiddleware::class], "view.ownership_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "OwnershipTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/OwnershipTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.ownership_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "OwnershipTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/OwnershipTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.ownership_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "OwnershipTypesDelete");
    }
}
