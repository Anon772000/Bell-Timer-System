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
  <div class="col-md-6 mr-auto ml-auto">
<h4>Users</h4>
  <table id="myTable" style="width:100%">
  <tr>

  <th>Name</th>
<th>Admin</th>
<th>Active</th>
</tr>
<?php
$sql = "SELECT id,username, admin, active FROM users";
$result = $link->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($row['admin']==1) {
      $adminstatus = "Yes";
    }else{
      $adminstatus = "No";
    }
    if ($row['active']==1) {
      $activestatus = "Yes";
    }else {
      $activestatus = "No";
    }
    echo("<tr>
  <td><input class='form-control' aria-label='bell' value='".$row['username']."' disabled ></td>
  <td><input class='form-control' aria-label='bell' value='".$adminstatus."' disabled ></td>
  <td><input class='form-control' aria-label='bell' value='".$activestatus."' disabled ></td>
 <td><a style='float:right;' type='button' class='btn btn-danger' href='Deleteuser.php?id=".$row['id']."&username=".$row['username']."'>DELETE</a></td>
</tr>
");
  }
} else {
  echo "0 results";
}
$link->close();
?>


</table>
<div class="text-center" >
</br>
<a type='button' class="btn btn-primary" href="newuser.php">New User</a>
</div>

  </div>
  </div>
</div>
</body>
