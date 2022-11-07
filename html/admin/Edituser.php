<?php
session_start([
    'cookie_lifetime' => 600,
  ]);
  
  if($_SESSION["loggedin"] == true){
    
  }else{
    header('location: ../login.php');
  }






// Include config file
require_once "../assets/inc/DB.inc.php";
 
// Define variables and initialize with empty values
$password = $confirm_password = "";
$password_err = $confirm_password_err = $admin_err = $active_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $param_admin = isset($_POST["admin"]);
    $param_active = isset($_POST["active"]);
            // Set parameters 
            $password = trim($_POST["password"]);
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $sql = "UPDATE users SET password='".$param_password."' WHERE id=".$_POST['id'];

            if ($link->query($sql) === TRUE) {
                $link->close();
                header("location: index.php");
              } else {
                echo "Oops! Something went wrong. Please try again later or Email IT support at harrison@sixt5.com.au CODE:".$link->error;
                $id = $_POST['id'];
              }
              $link->close();
}
$time =  date("H:i");
ini_set('default_socket_timeout', 3);
if (isset($id)) {

}else{
    $id = $_GET['id'];
}
$new = "SELECT username, admin, active FROM users where id=".$id;
$result = $link->query($new);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $username = $row['username'];
    if ( $row['admin'] == 1) {
        $admin = "checked";
    }else{
        $admin = "";
    }
    if ( $row['active'] == 1) {
        $active = "checked";
    }else{
        $active = "";
    }

}

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New User</title>
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
        <p><?=$status?></p>
        <br>
      </div>
    </div>
    <br><br>
        <div class="col-md-3 mr-auto ml-auto text-center">
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
                <label>ID</label>
                <input type="text" name="id" id="id" class="form-control" value="<?php echo $_GET['id']; ?>" disabled>
            </div>    
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"disabled>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">

            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="">
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" id="admin" name="admin" <?php echo $admin; ?>>
                <label class="form-check-label" for="admin">Admin</label>
            </div>
                <div class="form-group">
                <input type="checkbox" class="form-check-input" id="active" name="active" <?php echo $active; ?>>
                <label class="form-check-label" for="Active">Active</label>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>
        </div>

</body>
</html>