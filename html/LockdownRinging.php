<?php
if(exec("sudo python /etc/Bell-Timer-System/Tones.py lockdown")){
    header('location: index.php');
}
header('location: index.php');
?>
