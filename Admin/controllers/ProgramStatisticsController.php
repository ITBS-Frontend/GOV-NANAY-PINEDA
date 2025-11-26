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

class ProgramStatisticsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/ProgramStatisticsList[/{id}]", [PermissionMiddleware::class], "list.program_statistics")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramStatisticsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/ProgramStatisticsAdd[/{id}]", [PermissionMiddleware::class], "add.program_statistics")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramStatisticsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/ProgramStatisticsView[/{id}]", [PermissionMiddleware::class], "view.program_statistics")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramStatisticsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/ProgramStatisticsEdit[/{id}]", [PermissionMiddleware::class], "edit.program_statistics")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramStatisticsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/ProgramStatisticsDelete[/{id}]", [PermissionMiddleware::class], "delete.program_statistics")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ProgramStatisticsDelete");
    }
}
