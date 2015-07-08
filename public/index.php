<?php

include '../bootstrap/start.php';

include '../app/database.php';

$routeManager = new \App\Managers\RouteManager();

$routes = require '../app/routes.php';

$routeManager->init($routes)->send();