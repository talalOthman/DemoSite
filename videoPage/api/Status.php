<?php
/*
A domain Class to demonstrate RESTful web services
*/  
Class Status {
 
	
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
		$username = "root";
		$password = "";
		$dbname = "videopage";

		// Create connection
		$this->conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$this->conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
	}

	public function getAllStatuses(){

		$sql = "select device_name, device_status FROM status";
		$result = $this->conn->query($sql);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}

		return $rows;
	}

	public function getStatus($id){

		$sql = "select device_name, device_status FROM status WHERE status_id = ".$id."";
		$result = $this->conn->query($sql);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}

		return $rows;
	}
}
?>