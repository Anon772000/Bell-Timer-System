<?php
if(exec("sudo python /etc/Bell-Timer-System/Tones.py evac")){
    header('location: index.php');
}
header('location: index.php');
?>
