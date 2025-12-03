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

class QuickFactsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/QuickFactsList[/{id}]", [PermissionMiddleware::class], "list.quick_facts")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "QuickFactsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/QuickFactsAdd[/{id}]", [PermissionMiddleware::class], "add.quick_facts")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "QuickFactsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/QuickFactsView[/{id}]", [PermissionMiddleware::class], "view.quick_facts")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "QuickFactsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/QuickFactsEdit[/{id}]", [PermissionMiddleware::class], "edit.quick_facts")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "QuickFactsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/QuickFactsDelete[/{id}]", [PermissionMiddleware::class], "delete.quick_facts")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "QuickFactsDelete");
    }
}
