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

class AboutContentController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/AboutContentList[/{id}]", [PermissionMiddleware::class], "list.about_content")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AboutContentList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/AboutContentAdd[/{id}]", [PermissionMiddleware::class], "add.about_content")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AboutContentAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/AboutContentView[/{id}]", [PermissionMiddleware::class], "view.about_content")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AboutContentView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/AboutContentEdit[/{id}]", [PermissionMiddleware::class], "edit.about_content")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AboutContentEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/AboutContentDelete[/{id}]", [PermissionMiddleware::class], "delete.about_content")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AboutContentDelete");
    }
}
