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

class DisasterIncidentsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/DisasterIncidentsList[/{id}]", [PermissionMiddleware::class], "list.disaster_incidents")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterIncidentsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/DisasterIncidentsAdd[/{id}]", [PermissionMiddleware::class], "add.disaster_incidents")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterIncidentsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/DisasterIncidentsView[/{id}]", [PermissionMiddleware::class], "view.disaster_incidents")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterIncidentsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/DisasterIncidentsEdit[/{id}]", [PermissionMiddleware::class], "edit.disaster_incidents")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterIncidentsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/DisasterIncidentsDelete[/{id}]", [PermissionMiddleware::class], "delete.disaster_incidents")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "DisasterIncidentsDelete");
    }
}
