<?php
$id = $_GET['id'];


$arr1 = json_decode(file_get_contents('assets/json/special.json'), true);

unset($arr1[$id]);
file_put_contents("assets/json/special.json",json_encode($arr1));
if ($_SERVER['HTTP_HOST'] == "bells.djarragun.college"){
    $send = http_build_query($_GET);
    header("location: http://bells-node.djarragun.college/deletesp.php?".$send);
}else{
    header("location: http://bells.djarragun.college/BellTimings");
}
header('location: BellTimings.php');

















?>
