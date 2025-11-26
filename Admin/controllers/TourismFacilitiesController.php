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

class TourismFacilitiesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/TourismFacilitiesList[/{id}]", [PermissionMiddleware::class], "list.tourism_facilities")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismFacilitiesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/TourismFacilitiesAdd[/{id}]", [PermissionMiddleware::class], "add.tourism_facilities")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismFacilitiesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/TourismFacilitiesView[/{id}]", [PermissionMiddleware::class], "view.tourism_facilities")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismFacilitiesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/TourismFacilitiesEdit[/{id}]", [PermissionMiddleware::class], "edit.tourism_facilities")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismFacilitiesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/TourismFacilitiesDelete[/{id}]", [PermissionMiddleware::class], "delete.tourism_facilities")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismFacilitiesDelete");
    }
}
