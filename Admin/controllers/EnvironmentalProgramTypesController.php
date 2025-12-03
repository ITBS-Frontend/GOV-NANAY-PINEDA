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

class EnvironmentalProgramTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/EnvironmentalProgramTypesList[/{id}]", [PermissionMiddleware::class], "list.environmental_program_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EnvironmentalProgramTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/EnvironmentalProgramTypesAdd[/{id}]", [PermissionMiddleware::class], "add.environmental_program_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EnvironmentalProgramTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/EnvironmentalProgramTypesView[/{id}]", [PermissionMiddleware::class], "view.environmental_program_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EnvironmentalProgramTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/EnvironmentalProgramTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.environmental_program_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EnvironmentalProgramTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/EnvironmentalProgramTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.environmental_program_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EnvironmentalProgramTypesDelete");
    }
}
