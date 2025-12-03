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

class ProgramTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProgramTypesList[/{id}]", [PermissionMiddleware::class], "list.program_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProgramTypesAdd[/{id}]", [PermissionMiddleware::class], "add.program_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProgramTypesView[/{id}]", [PermissionMiddleware::class], "view.program_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProgramTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.program_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProgramTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.program_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramTypesDelete");
    }
}
