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

class ProfileImagesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProfileImagesList[/{id}]", [PermissionMiddleware::class], "list.profile_images")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProfileImagesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProfileImagesAdd[/{id}]", [PermissionMiddleware::class], "add.profile_images")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProfileImagesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProfileImagesView[/{id}]", [PermissionMiddleware::class], "view.profile_images")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProfileImagesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProfileImagesEdit[/{id}]", [PermissionMiddleware::class], "edit.profile_images")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProfileImagesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProfileImagesDelete[/{id}]", [PermissionMiddleware::class], "delete.profile_images")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProfileImagesDelete");
    }
}
