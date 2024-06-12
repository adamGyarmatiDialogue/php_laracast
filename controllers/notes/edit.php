<?php

$heading = "Edit note";

$db = App::resolve("Database");

$currentUserId = 2;


// Athorizáció miatt van a kódismétlés
$note = $db->query("select * from notes where id = :id", [
	"id" => $_GET["id"],
])->findOrFail();


authorize($note["user_id"] === $currentUserId);

require "views/notes/edit.view.php";
