<?php
require_once("SimpleRest.php");
require_once("Contact.php");

class ContactRestHandler extends SimpleRest {


	function getAllContacts() {

		$contact = new Contact();
		$rawData = $contact->getAllContacts();


		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No contacts found!');
		} else {
			$statusCode = 200;
		}

        // Select format type JSON or XML
        $requestContentType='application/json';


		$this ->setHttpHeaders($requestContentType, $statusCode);

		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}

	public function encodeHtml($responseData) {

		$htmlResponse = "<table border='1'>";
		foreach($responseData as $key=>$value) {
    			$htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
		}
		$htmlResponse .= "</table>";
		return $htmlResponse;
	}

	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;
	}

	public function encodeXml($responseData) {

		// creating object of SimpleXMLElement

		 $xml = new SimpleXMLElement('<?xml version="1.0"?><mobile> </mobile>');


		  foreach($responseData as $key=>$value) {
		     $xml->addChild('key', $key);
		 	 $xml->addChild('value', $value);

		  }


         return $xml->asXML();
	}

	public function getContact($id) {

		$contact = new Contact();
		$rawData = $contact->getContact($id);

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No contacts found!');
		} else {
			$statusCode = 200;
		}

        // Select format type JSON, HTML or XML
        $requestContentType='application/json';


		$this ->setHttpHeaders($requestContentType, $statusCode);

		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}
}
?>