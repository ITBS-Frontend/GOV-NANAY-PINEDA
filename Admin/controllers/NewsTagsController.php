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

class NewsTagsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/NewsTagsList[/{id}]", [PermissionMiddleware::class], "list.news_tags")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsTagsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/NewsTagsAdd[/{id}]", [PermissionMiddleware::class], "add.news_tags")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsTagsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/NewsTagsView[/{id}]", [PermissionMiddleware::class], "view.news_tags")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsTagsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/NewsTagsEdit[/{id}]", [PermissionMiddleware::class], "edit.news_tags")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsTagsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/NewsTagsDelete[/{id}]", [PermissionMiddleware::class], "delete.news_tags")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsTagsDelete");
    }
}
