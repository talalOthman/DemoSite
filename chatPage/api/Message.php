<?php
/*
A domain Class to demonstrate RESTful web services
*/  
Class Message {
 
	
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
		$dbname = "api";

		// Create connection
		$this->conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$this->conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
	}

	public function getAllMessages(){

		$sql = "select * FROM messages";
		$result = $this->conn->query($sql);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}

		return $rows;
	}

	public function getMessageByGroup($chat){

		$sql = "select * FROM messages WHERE chat = ".$chat."";
		$result = $this->conn->query($sql);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}

		return $rows;
	}

	public function getMessage($id){

		$sql = "select * FROM messages WHERE id = ".$id."";
		$result = $this->conn->query($sql);

		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}

		return $rows;
	}

	public function postMessage($message){

		$sender = $message['sender'];
		$group = $message['group'];
		$text = $message['text'];

		$sql = "insert into messages (sender, chat, text)".
		"values ('$sender', '$group', '$text')";

		if ($result = mysqli_query($conn, $sql)){
			return $result;
		}else{
			echo json_encode("Error: " . $sql . "<br>" . mysqli_error($conn));
		}
	}
}
?>