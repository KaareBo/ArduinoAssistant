<?php
include 'db_config.php';
header("Content-Type: JSON");

$query = 'SELECT * FROM API';
$result = mysqli_query($conn, $query) or die("Kunne ikke koble til databasen");

while($row = mysqli_fetch_assoc($result)){
  $response[] = $row;
}

echo json_encode($response, JSON_PRETTY_PRINT);
?>
