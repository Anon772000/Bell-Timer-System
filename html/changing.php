<?php
$arry2 = $_GET;
$id = $_GET['id'];
$bellid = $_GET['bellid'];
$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);

$arr1[$id]['bells'][$bellid] = $arry2;
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

if ($_SERVER['HTTP_HOST'] == "bells.djarragun.college"){
    $send = http_build_query($_GET);
    if(header("location: http://bells-node.djarragun.college/changing.php?".$send)){
        header("location: http://bells-node.djarragun.college/changing.php?".$send;
    }
        else{
            header("location: http://bells.djarragun.college/EditTemplate.php?id=".$id);
    }
}else{
    header("location: http://bells.djarragun.college/EditTemplate.php?id=".$id);
}

