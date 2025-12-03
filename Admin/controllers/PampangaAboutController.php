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

class PampangaAboutController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/PampangaAboutList[/{id}]", [PermissionMiddleware::class], "list.pampanga_about")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PampangaAboutList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/PampangaAboutAdd[/{id}]", [PermissionMiddleware::class], "add.pampanga_about")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PampangaAboutAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/PampangaAboutView[/{id}]", [PermissionMiddleware::class], "view.pampanga_about")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PampangaAboutView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/PampangaAboutEdit[/{id}]", [PermissionMiddleware::class], "edit.pampanga_about")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PampangaAboutEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/PampangaAboutDelete[/{id}]", [PermissionMiddleware::class], "delete.pampanga_about")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PampangaAboutDelete");
    }
}
