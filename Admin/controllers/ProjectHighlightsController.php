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

class ProjectHighlightsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProjectHighlightsList[/{id}]", [PermissionMiddleware::class], "list.project_highlights")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectHighlightsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProjectHighlightsAdd[/{id}]", [PermissionMiddleware::class], "add.project_highlights")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectHighlightsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProjectHighlightsView[/{id}]", [PermissionMiddleware::class], "view.project_highlights")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectHighlightsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProjectHighlightsEdit[/{id}]", [PermissionMiddleware::class], "edit.project_highlights")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectHighlightsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProjectHighlightsDelete[/{id}]", [PermissionMiddleware::class], "delete.project_highlights")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectHighlightsDelete");
    }
}
