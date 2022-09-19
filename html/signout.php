<?php
session_start([
    'cookie_lifetime' => 600,
  ]);
if(session_destroy()){
    header("location: login.php");
}


?>