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

class NewsPostsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/NewsPostsList[/{id}]", [PermissionMiddleware::class], "list.news_posts")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsPostsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/NewsPostsAdd[/{id}]", [PermissionMiddleware::class], "add.news_posts")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsPostsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/NewsPostsView[/{id}]", [PermissionMiddleware::class], "view.news_posts")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsPostsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/NewsPostsEdit[/{id}]", [PermissionMiddleware::class], "edit.news_posts")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsPostsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/NewsPostsDelete[/{id}]", [PermissionMiddleware::class], "delete.news_posts")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsPostsDelete");
    }
}
