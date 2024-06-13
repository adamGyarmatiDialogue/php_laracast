<?php


require "Validator.php";

$heading = "Edit note";
$db = App::resolve("Database");

$currentUserId = 2;
$errors = [];

//find
$note = $db->query("select * from notes where id = :id", [
	"id" => $_POST["id"],
])->findOrFail();

// auth
authorize($note["user_id"] === $currentUserId);


// validate
if (!Validator::string($_POST["body"], 1, 20)) {
	$errors["body"] = "A body of no more than 20 characters is required.";
}

if (!empty($errors)) {
	// TODO: Validation issue
	require "views/notes/edit.view.php";
	die();
}


// update - TODO
$db->query("update notes set body = :body where id = :id", [
	"body" => $_POST["body"],
	"id" => $_POST["id"]
]);

header("location: /phppracticexampp/notes");
die();

require "views/notes/edit.view.php";
