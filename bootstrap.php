<?php


require "./Container.php";
require "./App.php";

$container = new Container();

$container->bind("Database", function () {
	$config = require "config.php";
	return new Database($config["database"]);
});

$db = $container->resolve("Database");

App::setContainer($container);
