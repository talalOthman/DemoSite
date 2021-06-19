<?php
require_once("StatusRestHandler.php");


$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/

 switch($view){

	case "all":

         $statusRestHandler = new StatusRestHandler();
         $statusRestHandler->getAllStatuses();

		break;
		

	case "single":

		$statusRestHandler = new StatusRestHandler();
		$statusRestHandler->getStatus($_GET["id"]);
		break;


	case "" :
		//404 - not found;
		break;
}
?>