<?php
require_once("ContactRestHandler.php");


$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/

 switch($view){

	case "all":

         $contactRestHandler = new ContactRestHandler();
         $contactRestHandler->getAllContacts();

		break;
		

	case "single":

		$contactRestHandler = new ContactRestHandler();
		$contactRestHandler->getContact($_GET["id"]);
		break;


	case "" :
		//404 - not found;
		break;
}
?>
