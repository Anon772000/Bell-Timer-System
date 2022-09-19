<?php
session_start([
    'cookie_lifetime' => 600,
  ]);



if($_POST['pass'] == "S[AxiD7P|gm.a?'j"){
    $_SESSION['pass'] = "S[AxiD7P|gm.a?'j";
    $_SESSION['User'] = 'Admin';
    if($_SESSION['pass'] == "S[AxiD7P|gm.a?'j"){
        header('location:index.php');
    }
    
}elseif ($_POST['pass'] == "DC@larms"){
    $_SESSION['pass'] = "DC@larms";
    $_SESSION['User'] = 'user';
    if($_SESSION['pass'] == "DC@larms"){
        header('location:index.php');
    }
}else{
    header('location: login.php?error=Wrong Password');
}