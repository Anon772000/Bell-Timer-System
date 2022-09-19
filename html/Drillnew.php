<?php

$arry2 = $_GET;
$arr1 = json_decode(file_get_contents('assets/json/drills.json'), true);
if(isset($_GET['id'])){
$arr1[$_GET['id']] = $arry2;

}elseif($_GET['id'] == 'new'){
$uuid = uniqid();


$arr1[$uuid] = $arry2;

}
file_put_contents("assets/json/drills.json",json_encode($arr1))
if ($_SERVER['HTTP_HOST'] == "bells.djarragun.college"){
  $send = http_build_query($_GET);
  if(header("location: http://bells-node.djarragun.college/DrillNew.php?".$send)){
    header("location: http://bells-node.djarragun.college/DrillNew.php?".$send);
  }else{
    header("location: http://bells.djarragun.college/drills.php");
  }
}else{
  header("location: http://bells.djarragun.college/drills.php");
}