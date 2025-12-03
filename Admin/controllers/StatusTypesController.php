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

class StatusTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/StatusTypesList[/{id}]", [PermissionMiddleware::class], "list.status_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "StatusTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/StatusTypesAdd[/{id}]", [PermissionMiddleware::class], "add.status_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "StatusTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/StatusTypesView[/{id}]", [PermissionMiddleware::class], "view.status_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "StatusTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/StatusTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.status_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "StatusTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/StatusTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.status_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "StatusTypesDelete");
    }
}
