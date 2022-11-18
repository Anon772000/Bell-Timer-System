<?php


$id = $_GET['id'];
$name = $_GET['name'];



$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);

$arr1[$id]['name'] = $name;





if (file_put_contents("assets/json/Templates.json",json_encode($arr1))){
    header("location: EditTemplate.php?id=".$id);
}else{
    header("location: EditTemplate.php?id=".$id);
}


