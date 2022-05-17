<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/Controllers/BaseController.php";
require_once __DIR__ . "/Controllers/ColumnsController.php";
require_once __DIR__ . "/Controllers/UsersController.php";
require_once __DIR__ . "/Controllers/TasksController.php";

// ---- TODO : changer le path /api/users/... ----
$routes = [
  "/api/columns/list" => ['GET', 'ColumnsController', 'getList'],
  "/api/columns/get" => ['GET', 'ColumnsController', 'get'],
  "/api/columns/add" => ['POST', 'ColumnsController', 'store'],
  "/api/columns/update" => ['PUT', 'ColumnsController', 'update'],
  "/api/columns/remove" => ['DELETE', 'ColumnsController', 'destroy'],


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

];
