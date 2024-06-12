<?php

// $config = require "config.php";
// $db = new Database($config["database"]);

$db = App::resolve("Database");

$currentUserId = 2;

// Authorizáció miatt van a kódismétlés
$note = $db->query("select * from notes where id = :id", [
	"id" => $_POST["id"],
])->findOrFail();

authorize($note["user_id"] === $currentUserId);

$db->query("DELETE from notes where id = :id", [
	"id" => $_POST["id"]
]);

header("location: /phppracticexampp/notes");
exit();
