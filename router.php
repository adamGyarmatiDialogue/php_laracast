<?php


require "Middleware.php";

class Router
{
	protected $routes = [];

	public function add($method, $uri, $controller)
	{
		$this->routes[] = [
			"uri" => $uri,
			"controller" => $controller,
			"method" => $method,
			"middleware" => null,
		];

		return $this;
	}

	function get($uri, $controller)
	{
		return $this->add("GET", $uri, $controller);
	}

	function post($uri, $controller)
	{
		return $this->add("POST", $uri, $controller);
	}

	function put($uri, $controller)
	{
		return $this->add("PUT", $uri, $controller);
	}

	function patch($uri, $controller)
	{
		return $this->add("PATCH", $uri, $controller);
	}

	function delete($uri, $controller)
	{
		return $this->add("DELETE", $uri, $controller);
	}

	function only($key)
	{
		$this->routes[array_key_last($this->routes)]["middleware"] = $key;

		return $this;
	}

	function route($uri, $method)
	{
		// echo $uri . "<br>" . $method;
		foreach ($this->routes as $route) {
			if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
				// apply middleware

				// if ($route["middleware"] === "guest") {
				// 	(new Guest)->handle();
				// }

				// if ($route["middleware"] === "auth") {
				// 	(new Auth)->handle();
				// }

				Middleware::resolve($route["middleware"]);

				return require "./http/controllers/" . $route["controller"];
			}
		}

		$this->abort();
	}

	protected function abort($statusCode = 404)
	{
		http_response_code($statusCode);
		require "views/$statusCode.php";
		die();
	}
}

// function routeToController($uri, $routes)
// {
// 	if (array_key_exists($uri, $routes)) {
// 		require $routes[$uri];
// 	} else {
// 		abort();
// 	}
// }
