<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";

require_once __DIR__ . "/controllers/UserController.php";

require_once __DIR__ . "/controllers/TaskController.php";

require_once __DIR__ . "/controllers/ColumnController.php";




// ---- TODO : Commenter ce bout de code ----
$routes = [
  "/api/users/list" => ['GET', 'UserController', 'getList'],
  "/api/users/get" => ['GET', 'UserController', 'get'],
  "/api/users/add" => ['POST', 'UserController', 'store'],
  "/api/users/update" => ['PUT', 'UserController', 'update'],
  "/api/users/remove" => ['DELETE', 'UserController', 'destroy'],

  "/api/tasks/list" => ['GET', 'TaskController', 'getList'],
  "/api/tasks/get" => ['GET', 'TaskController', 'get'],
  "/api/tasks/add" => ['POST', 'TaskController', 'store'],
  "/api/tasks/update" => ['PUT', 'TaskController', 'update'],
  "/api/tasks/remove" => ['DELETE', 'TaskController', 'destroy'],

  "/api/columns/list" => ['GET', 'columnController', 'getList'],
  "/api/columns/get" => ['GET', 'columnController', 'get'],
  "/api/columns/add" => ['POST', 'columnController', 'store'],
  "/api/columns/update" => ['PUT', 'columnController', 'update'],
  "/api/columns/remove" => ['DELETE', 'columnController', 'destroy'],
];



