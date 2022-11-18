<!DOCTYPE html>
<html lang="en"> 
<head>
<meta https-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
  
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/harrison.css" rel="stylesheet" />
 
</head>
<?php
if(isset($_GET['error'])){
 $err = $_GET['error'];
}else{
  $err = "";
}
date_default_timezone_set('Australia/Lindeman');
$time =  date("H:i");
session_start([
  'cookie_lifetime' => 600,
]);

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}

// Include config file
require_once "assets/inc/DB.inc.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Check if username is empty
  if(empty(trim($_POST["username"]))){
      $username_err = "Please enter username.";
  } else{
      $username = trim($_POST["username"]);
  }
  
  // Check if password is empty
  if(empty(trim($_POST["password"]))){
      $password_err = "Please enter your password.";
  } else{
      $password = trim($_POST["password"]);
  }
  
  // Validate credentials
  if(empty($username_err) && empty($password_err)){
      // Prepare a select statement
      $sql = "SELECT id, username, password, admin, active FROM users WHERE username = ?";
      
      if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          
          // Set parameters
          $param_username = $username;
          
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              // Store result
              mysqli_stmt_store_result($stmt);
              
              // Check if username exists, if yes then verify password
              if(mysqli_stmt_num_rows($stmt) == 1){                    
                  // Bind result variables
                  mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $admin, $active);
                  if(mysqli_stmt_fetch($stmt)){
                      if(password_verify($password, $hashed_password)){
                        if($active == True){
                          // Password is correct, so start a new session
                          session_start();
                          
                          // Store data in session variables
                          $_SESSION["loggedin"] = true;
                          $_SESSION["id"] = $id;
                          $_SESSION["username"] = $username;
                          $_SESSION["admin"] = $admin;                               
                          
                          // Redirect user to welcome page
                          header("location: index.php");
                        }else{
                          // Password is not valid, display a generic error message
                          $login_err = "Invalid username or password.";
                      }
                      } else{
                          // Password is not valid, display a generic error message
                          $login_err = "Invalid username or password.";
                      }
                  }
              } else{
                  // Username doesn't exist, display a generic error message
                  $login_err = "Invalid username or password.";
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }

          // Close statement
          mysqli_stmt_close($stmt);
      }
  }
  
  // Close connection
  mysqli_close($link);
}
?>



<body>
  <div class="fixed-top">
    <a style="z-index:99;float:right;margin-right:5em;Margin-top:1em;"type='button' class="btn btn-primary btn-lg" href="settings.php">Settings</a>
  </div>
  <div class="container">
    <div class="col-md-7 mr-auto ml-auto text-center">
      <img src="assets/img/logo/Logo.jpg" style="height:10em;" alt="">
    </div>
    <div class="row">
      <div class="col-md-6 mr-auto ml-auto text-center">
        The Current time is <?=$time?> <br><br>
      </div>
    </div>
    <div class="row">
    
      <div class="col-md-6 mr-auto ml-auto text-center">
      <?php echo("<span style='color:red'>$username_err</span>");
      echo("<span style='color:red'>$password_err</span>");
      echo("<span style='color:red'>$login_err</span>");
       ?>
      <form method='post'>
      <div class="form-group">
      <div class='input-group-prepend'>
        <span class='input-group-text'>User</span>
      </div>
        <input class='form-control' type='text'aria-label='bell' id='username' name='username'>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6 mr-auto ml-auto text-center">
    <div class="form-group">
      <div class='input-group-prepend'>
          <span class='input-group-text'>Password</span>
      </div>
        <input class='form-control' type='password'aria-label='bell' id='password' name='password'>
      </div>
    </div>
    </div>
    </div>
      <div class="col-md-12 mr-auto ml-auto text-center"><br><br>
        <button type="submit" class="btn btn-success">Enter</button>
      </div>
      </form>
    
  </div>


</body>

