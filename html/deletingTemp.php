<?php


$id = $_GET['id'];

$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);

unset($arr1[$id]);
file_put_contents("assets/json/Templates.json",json_encode($arr1));
file_put_contents("http://BellOne2.local/assets/json/Templates.json",json_encode($arr1));

header("location: settings.php");

