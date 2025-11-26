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

class InvestmentOpportunitiesController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/InvestmentOpportunitiesList[/{id}]", [PermissionMiddleware::class], "list.investment_opportunities")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "InvestmentOpportunitiesList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/InvestmentOpportunitiesAdd[/{id}]", [PermissionMiddleware::class], "add.investment_opportunities")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "InvestmentOpportunitiesAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/InvestmentOpportunitiesView[/{id}]", [PermissionMiddleware::class], "view.investment_opportunities")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "InvestmentOpportunitiesView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/InvestmentOpportunitiesEdit[/{id}]", [PermissionMiddleware::class], "edit.investment_opportunities")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "InvestmentOpportunitiesEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/InvestmentOpportunitiesDelete[/{id}]", [PermissionMiddleware::class], "delete.investment_opportunities")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "InvestmentOpportunitiesDelete");
    }
}
