<?php

$arry2 = $_GET;
$arr1 = json_decode(file_get_contents('assets/json/termDates.json'), true);
if(isset($_GET['id'])){
$arr1[$_GET['id']] = $arry2;

}elseif($_GET['id'] == 'new'){
$uuid = uniqid();


$arr1[$uuid] = $arry2;

}
function cmp($a, $b){
  $key = 'start';
  if($a[$key] > $b[$key]){
      return 1;
  }else if($a[$key] < $b[$key]){
      return -1;
  }
  return 0;
}
usort($arr1, "cmp");


file_put_contents("assets/json/termDates.json",json_encode($arr1))
if ($_SERVER['HTTP_HOST'] == "bells.djarragun.college"){
  $send = http_build_query($_GET);
  if(header("location: http://bells-node.djarragun.college/termnew.php?".$send)){
      header("location: http://bells-node.djarragun.college/termnew.php?".$send);
  }else{
      header("location: http://bells.djarragun.college/BellTimings.php");
  }
}else{
  header("location: http://bells.djarragun.college/BellTimings.php");
}