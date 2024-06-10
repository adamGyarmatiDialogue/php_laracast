<?php

require "Validator.php";

$config = require "config.php";

$db = new Database($config["database"]);

$heading = "Create note";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$errors = [];


	if (!Validator::string($_POST["body"], 1, 20)) {
		$errors["body"] = "A body of no more than 20 characters is required.";
	}

	if (empty($errors)) {
		$db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
			"body" => $_POST["body"],
			"user_id" => 3
		]);
	}
}

require "views/notes/create.view.php";

/* <?= isset($_POST["body"]) ? $_POST["body"] : "" ?> */
/*  <?= $_POST["body"] ?? "" ?> */
