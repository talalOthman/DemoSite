<?php
header("Content-Type: application/json");

$datas = json_decode(file_get_contents("php://input"), true);

$contact_name = $datas['full_name'];
$contact_location = $datas['location'];

include('db_connect.php'); 

$sql = "insert into contacts (contact_name, contact_location)".
"values ('$contact_name', '$contact_location')";

if (mysqli_query($conn, $sql)) {
  $response[] = [
    'status' => 'success',
    'message' => 'New contact created successfully',
  ];
  echo json_encode($response);
} else {
  echo json_encode("Error: " . $sql . "<br>" . mysqli_error($conn));
}

mysqli_close($conn);
?>