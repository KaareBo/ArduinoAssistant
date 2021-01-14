<?php

include 'db_config.php';
  if(!empty($_GET['LED'])){
  $query = "UPDATE API SET Status = '" . $_GET['LED'] . "'";
  $result = mysqli_query($conn, $query) or die("Problemer med å koble til databasen");
  echo("Suksess");
  }
  else {
    echo("Parameter tom");
  }
 ?>
