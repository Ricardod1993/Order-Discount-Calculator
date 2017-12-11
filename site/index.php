<?php
	//error_reporting(E_ERROR | E_PARSE);

	header('Content-Type: application/json');

	$app_area = "site";

	include_once "../app/init.php";

	$app = new Core\App($app_area);
?>	