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

class NewsCategoriesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/NewsCategoriesList[/{id}]", [PermissionMiddleware::class], "list.news_categories")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsCategoriesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/NewsCategoriesAdd[/{id}]", [PermissionMiddleware::class], "add.news_categories")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsCategoriesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/NewsCategoriesView[/{id}]", [PermissionMiddleware::class], "view.news_categories")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsCategoriesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/NewsCategoriesEdit[/{id}]", [PermissionMiddleware::class], "edit.news_categories")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsCategoriesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/NewsCategoriesDelete[/{id}]", [PermissionMiddleware::class], "delete.news_categories")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "NewsCategoriesDelete");
    }
}
