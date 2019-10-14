<?php


define("BASE_PATH", __DIR__);
error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function ($class) {
	$root = dirname(__DIR__);
	$file = $root . '/' . str_replace('\\', '/', $class) . '.php';
	if (is_readable($file)) {
		require($root . '/' . str_replace('\\', '/', $class) . '.php');
	}
});

$router = new Core\Router();

$router->add('', ['controller' => 'Login', 'action' => 'login']);
$router->add('{controller}/{id:\d+}[/]*', ['action' => 'index']);
$router->add('{controller}', ['action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{action}/{param}');
//$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$uri = $_SERVER['QUERY_STRING'];
$tmp = explode('/', $uri);
if ($tmp[0] != 'public') {
	$router->dispatch($uri);
}
