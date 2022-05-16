<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/ColumnsController.php";
require_once __DIR__ . "/controllers/UsersController.php";
require_once __DIR__ . "/controllers/TasksController.php";

// ---- TODO : changer le path /api/users/... ----
$routes = [
  "/api/Columns/list" => ['GET', 'ColumnsController', 'getList'],
  "/api/Columns/get" => ['GET', 'ColumnsController', 'get'],
  "/api/Columns/add" => ['POST', 'ColumnsController', 'store'],
  "/api/Columns/update" => ['PUT', 'ColumnsController', 'update'],
  "/api/Columns/remove" => ['DELETE', 'ColumnsController', 'destroy'],

];
