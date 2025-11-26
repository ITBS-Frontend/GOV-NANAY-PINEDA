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

class ProvinceHistoryController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProvinceHistoryList[/{id}]", [PermissionMiddleware::class], "list.province_history")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProvinceHistoryList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProvinceHistoryAdd[/{id}]", [PermissionMiddleware::class], "add.province_history")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProvinceHistoryAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProvinceHistoryView[/{id}]", [PermissionMiddleware::class], "view.province_history")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProvinceHistoryView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProvinceHistoryEdit[/{id}]", [PermissionMiddleware::class], "edit.province_history")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProvinceHistoryEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProvinceHistoryDelete[/{id}]", [PermissionMiddleware::class], "delete.province_history")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProvinceHistoryDelete");
    }
}
