<?php

session_start();

$adres = 'admin@opinius.com.pl';
$email = filter_input_array(INPUT_POST)["email"];
$tytul = filter_input_array(INPUT_POST)["name"];
$wiadomosc = filter_input_array(INPUT_POST)["review"] ."\n\nFrom: ". $email;

//if(filter_var($adres, FILTER_SANITIZE_EMAIL)){
// && (filter_var($email, FILTER_SANITIZE_EMAIL)) == TRUE
if($tytul != "" && $wiadomosc != "" && $email != ""){ 
    mail($adres, $tytul, $wiadomosc);
    $_SESSION['sendEmail'] = '<span style="color:green; font-size:16px; margin-top:100px;text-align:center;"><br>E-mail został wysłany!</span>';
    header("location: ../index.php?site=Contact");
}else{
    $_SESSION['sendEmail'] = '<span style="color:red; font-size:16px; margin-top:100px;text-align:center;"><br>E-mail nie został wysłany! Wprowadź poprawny e-mail</span>';
    header("location: ../index.php?site=Contact");
}