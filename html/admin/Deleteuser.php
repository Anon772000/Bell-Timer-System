<?php
session_start([
  'cookie_lifetime' => 600,
]);

if($_SESSION["loggedin"] == true){
  
}else{
  header('location: ../login.php');
}
require_once "../assets/inc/DB.inc.php";
date_default_timezone_set('Australia/Lindeman');
$time =  date("H:i");
ini_set('default_socket_timeout', 3);

$id = $_GET['id'];
$username = $_GET['username'];
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>

<body>
<div class="col-md-7 mr-auto ml-auto text-center">
      <img src="../assets/img/logo/Logo.jpg" style="height:10em;" alt="">
    </div>
    <div class="row">
      <div class="col-md-6 mr-auto ml-auto text-center">
        The Current time is <?=$time?> <br>
        <br>
      </div>
    </div>
<br><br>








</div>
  <form action="deletinguser.php" method="get">

<div class="row">
<div class="col-md-12 mr-auto ml-auto text-center">
<h2>ARE YOU SURE YOU WANT TO DELETE THIS USER?</h2>
<H4>ONCE DELETED IT CAN NOT BE RECOVERED</H4>
<table style="width:100%">




  <tr>
  <th class='text-center'><div class='input-group'>
  <div class='input-group-prepend'>
    <span class='input-group-text'>User</span>
  </div>
  <input type="hidden" id='id' name='id'value="<?=$id?>">
  <input class='form-control' aria-label='bell' id='name' name='name'value="<?=$username?>" disabled>
</div></th>
  

  </tr>




</table>
<div class="col-md-12 mr-auto ml-auto text-center"><br><br>
<button type="submit" class="btn btn-danger">DELETE</button>
</div>
</form>



</div>
</div>
</div>
</body>
