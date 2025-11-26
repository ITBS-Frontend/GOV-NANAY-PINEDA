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

class DisasterPreparednessController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/DisasterPreparednessList[/{id}]", [PermissionMiddleware::class], "list.disaster_preparedness")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterPreparednessList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/DisasterPreparednessAdd[/{id}]", [PermissionMiddleware::class], "add.disaster_preparedness")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterPreparednessAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/DisasterPreparednessView[/{id}]", [PermissionMiddleware::class], "view.disaster_preparedness")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterPreparednessView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/DisasterPreparednessEdit[/{id}]", [PermissionMiddleware::class], "edit.disaster_preparedness")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterPreparednessEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/DisasterPreparednessDelete[/{id}]", [PermissionMiddleware::class], "delete.disaster_preparedness")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterPreparednessDelete");
    }
}
