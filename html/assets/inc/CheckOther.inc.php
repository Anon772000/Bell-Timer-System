<?php
if($_SERVER['HTTP_HOST'] == "dg-bells.djarragun.college"){
    $url = "http://dw-bells.djarragun.college/";
    $headers = @get_headers($url);
    if($headers && strpos( $headers[0], '200')) {
        $status = "Wangetti Status: <span class='w3-tag w3-green'>Online</span>";
    }
    else {
        $status = "Wangetti Status: <span class='w3-tag w3-red'>Offline</span>";
    }
}elseif ($_SERVER['HTTP_HOST'] == "dw-bells.djarragun.college") {
    $url = "http://dg-bells.djarragun.college/";
    $headers = @get_headers($url); 
    if($headers && strpos( $headers[0], '200')) {
        $status = "Gordonvale Status: <span class='w3-tag w3-green'>Online</span>";
    }
    else {
        $status = "Gordonvale Status: <span class='w3-tag w3-red'>Offline</span>";
    }
}
?>