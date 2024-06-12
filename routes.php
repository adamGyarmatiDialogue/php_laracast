<?php

// return [
// 	"/phppracticexampp/" => "./controllers/index.php",
// 	"/phppracticexampp/about" => "./controllers/about.php",
// 	"/phppracticexampp/notes" => "./controllers/notes/index.php",
// 	"/phppracticexampp/notes/create" => "./controllers/notes/create.php",
// 	"/phppracticexampp/note" => "./controllers/notes/show.php",
// 	"/phppracticexampp/contact" => "./controllers/contact.php",
// ];

$router->get("/phppracticexampp/", "./controllers/index.php");
$router->get("/phppracticexampp/about", "./controllers/about.php");
$router->get("/phppracticexampp/contact", "./controllers/contact.php");

$router->get("/phppracticexampp/notes", "./controllers/notes/index.php")->only("auth");
$router->get("/phppracticexampp/note", "./controllers/notes/show.php");
$router->delete("/phppracticexampp/note", "./controllers/notes/destroy.php");

$router->get("/phppracticexampp/note/edit", "./controllers/notes/edit.php");
$router->patch("/phppracticexampp/note", "./controllers/notes/update.php");

$router->get("/phppracticexampp/notes/create", "./controllers/notes/create.php");
$router->post("/phppracticexampp/notes", "./controllers/notes/store.php");

$router->get("/phppracticexampp/register", "./controllers/registration/create.php")->only("guest");
$router->post("/phppracticexampp/register", "./controllers/registration/store.php")->only("guest");

$router->get("/phppracticexampp/login", "./controllers/sessions/create.php")->only("guest");
$router->post("/phppracticexampp/login", "./controllers/sessions/store.php")->only("guest");
$router->delete("/phppracticexampp/logout", "./controllers/sessions/destroy.php")->only("auth");

// dd($router->routes);
