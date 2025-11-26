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

class EmergencyFacilitiesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/EmergencyFacilitiesList[/{id}]", [PermissionMiddleware::class], "list.emergency_facilities")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EmergencyFacilitiesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/EmergencyFacilitiesAdd[/{id}]", [PermissionMiddleware::class], "add.emergency_facilities")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EmergencyFacilitiesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/EmergencyFacilitiesView[/{id}]", [PermissionMiddleware::class], "view.emergency_facilities")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EmergencyFacilitiesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/EmergencyFacilitiesEdit[/{id}]", [PermissionMiddleware::class], "edit.emergency_facilities")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EmergencyFacilitiesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/EmergencyFacilitiesDelete[/{id}]", [PermissionMiddleware::class], "delete.emergency_facilities")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EmergencyFacilitiesDelete");
    }
}
