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

class DifficultyLevelsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/DifficultyLevelsList[/{id}]", [PermissionMiddleware::class], "list.difficulty_levels")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DifficultyLevelsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/DifficultyLevelsAdd[/{id}]", [PermissionMiddleware::class], "add.difficulty_levels")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DifficultyLevelsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/DifficultyLevelsView[/{id}]", [PermissionMiddleware::class], "view.difficulty_levels")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DifficultyLevelsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/DifficultyLevelsEdit[/{id}]", [PermissionMiddleware::class], "edit.difficulty_levels")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DifficultyLevelsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/DifficultyLevelsDelete[/{id}]", [PermissionMiddleware::class], "delete.difficulty_levels")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DifficultyLevelsDelete");
    }
}
