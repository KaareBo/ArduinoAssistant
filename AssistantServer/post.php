<?php

include 'db_config.php';
  if(isset($_GET['auth'])){
    $result = mysqli_query($conn, 'SELECT bruker_id FROM brukere WHERE auth_token = "' . $_GET['auth'] . '"');
    if(mysqli_num_rows($result) != 1){
      die("Ugyldig auth token");
    }

    if(isset($_GET['LED'])){
    $query = "UPDATE API SET Status = '" . $_GET['LED'] . "'";
    $result = mysqli_query($conn, $query) or die("Problemer med å koble til databasen");
    echo("Suksess");
    }
    else {
      echo("Parameter tom");
    }
  }
  else {
    echo("Manglende auth token");
  }
?>
