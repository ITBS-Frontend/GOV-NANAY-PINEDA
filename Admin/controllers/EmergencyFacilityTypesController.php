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

class EmergencyFacilityTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/EmergencyFacilityTypesList[/{id}]", [PermissionMiddleware::class], "list.emergency_facility_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EmergencyFacilityTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/EmergencyFacilityTypesAdd[/{id}]", [PermissionMiddleware::class], "add.emergency_facility_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EmergencyFacilityTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/EmergencyFacilityTypesView[/{id}]", [PermissionMiddleware::class], "view.emergency_facility_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EmergencyFacilityTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/EmergencyFacilityTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.emergency_facility_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EmergencyFacilityTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/EmergencyFacilityTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.emergency_facility_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EmergencyFacilityTypesDelete");
    }
}
