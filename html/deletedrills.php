<?php
$id = $_GET['id'];


$arr1 = json_decode(file_get_contents('assets/json/drills.json'), true);

unset($arr1[$id]);

if (file_put_contents("assets/json/drills.json",json_encode($arr1))){
    header("location: drills.php");
}else{
    header("location: drills.php");
}













?>
