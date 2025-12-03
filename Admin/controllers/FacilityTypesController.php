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

class FacilityTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/FacilityTypesList[/{id}]", [PermissionMiddleware::class], "list.facility_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "FacilityTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/FacilityTypesAdd[/{id}]", [PermissionMiddleware::class], "add.facility_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "FacilityTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/FacilityTypesView[/{id}]", [PermissionMiddleware::class], "view.facility_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "FacilityTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/FacilityTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.facility_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "FacilityTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/FacilityTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.facility_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "FacilityTypesDelete");
    }
}
