<?php
header("Content-Type: application/json");

include('db_connect.php'); 

$sql = "select caller_name, call_duration FROM call_history";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $json = array();
    while($row = mysqli_fetch_assoc($result)){
       $json[] = $row;
    }

    $response[] = [
      'status' => 'success',
      'message' => $json,
    ];
  
    
    echo json_encode($response);
} else {
  $response[] = [
    'status' => 'success',
    'message' => '0 results',
  ];
  
  echo json_encode($response);
}

mysqli_close($conn);
?>