<?php
/*
A domain Class to demonstrate RESTful web services
*/  
Class Contact {
 
	
	// private $mobiles = array(
	// 	1 => 'Apple iPhone 6S',
	// 	2 => 'Samsung Galaxy S6',
	// 	3 => 'Apple iPhone 6S Plus',
	// 	4 => 'LG G4',
	// 	5 => 'Samsung Galaxy S6 edge',
	// 	6 => 'OnePlus 2');

	private $conn;

	public function __construct() {
		$servername = "localhost";
		$username = "omaga";
		$password = "omar25";
		$dbname = "VideoPage";

		// Create connection
		$this->conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$this->conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
	}

	public function getAllContacts(){

		$sql = "select contact_name, contact_location FROM contacts";
		$result = $this->conn->query($sql);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}

		return $rows;
	}

	public function getContact($id){

		$sql = "select contact_name, contact_location FROM contacts WHERE contact_id = ".$id."";
		$result = $this->conn->query($sql);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}

		return $rows;
	}
}
?>