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

class GeographicInfoTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/GeographicInfoTypesList[/{id}]", [PermissionMiddleware::class], "list.geographic_info_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GeographicInfoTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/GeographicInfoTypesAdd[/{id}]", [PermissionMiddleware::class], "add.geographic_info_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GeographicInfoTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/GeographicInfoTypesView[/{id}]", [PermissionMiddleware::class], "view.geographic_info_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GeographicInfoTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/GeographicInfoTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.geographic_info_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GeographicInfoTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/GeographicInfoTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.geographic_info_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GeographicInfoTypesDelete");
    }
}
