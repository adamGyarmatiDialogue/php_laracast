<?php

// return [
// 	"/phppracticexampp/" => "./controllers/index.php",
// 	"/phppracticexampp/about" => "./controllers/about.php",
// 	"/phppracticexampp/notes" => "./controllers/notes/index.php",
// 	"/phppracticexampp/notes/create" => "./controllers/notes/create.php",
// 	"/phppracticexampp/note" => "./controllers/notes/show.php",
// 	"/phppracticexampp/contact" => "./controllers/contact.php",
// ];

$router->get("/phppracticexampp/", "index.php");
$router->get("/phppracticexampp/about", "about.php");
$router->get("/phppracticexampp/contact", "contact.php");

$router->get("/phppracticexampp/notes", "notes/index.php")->only("auth");
$router->get("/phppracticexampp/note", "notes/show.php");
$router->delete("/phppracticexampp/note", "notes/destroy.php");

$router->get("/phppracticexampp/note/edit", "notes/edit.php");
$router->patch("/phppracticexampp/note", "notes/update.php");

$router->get("/phppracticexampp/notes/create", "notes/create.php");
$router->post("/phppracticexampp/notes", "notes/store.php");

$router->get("/phppracticexampp/register", "registration/create.php")->only("guest");
$router->post("/phppracticexampp/register", "registration/store.php")->only("guest");

$router->get("/phppracticexampp/login", "sessions/create.php")->only("guest");
$router->post("/phppracticexampp/login", "sessions/store.php")->only("guest");
$router->delete("/phppracticexampp/logout", "sessions/destroy.php")->only("auth");

// dd($router->routes);
