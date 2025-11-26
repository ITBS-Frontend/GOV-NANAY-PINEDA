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

class TourismActivitiesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/TourismActivitiesList[/{id}]", [PermissionMiddleware::class], "list.tourism_activities")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismActivitiesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/TourismActivitiesAdd[/{id}]", [PermissionMiddleware::class], "add.tourism_activities")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismActivitiesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/TourismActivitiesView[/{id}]", [PermissionMiddleware::class], "view.tourism_activities")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismActivitiesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/TourismActivitiesEdit[/{id}]", [PermissionMiddleware::class], "edit.tourism_activities")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismActivitiesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/TourismActivitiesDelete[/{id}]", [PermissionMiddleware::class], "delete.tourism_activities")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismActivitiesDelete");
    }
}
