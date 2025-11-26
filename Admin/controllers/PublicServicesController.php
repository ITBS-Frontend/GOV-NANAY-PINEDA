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

class PublicServicesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/PublicServicesList[/{id}]", [PermissionMiddleware::class], "list.public_services")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PublicServicesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/PublicServicesAdd[/{id}]", [PermissionMiddleware::class], "add.public_services")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PublicServicesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/PublicServicesView[/{id}]", [PermissionMiddleware::class], "view.public_services")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PublicServicesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/PublicServicesEdit[/{id}]", [PermissionMiddleware::class], "edit.public_services")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PublicServicesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/PublicServicesDelete[/{id}]", [PermissionMiddleware::class], "delete.public_services")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PublicServicesDelete");
    }
}
