<?php

session_start();

$adres = filter_input_array(INPUT_POST)["email"];
$tytul = "Resetowanie hasła";
$wiadomosc = "Witaj, dostaliśmy zgłoszenie o prośbie zresetowania hasła. Kliknij w link poniżej, a zostaniesz"
        . " przekierowany do formularza zmiany hasła. "
        . ""
        . "Jeżeli nie ty wysłałeś prośbę o odnowienie hasła, zignoruj tą wiadomość.";

if(filter_var($adres, FILTER_SANITIZE_EMAIL)){ 
    mail($adres, $tytul, $wiadomosc);
    $_SESSION['sendEmail'] = '<span style="color:green; font-size:16px; margin-top:100px;"><br>E-mail został wysłany!</span>';
    header("location:../index.php?site=Login");
}else{
    $_SESSION['sendEmail'] = '<span style="color:red; font-size:16px; margin-top:100px;"><br>E-mail nie został wysłany!</span>';
    header("location: ../index.php?site=PasswordReminder");
}
