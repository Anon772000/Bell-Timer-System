<?php
session_start([
  'cookie_lifetime' => 600,
]);

if($_SESSION["loggedin"] == true){
  
}else{
  header('location: ../login.php');
}
require_once "../assets/inc/DB.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
ini_set('default_socket_timeout', 3);



$sql = "DELETE FROM users WHERE id=".$_GET['id'];

if ($link->query($sql) === TRUE) {
  header("location: index.php");
} else {
  echo "Error deleting record: " . $link->error;
}

$link->close();

?>
 
