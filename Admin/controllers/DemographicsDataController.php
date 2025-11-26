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

class DemographicsDataController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/DemographicsDataList[/{id}]", [PermissionMiddleware::class], "list.demographics_data")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DemographicsDataList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/DemographicsDataAdd[/{id}]", [PermissionMiddleware::class], "add.demographics_data")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DemographicsDataAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/DemographicsDataView[/{id}]", [PermissionMiddleware::class], "view.demographics_data")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DemographicsDataView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/DemographicsDataEdit[/{id}]", [PermissionMiddleware::class], "edit.demographics_data")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DemographicsDataEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/DemographicsDataDelete[/{id}]", [PermissionMiddleware::class], "delete.demographics_data")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DemographicsDataDelete");
    }
}
