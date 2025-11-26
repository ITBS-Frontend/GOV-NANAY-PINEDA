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

class GovernmentFacilitiesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/GovernmentFacilitiesList[/{id}]", [PermissionMiddleware::class], "list.government_facilities")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GovernmentFacilitiesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/GovernmentFacilitiesAdd[/{id}]", [PermissionMiddleware::class], "add.government_facilities")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GovernmentFacilitiesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/GovernmentFacilitiesView[/{id}]", [PermissionMiddleware::class], "view.government_facilities")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GovernmentFacilitiesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/GovernmentFacilitiesEdit[/{id}]", [PermissionMiddleware::class], "edit.government_facilities")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GovernmentFacilitiesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/GovernmentFacilitiesDelete[/{id}]", [PermissionMiddleware::class], "delete.government_facilities")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GovernmentFacilitiesDelete");
    }
}
