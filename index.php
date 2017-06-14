<?php
	/**
	 * Created by PhpStorm.
	 * User: jart
	 * Date: 14.06.2017
	 * Time: 12:55
	 */
	
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