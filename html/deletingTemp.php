<?php


$id = $_GET['id'];

$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);

unset($arr1[$id]);

if (file_put_contents("assets/json/Templates.json",json_encode($arr1))){
    header("location: settings.php");
}else{
    header("location: settings.php");
}