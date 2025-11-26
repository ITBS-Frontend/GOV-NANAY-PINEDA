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

class HealthProgramsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/HealthProgramsList[/{id}]", [PermissionMiddleware::class], "list.health_programs")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "HealthProgramsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/HealthProgramsAdd[/{id}]", [PermissionMiddleware::class], "add.health_programs")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "HealthProgramsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/HealthProgramsView[/{id}]", [PermissionMiddleware::class], "view.health_programs")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "HealthProgramsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/HealthProgramsEdit[/{id}]", [PermissionMiddleware::class], "edit.health_programs")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "HealthProgramsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/HealthProgramsDelete[/{id}]", [PermissionMiddleware::class], "delete.health_programs")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "HealthProgramsDelete");
    }
}
