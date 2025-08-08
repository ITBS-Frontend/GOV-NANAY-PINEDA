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

class UserPermissionsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/UserPermissionsList[/{permission_id}]", [PermissionMiddleware::class], "list.user_permissions")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "UserPermissionsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/UserPermissionsAdd[/{permission_id}]", [PermissionMiddleware::class], "add.user_permissions")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "UserPermissionsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/UserPermissionsView[/{permission_id}]", [PermissionMiddleware::class], "view.user_permissions")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "UserPermissionsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/UserPermissionsEdit[/{permission_id}]", [PermissionMiddleware::class], "edit.user_permissions")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "UserPermissionsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/UserPermissionsDelete[/{permission_id}]", [PermissionMiddleware::class], "delete.user_permissions")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "UserPermissionsDelete");
    }
}
