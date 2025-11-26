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

class TourismDestinationsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/TourismDestinationsList[/{id}]", [PermissionMiddleware::class], "list.tourism_destinations")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismDestinationsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/TourismDestinationsAdd[/{id}]", [PermissionMiddleware::class], "add.tourism_destinations")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismDestinationsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/TourismDestinationsView[/{id}]", [PermissionMiddleware::class], "view.tourism_destinations")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismDestinationsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/TourismDestinationsEdit[/{id}]", [PermissionMiddleware::class], "edit.tourism_destinations")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismDestinationsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/TourismDestinationsDelete[/{id}]", [PermissionMiddleware::class], "delete.tourism_destinations")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "TourismDestinationsDelete");
    }
}
