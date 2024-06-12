<?php

function dd($value)
{
	echo "<pre>";
	var_dump($value);
	echo "</pre>";

	die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
	if (!$condition) {
		abort($status);
	}
}

function abort($statusCode = 404)
{
	http_response_code($statusCode);
	require "views/$statusCode.php";
	die();
}

function login($user)
{
	$_SESSION["user"] = [
		"email" => $user["email"]
	];

	session_regenerate_id(true);
}

function logout()
{
	$_SESSION = [];
	session_destroy();

	$params = session_get_cookie_params();
	setcookie("PHPSESSID", "", time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

/*
function base_path($path)
{
	return BASE_PATH . $path;
}
*/
