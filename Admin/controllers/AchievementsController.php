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

class AchievementsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/AchievementsList[/{id}]", [PermissionMiddleware::class], "list.achievements")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AchievementsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/AchievementsAdd[/{id}]", [PermissionMiddleware::class], "add.achievements")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AchievementsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/AchievementsView[/{id}]", [PermissionMiddleware::class], "view.achievements")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AchievementsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/AchievementsEdit[/{id}]", [PermissionMiddleware::class], "edit.achievements")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AchievementsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/AchievementsDelete[/{id}]", [PermissionMiddleware::class], "delete.achievements")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AchievementsDelete");
    }
}
