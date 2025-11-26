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

class EnvironmentalProgramsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/EnvironmentalProgramsList[/{id}]", [PermissionMiddleware::class], "list.environmental_programs")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EnvironmentalProgramsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/EnvironmentalProgramsAdd[/{id}]", [PermissionMiddleware::class], "add.environmental_programs")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EnvironmentalProgramsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/EnvironmentalProgramsView[/{id}]", [PermissionMiddleware::class], "view.environmental_programs")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EnvironmentalProgramsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/EnvironmentalProgramsEdit[/{id}]", [PermissionMiddleware::class], "edit.environmental_programs")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EnvironmentalProgramsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/EnvironmentalProgramsDelete[/{id}]", [PermissionMiddleware::class], "delete.environmental_programs")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EnvironmentalProgramsDelete");
    }
}
