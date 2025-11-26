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

class MunicipalitiesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/MunicipalitiesList[/{id}]", [PermissionMiddleware::class], "list.municipalities")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "MunicipalitiesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/MunicipalitiesAdd[/{id}]", [PermissionMiddleware::class], "add.municipalities")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "MunicipalitiesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/MunicipalitiesView[/{id}]", [PermissionMiddleware::class], "view.municipalities")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "MunicipalitiesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/MunicipalitiesEdit[/{id}]", [PermissionMiddleware::class], "edit.municipalities")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "MunicipalitiesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/MunicipalitiesDelete[/{id}]", [PermissionMiddleware::class], "delete.municipalities")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "MunicipalitiesDelete");
    }
}
