<?php
	function __autoload($className)
	{
		$arrayPaths = [
			'/model/',
			'/components/'
		];
		foreach ($arrayPaths as $path){
			$path = ROOT . $path .$className .'php';
			if (is_file($path)){
				include $path;
			}
		}
	}