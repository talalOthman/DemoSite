<?php
require_once("MessageRestHandler.php");

$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/

 switch($view){

	case "all":

		// to handle REST Url /mobile/list/
         $messageRestHandler = new MessageRestHandler();
         $messageRestHandler->getAllMessages();

		break;

	case "group":
		//to handle REST Url /mobile/show/<id>/
		$messageRestHandler = new MessageRestHandler();
		$messageRestHandler->getMessageByGroup($_GET["chat"]);
		break;

	case "single":
		//to handle REST Url /mobile/show/<id>/
		$messageRestHandler = new MessageRestHandler();
		$messageRestHandler->getMessage($_GET["id"]);
		break;

	case "post":
		//to handle REST Url /mobile/show/<id>/
		$message = json_decode(file_get_contents("php://input"), true);
		$messageRestHandler = new MessageRestHandler();
		$messageRestHandler->postMessage($message);
		break;

	case "" :
		//404 - not found;
		break;
}
?>
