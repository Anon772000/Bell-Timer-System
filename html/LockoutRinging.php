<?php
if(exec("sudo python /etc/Bell-Timer-System/Tones.py lockout")){
    header('location: index.php');
}
header('location: index.php');
?>
