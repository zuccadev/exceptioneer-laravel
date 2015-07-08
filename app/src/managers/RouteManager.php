<?php

namespace App\Managers;

use League\Route\Strategy\RestfulStrategy;
use Symfony\Component\HttpFoundation\Request;
use League\Route\RouteCollection;

class RouteManager
{
    public function init($routes)
    {
        $router = new RouteCollection;
        $router->setStrategy(new RestfulStrategy);

        foreach ($routes as $route) {
            $router->addRoute(strtoupper($route['verb']), $route['uri'], $route['action']);
        }

        $dispatcher = $router->getDispatcher();
        $request = Request::createFromGlobals();

        $rewriteBase = '/exceptioneer/git/public';
        $uri = str_replace($rewriteBase, '', $request->getPathInfo());

        return $dispatcher->dispatch($request->getMethod(), $uri);
    }

}