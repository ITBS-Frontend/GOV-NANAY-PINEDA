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

class ProjectTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProjectTypesList[/{id}]", [PermissionMiddleware::class], "list.project_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProjectTypesAdd[/{id}]", [PermissionMiddleware::class], "add.project_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProjectTypesView[/{id}]", [PermissionMiddleware::class], "view.project_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProjectTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.project_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProjectTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.project_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectTypesDelete");
    }
}
