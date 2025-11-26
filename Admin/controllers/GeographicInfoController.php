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

class GeographicInfoController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/GeographicInfoList[/{id}]", [PermissionMiddleware::class], "list.geographic_info")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GeographicInfoList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/GeographicInfoAdd[/{id}]", [PermissionMiddleware::class], "add.geographic_info")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GeographicInfoAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/GeographicInfoView[/{id}]", [PermissionMiddleware::class], "view.geographic_info")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GeographicInfoView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/GeographicInfoEdit[/{id}]", [PermissionMiddleware::class], "edit.geographic_info")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GeographicInfoEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/GeographicInfoDelete[/{id}]", [PermissionMiddleware::class], "delete.geographic_info")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "GeographicInfoDelete");
    }
}
