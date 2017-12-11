<?php
	ini_set("soap.wsdl_cache_enabled", 0);

	/** COMPOSER AUTOLOADER REQUIREMENT **/
	require_once __DIR__ . "/../vendor/autoload.php"; 

	/** CORE REQUIREMENTS **/
	require_once '../app/core/App.php';

	/** MAIN CONFIGURATION **/
	date_default_timezone_set('Europe/Lisbon');
?>
