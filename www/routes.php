<?php

require_once __DIR__ . "/controllers/BaseController.php";

require_once __DIR__ . "/controllers/UsersController.php";

require_once __DIR__ . "/controllers/TasksController.php";

require_once __DIR__ . "/controllers/ColumnsController.php";


$routes = [
  "/api/users/list" => ['GET', 'UserController', 'getList'],
  "/api/users/get" => ['GET', 'UserController', 'get'],
  "/api/users/add" => ['POST', 'UserController', 'store'],
  "/api/users/update" => ['PUT', 'UserController', 'update'],
  "/api/users/remove" => ['DELETE', 'UserController', 'destroy'],

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