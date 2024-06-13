<?php

//const BASE_PATH = __DIR__ . "\..\\";

session_start();


require './functions.php';
require './Database.php';
require "./Session.php";
require './Response.php';
require './Router.php';
require "./bootstrap.php";


require "vendor/autoload.php";


$router = new Router();

$routes = require "./routes.php";

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];
$method = isset($_POST["_method"]) ? $_POST["_method"] : $_SERVER["REQUEST_METHOD"];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash("errors", $exception->errors);
    Session::flash("old", $exception->old);

    // redirect("/phppracticexampp/login");
    redirect($router->previousUrl());
}


Session::unflash();
