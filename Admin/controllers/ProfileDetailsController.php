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

class ProfileDetailsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProfileDetailsList[/{id}]", [PermissionMiddleware::class], "list.profile_details")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProfileDetailsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProfileDetailsAdd[/{id}]", [PermissionMiddleware::class], "add.profile_details")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProfileDetailsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProfileDetailsView[/{id}]", [PermissionMiddleware::class], "view.profile_details")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProfileDetailsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProfileDetailsEdit[/{id}]", [PermissionMiddleware::class], "edit.profile_details")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProfileDetailsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProfileDetailsDelete[/{id}]", [PermissionMiddleware::class], "delete.profile_details")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProfileDetailsDelete");
    }
}
