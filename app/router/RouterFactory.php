<?php

namespace App;

use Nette,
    Nette\Application\Routers\RouteList,
    Nette\Application\Routers\Route;


class RouterFactory
{
	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;
        $routes = new Routes();

        foreach ($routes->routes as $route => $action)
            $router[] = new Route($route, $action);

		return $router;
	}

}
