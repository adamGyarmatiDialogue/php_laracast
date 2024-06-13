<?php

$db = App::resolve("Database");

$heading = 'Note';
$currentUserId = 2;


// Athorizáció miatt van a kódismétlés
$note = $db->query("select * from notes where id = :id", [
	"id" => $_GET["id"],
])->findOrFail();


authorize($note["user_id"] === $currentUserId);


require 'views/notes/show.view.php';
header("location: /phppracticexampp/notes");
exit();
