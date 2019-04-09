<?php

session_start();

$adres = 'admin@opinius.com.pl';
$tytul = $_POST["name"];
$wiadomosc = $_POST["review"];

if($tytul != "" && $wiadomosc != ""){ 
    mail($adres, $tytul, $wiadomosc);
    $_SESSION['sendEmail'] = '<span style="color:green; font-size:16px; margin-top:100px;"><br>E-mail został wysłany!</span>';
    header("location: ../index.php?site=Contact");
}else{
    $_SESSION['sendEmail'] = '<span style="color:red; font-size:16px; margin-top:100px;"><br>E-mail nie został wysłany!</span>';
    header("location: ../index.php?site=Contact");
}
