<?php

// Appel aux contrôleurs
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/UsersController.php";

// Liste des URI
$routes = [
  // Users
  "/api/users/list" => ['GET', 'UsersController', 'getList'],
  "/api/users/get" => ['GET', 'UsersController', 'get'],
  "/api/users/add" => ['POST', 'UsersController', 'store'],
  "/api/users/update" => ['PUT', 'UsersController', 'update'],
  "/api/users/remove" => ['DELETE', 'UsersController', 'destroy'],
];
