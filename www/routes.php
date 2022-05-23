<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";

require_once __DIR__ . "/controllers/UserController.php";

require_once __DIR__ . "/controllers/TaskController.php";

require_once __DIR__ . "/controllers/ColumnController.php";

// ---- TODO : Commenter ce bout de code ----
$routes = [
  "/api/users/list" => ['GET', 'UsersController', 'getList'],
  "/api/users/get" => ['GET', 'UsersController', 'get'],
  "/api/users/add" => ['POST', 'UsersController', 'store'],
  "/api/users/update" => ['PUT', 'UsersController', 'update'],
  "/api/users/remove" => ['DELETE', 'UsersController', 'destroy'],

  "/api/tasks/list" => ['GET', 'TasksController', 'getList'],
  "/api/tasks/get" => ['GET', 'TasksController', 'get'],
  "/api/tasks/add" => ['POST', 'TasksController', 'store'],
  "/api/tasks/update" => ['PUT', 'TasksController', 'update'],
  "/api/tasks/remove" => ['DELETE', 'TasksController', 'destroy'],

  "/api/columns/list" => ['GET', 'ColumnsController', 'getList'],
  "/api/columns/get" => ['GET', 'ColumnsController', 'get'],
  "/api/columns/add" => ['POST', 'ColumnsController', 'store'],
  "/api/columns/update" => ['PUT', 'ColumnsController', 'update'],
  "/api/columns/remove" => ['DELETE', 'ColumnsController', 'destroy'],
];