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

class ProjectStatsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProjectStatsList[/{id}]", [PermissionMiddleware::class], "list.project_stats")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectStatsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProjectStatsAdd[/{id}]", [PermissionMiddleware::class], "add.project_stats")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectStatsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProjectStatsView[/{id}]", [PermissionMiddleware::class], "view.project_stats")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectStatsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProjectStatsEdit[/{id}]", [PermissionMiddleware::class], "edit.project_stats")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectStatsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProjectStatsDelete[/{id}]", [PermissionMiddleware::class], "delete.project_stats")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProjectStatsDelete");
    }
}
