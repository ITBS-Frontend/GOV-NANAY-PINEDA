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

class ProgramCategoriesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProgramCategoriesList[/{id}]", [PermissionMiddleware::class], "list.program_categories")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramCategoriesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProgramCategoriesAdd[/{id}]", [PermissionMiddleware::class], "add.program_categories")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramCategoriesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProgramCategoriesView[/{id}]", [PermissionMiddleware::class], "view.program_categories")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramCategoriesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProgramCategoriesEdit[/{id}]", [PermissionMiddleware::class], "edit.program_categories")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramCategoriesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProgramCategoriesDelete[/{id}]", [PermissionMiddleware::class], "delete.program_categories")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramCategoriesDelete");
    }
}
