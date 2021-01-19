<?php
include 'db_config.php';

if(isset($_POST['Navn'])){
  mysqli_query($conn, 'INSERT INTO brukere (Navn) VALUES("' . $_POST["Navn"] . '")');
  $result = mysqli_query($conn, 'SELECT bruker_id FROM brukere WHERE Navn = "' . $_POST["Navn"] . '"') or die(mysqli_connect_errno());
  while($row = mysqli_fetch_assoc($result)){
    $bruker = $_POST['Navn'] . $row['bruker_id'];
    $auth = md5($bruker);
    echo($auth);
    mysqli_query($conn, 'UPDATE brukere SET auth_token = "' . $auth . '" WHERE Navn = "' . $_POST['Navn'] . '"');
  }
}
else {
  echo('Skriv inn et navn, idiot <br>');
  echo('<a href="register.php">Gå tilbake<a>');
}
 ?>
