<?php
if(exec("sudo python /etc/Bell-Timer-System/Tones.py alert")){
    header('location: index.php');
}
header('location: index.php');
?>
