<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Delete;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Get;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Map;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Options;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Patch;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Post;
use PHPMaker2024\Gov_Nanay_Pineda\Attributes\Put;

/**
 * dashboard2 controller
 */
class Dashboard2Controller extends ControllerBase
{
    // custom
    #[Map(["GET", "POST", "OPTIONS"], "/Dashboard2[/{params:.*}]", [PermissionMiddleware::class], "custom.dashboard2")]
    public function custom(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "Dashboard2");
    }
}
