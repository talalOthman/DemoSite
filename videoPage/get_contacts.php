<?php
header("Content-Type: application/json");

include('db_connect.php'); 

$sql = "select contact_name, contact_location FROM contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $json = array();
    while($row = mysqli_fetch_assoc($result)){
       $json[] = $row;
    }

    $response = $json;
  
    
    echo json_encode($response);
} else {
  $response[] = [
    'message' => '0 results',
  ];
  
  echo json_encode($response);
}

mysqli_close($conn);
?>