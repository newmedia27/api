<?php
	/**
	 * Error reporting ON
	 */
	
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	/**
	 * Create ROOT && includes Files
	 */
	define('ROOT', dirname(__FILE__));
	require_once (ROOT . "/components/Autoload.php");
	
	/**
	 *  Router Start
	 */
	
	$router = new Router();
	$router->run();