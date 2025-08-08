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

class PoliticalJourneyController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/PoliticalJourneyList[/{id}]", [PermissionMiddleware::class], "list.political_journey")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PoliticalJourneyList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/PoliticalJourneyAdd[/{id}]", [PermissionMiddleware::class], "add.political_journey")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PoliticalJourneyAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/PoliticalJourneyView[/{id}]", [PermissionMiddleware::class], "view.political_journey")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PoliticalJourneyView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/PoliticalJourneyEdit[/{id}]", [PermissionMiddleware::class], "edit.political_journey")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PoliticalJourneyEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/PoliticalJourneyDelete[/{id}]", [PermissionMiddleware::class], "delete.political_journey")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "PoliticalJourneyDelete");
    }
}
