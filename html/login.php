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
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
session_start([
  'cookie_lifetime' => 600,
]);



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
      <?php echo($_GET['error']);  ?>
      <form action="logthein.php" method='post'>
        <div class='input-group-prepend'>
          <span class='input-group-text'>Password</span>
        </div>
        <input class='form-control' aria-label='bell' id='pass' name='pass'>
      </div>
      <div class="col-md-12 mr-auto ml-auto text-center"><br><br>
        <button type="submit" class="btn btn-success">Enter</button>
      </div>
      </form>
    </div>
  </div>


</body>

