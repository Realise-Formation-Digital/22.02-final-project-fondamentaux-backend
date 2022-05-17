<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/ColumnsController.php";
require_once __DIR__ . "/controllers/UsersController.php";
require_once __DIR__ . "/controllers/TasksController.php";

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

  "/api/tasks/list" => ['GET', 'tasksController', 'getList'],
  "/api/tasks/get" => ['GET', 'tasksController', 'get'],
  "/api/tasks/add" => ['POST', 'tasksController', 'store'],
  "/api/tasks/update" => ['PUT', 'tasksController', 'update'],
  "/api/tasks/remove" => ['DELETE', 'tasksController', 'destroy'],

];