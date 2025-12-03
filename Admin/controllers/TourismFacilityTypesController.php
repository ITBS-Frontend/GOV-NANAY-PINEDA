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

class TourismFacilityTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/TourismFacilityTypesList[/{id}]", [PermissionMiddleware::class], "list.tourism_facility_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismFacilityTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/TourismFacilityTypesAdd[/{id}]", [PermissionMiddleware::class], "add.tourism_facility_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismFacilityTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/TourismFacilityTypesView[/{id}]", [PermissionMiddleware::class], "view.tourism_facility_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismFacilityTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/TourismFacilityTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.tourism_facility_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismFacilityTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/TourismFacilityTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.tourism_facility_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismFacilityTypesDelete");
    }
}
