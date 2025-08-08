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

class ProjectsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProjectsList[/{id}]", [PermissionMiddleware::class], "list.projects")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProjectsAdd[/{id}]", [PermissionMiddleware::class], "add.projects")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProjectsView[/{id}]", [PermissionMiddleware::class], "view.projects")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProjectsEdit[/{id}]", [PermissionMiddleware::class], "edit.projects")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProjectsDelete[/{id}]", [PermissionMiddleware::class], "delete.projects")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectsDelete");
    }
}
