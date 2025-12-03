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

class DemographicsTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/DemographicsTypesList[/{id}]", [PermissionMiddleware::class], "list.demographics_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DemographicsTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/DemographicsTypesAdd[/{id}]", [PermissionMiddleware::class], "add.demographics_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DemographicsTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/DemographicsTypesView[/{id}]", [PermissionMiddleware::class], "view.demographics_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DemographicsTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/DemographicsTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.demographics_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DemographicsTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/DemographicsTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.demographics_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DemographicsTypesDelete");
    }
}
