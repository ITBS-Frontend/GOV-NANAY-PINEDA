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

class DestinationGalleryController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/DestinationGalleryList[/{id}]", [PermissionMiddleware::class], "list.destination_gallery")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DestinationGalleryList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/DestinationGalleryAdd[/{id}]", [PermissionMiddleware::class], "add.destination_gallery")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DestinationGalleryAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/DestinationGalleryView[/{id}]", [PermissionMiddleware::class], "view.destination_gallery")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DestinationGalleryView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/DestinationGalleryEdit[/{id}]", [PermissionMiddleware::class], "edit.destination_gallery")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DestinationGalleryEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/DestinationGalleryDelete[/{id}]", [PermissionMiddleware::class], "delete.destination_gallery")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DestinationGalleryDelete");
    }
}
