<?php

namespace Core;

class Router
{
	protected $routes = [];
	protected $params = [];

	public function add($route, $params = [])
	{

		$route = preg_replace('/\//', '\\/', $route);

		$route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-zA-Z0-9\-\%\(\)\"\,\ \[\]\.\=\&]+)', $route);

		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

		$route = '/^' . $route . '$/i';

		$this->routes[$route] = $params;
	}

	public function getRoutes()
	{
		return $this->routes;
	}

	public function match($url)
	{
		file_put_contents('../Logs/log.txt', 'Tryna match ' . $url . PHP_EOL, FILE_APPEND);
		foreach ($this->routes as $route => $params) {
			if (preg_match($route, $url, $matches)) {
				foreach ($matches as $key => $match) {
					if (is_string($key)) {
						$params[$key] = $match;
					}
				}
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	public function getParams()
	{
		return $this->params;
	}

	public function dispatch($url)
	{
//		$url = $this->removeQueryStringVariables($url);

		$url = trim($url, '/');

		if ($this->match($url)) {
			$controller = $this->params['controller'];
			$controller = $this->convertToStudlyCaps($controller);
//			$controller = "App\Controllers\\$controller";
			$controller = $this->getNamespace() . $controller;

			if (class_exists($controller)) {
				$controller_object = new $controller($this->params);

				$action = $this->params['action'];
				$action = $this->convertToCamelCase($action) . 'Action';


				if (is_callable([$controller_object, $action])) {
					$params = $this->filterParams($this->params);
					call_user_func_array([$controller_object, $action],
						empty($params) ? ['param' => ''] : $params);
				} else {
						View::getTemplate('Errors/403error.php');
				}
			} else {
					View::getTemplate('Errors/403error.php');
			}
		} else {
				View::getTemplate('Errors/403error.php');
		}
	}

	protected function convertToStudlyCaps($string)
	{
		return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
	}

	protected function convertToCamelCase($string)
	{
		return lcfirst($this->convertToStudlyCaps($string));
	}

	protected function removeQueryStringVariables($url)
	{
		if ($url != '') {
			$parts = explode('&', $url, 2);

			if (strpos($parts[0], '=') === false) {
				$url = $parts[0];
			} else {
				$url = '';
			}
		}
		return $url;
	}

	protected function filterParams(array $params): array
	{
		return array_filter($params, function ($key) {
			return $key != 'controller' && $key != 'action';
		}, ARRAY_FILTER_USE_KEY);
	}

	#organise controllers in subdirectories
	protected function getNamespace()
	{
		$namespace = 'App\Controllers\\';

		if (array_key_exists('namespace', $this->params)) {
			$namespace .= $this->params['namespace'] . '\\';
		}
		return $namespace;
	}
}
