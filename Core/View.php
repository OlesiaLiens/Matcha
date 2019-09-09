<?php

namespace Core;

class View
{
	public static function render($view, $args = [])
	{
		extract($args, EXTR_SKIP);

		$file = "../App/Views/$view";

		if (is_readable($file)) {
			require $file;
		} else {
			echo "$file not found";
		}
	}

	public static function getTemplate($view, $params = [], $log_user = false)
	{
		$file = "../App/Views/$view";

		if (is_readable($file)) {
			require $file;
		} else {
			echo "$file not found";
		}
	}

	public static function setData()
	{

	}
}

