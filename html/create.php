<?php

$arry2 = $_GET;
$id = $_GET['id'];
$uuid = uniqid();
$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);
$arr1[$id]['bells'][$uuid] = $arry2;
function cmp($a, $b){
    $key = 'time';
    if($a[$key] > $b[$key]){
        return 1;
    }else if($a[$key] < $b[$key]){
        return -1;
    }
    return 0;
}
usort($arr1[$id]['bells'], "cmp");

$arr1[$id]['bells'] = str_replace(array('[',']'), '',$arr1[$id]['bells']);


file_put_contents("assets/json/Templates.json",json_encode($arr1));
if ($_SERVER['HTTP_HOST'] == "bellone1.local"){
    $send = http_build_query($_GET);
    header("location: http://BellOne2.Local/create.php?".$send);
}else{
    header("location: http://BellOne1.Local/EditTemplate.php?id=".$id);
}
