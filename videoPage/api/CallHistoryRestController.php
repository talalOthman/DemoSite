<?php
require_once("CallHistoryRestHandler.php");


$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/

 switch($view){

	case "all":

         $callHistoryRestHandler = new CallHistoryRestHandler();
         $callHistoryRestHandler->getAllCallHistory();

		break;
		

	case "single":

		$callHistoryRestHandler = new CallHistoryRestHandler();
		$callHistoryRestHandler->getCallHistory($_GET["id"]);
		break;


	case "" :
		//404 - not found;
		break;
}
?>