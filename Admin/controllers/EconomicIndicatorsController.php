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

class EconomicIndicatorsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/EconomicIndicatorsList[/{id}]", [PermissionMiddleware::class], "list.economic_indicators")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EconomicIndicatorsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/EconomicIndicatorsAdd[/{id}]", [PermissionMiddleware::class], "add.economic_indicators")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EconomicIndicatorsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/EconomicIndicatorsView[/{id}]", [PermissionMiddleware::class], "view.economic_indicators")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EconomicIndicatorsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/EconomicIndicatorsEdit[/{id}]", [PermissionMiddleware::class], "edit.economic_indicators")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EconomicIndicatorsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/EconomicIndicatorsDelete[/{id}]", [PermissionMiddleware::class], "delete.economic_indicators")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "EconomicIndicatorsDelete");
    }
}
