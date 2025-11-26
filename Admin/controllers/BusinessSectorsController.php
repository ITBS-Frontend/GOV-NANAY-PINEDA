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

class BusinessSectorsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/BusinessSectorsList[/{id}]", [PermissionMiddleware::class], "list.business_sectors")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "BusinessSectorsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/BusinessSectorsAdd[/{id}]", [PermissionMiddleware::class], "add.business_sectors")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "BusinessSectorsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/BusinessSectorsView[/{id}]", [PermissionMiddleware::class], "view.business_sectors")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "BusinessSectorsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/BusinessSectorsEdit[/{id}]", [PermissionMiddleware::class], "edit.business_sectors")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "BusinessSectorsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/BusinessSectorsDelete[/{id}]", [PermissionMiddleware::class], "delete.business_sectors")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "BusinessSectorsDelete");
    }
}
