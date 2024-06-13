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

function redirect($path)
{
	header("location: {$path}");
	exit();
}

function old($key, $default = "")
{
	return Session::get("old")[$key] ?? $default;
}

/*
function base_path($path)
{
	return BASE_PATH . $path;
}
*/
