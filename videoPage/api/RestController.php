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

	case "allContacts":

         $contactRestHandler = new ContactRestHandler();
         $contactRestHandler->getAllContacts();

		break;

	case "allCallHistory":

         $contactRestHandler = new ContactRestHandler();
         $contactRestHandler->getAllContacts();

		break;

	case "allStatus":

         $contactRestHandler = new ContactRestHandler();
         $contactRestHandler->getAllContacts();

		break;

		

	case "singleContact":

		$contactRestHandler = new ContactRestHandler();
		$contactRestHandler->getContact($_GET["id"]);
		break;

	case "singleCallHistory":

		$contactRestHandler = new ContactRestHandler();
		$contactRestHandler->getContact($_GET["id"]);
		break;

	case "singleStatus":

		$contactRestHandler = new ContactRestHandler();
		$contactRestHandler->getContact($_GET["id"]);
		break;


	case "" :
		//404 - not found;
		break;
}
?>
