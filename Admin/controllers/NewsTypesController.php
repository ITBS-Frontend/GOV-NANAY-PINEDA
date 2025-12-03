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

class NewsTypesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/NewsTypesList[/{id}]", [PermissionMiddleware::class], "list.news_types")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsTypesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/NewsTypesAdd[/{id}]", [PermissionMiddleware::class], "add.news_types")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsTypesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/NewsTypesView[/{id}]", [PermissionMiddleware::class], "view.news_types")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsTypesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/NewsTypesEdit[/{id}]", [PermissionMiddleware::class], "edit.news_types")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsTypesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/NewsTypesDelete[/{id}]", [PermissionMiddleware::class], "delete.news_types")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsTypesDelete");
    }
}
