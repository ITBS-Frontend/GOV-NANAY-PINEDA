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

class NewsPostTagsController extends ControllerBase
{
    // list
    #[Map(["GET","POST","OPTIONS"], "/NewsPostTagsList[/{keys:.*}]", [PermissionMiddleware::class], "list.news_post_tags")]
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $this->getKeyParams($args), "NewsPostTagsList");
    }

    // add
    #[Map(["GET","POST","OPTIONS"], "/NewsPostTagsAdd[/{keys:.*}]", [PermissionMiddleware::class], "add.news_post_tags")]
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $this->getKeyParams($args), "NewsPostTagsAdd");
    }

    // view
    #[Map(["GET","POST","OPTIONS"], "/NewsPostTagsView[/{keys:.*}]", [PermissionMiddleware::class], "view.news_post_tags")]
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $this->getKeyParams($args), "NewsPostTagsView");
    }

    // edit
    #[Map(["GET","POST","OPTIONS"], "/NewsPostTagsEdit[/{keys:.*}]", [PermissionMiddleware::class], "edit.news_post_tags")]
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $this->getKeyParams($args), "NewsPostTagsEdit");
    }

    // delete
    #[Map(["GET","POST","OPTIONS"], "/NewsPostTagsDelete[/{keys:.*}]", [PermissionMiddleware::class], "delete.news_post_tags")]
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $this->getKeyParams($args), "NewsPostTagsDelete");
    }

    // Get keys as associative array
    protected function getKeyParams($args)
    {
        global $RouteValues;
        if (array_key_exists("keys", $args)) {
            $sep = Container("news_post_tags")->RouteCompositeKeySeparator;
            $keys = explode($sep, $args["keys"]);
            if (count($keys) == 2) {
                $keyArgs = array_combine(["post_id","tag_id"], $keys);
                $RouteValues = array_merge(Route(), $keyArgs);
                $args = array_merge($args, $keyArgs);
            }
        }
        return $args;
    }
}
