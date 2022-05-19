<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/Controllers/BaseController.php";
require_once __DIR__ . "/Controllers/ColumnsController.php";
require_once __DIR__ . "/Controllers/UsersController.php";
require_once __DIR__ . "/Controllers/TasksController.php";

// ---- TODO : changer le path /api/users/... ----
$routes = [
  "/api/Columns/list" => ['GET', 'ColumnsController', 'getList'],
  "/api/Columns/get" => ['GET', 'ColumnsController', 'get'],
  "/api/Columns/add" => ['POST', 'ColumnsController', 'store'],
  "/api/Columns/update" => ['PUT', 'ColumnsController', 'update'],
  "/api/Columns/remove" => ['DELETE', 'ColumnsController', 'destroy'],


  "/api/Users/list" => ['GET', 'UsersController', 'getList'],
  "/api/Users/get" => ['GET', 'UsersController', 'get'],
  "/api/Users/add" => ['POST', 'UsersController', 'store'],
  "/api/Users/update" => ['PUT', 'UsersController', 'update'],
  "/api/Users/remove" => ['DELETE', 'UsersController', 'destroy'],


  "/api/tasks/list" => ['GET', 'tasksController', 'getList'],
  "/api/tasks/get" => ['GET', 'tasksController', 'get'],
  "/api/tasks/add" => ['POST', 'tasksController', 'store'],
  "/api/tasks/update" => ['PUT', 'tasksController', 'update'],
  "/api/tasks/remove" => ['DELETE', 'tasksController', 'destroy'],

];
