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

class DisasterTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/DisasterTypesList[/{id}]", [PermissionMiddleware::class], "list.disaster_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/DisasterTypesAdd[/{id}]", [PermissionMiddleware::class], "add.disaster_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/DisasterTypesView[/{id}]", [PermissionMiddleware::class], "view.disaster_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/DisasterTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.disaster_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/DisasterTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.disaster_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterTypesDelete");
    }
}
