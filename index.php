<?php

//const BASE_PATH = __DIR__ . "\..\\";

session_start();


require './functions.php';
require './Database.php';
require './Response.php';
require './Router.php';
require "./bootstrap.php";

$router = new Router();


$routes = require "./routes.php";


$uri = parse_url($_SERVER['REQUEST_URI'])["path"];
$method = isset($_POST["_method"]) ? $_POST["_method"] : $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);
