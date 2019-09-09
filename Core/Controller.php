<?php

namespace Core;

abstract class Controller
{
	protected $route_params = [];

	public function __construct($route_params)
	{
		$this->route_params = $route_params;
	}

	public function __call($name, $args)
	{
		$method = $name . 'Action';

		if (method_exists($this, $method)) {
			if ($this->before() !== false) {
				call_user_func([$this, $method], $args);
				$this->after();
			} else
				View::getTemplate('Errors/403error.php');
		} else {
				View::getTemplate('Errors/403error.php');
		}
	}

	protected function before()
	{

	}

	protected function after()
	{

	}
}
