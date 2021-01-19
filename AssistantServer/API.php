<?php
include 'db_config.php';

if(isset($_GET['auth'])){
  $result = mysqli_query($conn, 'SELECT bruker_id FROM brukere WHERE auth_token = "' . $_GET['auth'] . '"');
  if(mysqli_num_rows($result) != 1){
    die("Ugyldig auth token");
  }
  else{
  header("Content-Type: JSON");
  $query = 'SELECT * FROM API';
  $result = mysqli_query($conn, $query) or die("Kunne ikke koble til databasen");

  while($row = mysqli_fetch_assoc($result)){
    $response[] = $row;
  }

  echo json_encode($response, JSON_PRETTY_PRINT);
  }
}
else {
  echo("Manglende auth token");
}
?>
