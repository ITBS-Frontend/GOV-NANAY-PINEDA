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

class ProjectGalleryController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProjectGalleryList[/{id}]", [PermissionMiddleware::class], "list.project_gallery")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectGalleryList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProjectGalleryAdd[/{id}]", [PermissionMiddleware::class], "add.project_gallery")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectGalleryAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProjectGalleryView[/{id}]", [PermissionMiddleware::class], "view.project_gallery")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectGalleryView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProjectGalleryEdit[/{id}]", [PermissionMiddleware::class], "edit.project_gallery")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectGalleryEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProjectGalleryDelete[/{id}]", [PermissionMiddleware::class], "delete.project_gallery")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectGalleryDelete");
    }
}
