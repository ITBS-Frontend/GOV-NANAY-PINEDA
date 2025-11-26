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

class SocialWelfareProgramsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/SocialWelfareProgramsList[/{id}]", [PermissionMiddleware::class], "list.social_welfare_programs")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "SocialWelfareProgramsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/SocialWelfareProgramsAdd[/{id}]", [PermissionMiddleware::class], "add.social_welfare_programs")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "SocialWelfareProgramsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/SocialWelfareProgramsView[/{id}]", [PermissionMiddleware::class], "view.social_welfare_programs")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "SocialWelfareProgramsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/SocialWelfareProgramsEdit[/{id}]", [PermissionMiddleware::class], "edit.social_welfare_programs")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "SocialWelfareProgramsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/SocialWelfareProgramsDelete[/{id}]", [PermissionMiddleware::class], "delete.social_welfare_programs")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "SocialWelfareProgramsDelete");
    }
}
