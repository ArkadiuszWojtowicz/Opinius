<?php
// zmienia e-mail, nick, hasło lub usuwa konto użytkownika
session_start();
include_once 'class/Database.php';
include_once 'class/UserManager.php'; // potrzebne do wylogowania po usunięciu konta

$db = new Database("localhost", "root", "", "klienci");
$um = new UserManager(); // potrzebne do wylogowania po usunięciu konta


// ZMIANA ADRESU EMAIL
$email = $_POST['email'];
$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
$emailN = $_POST['emailN'];
$emailLogged = $db->select("SELECT email from users u JOIN logged_in_users l ON u.id = l.userId", array("email"));


if (isset($_POST['email'])) {
    if ($email == $emailLogged && ((strlen($emailN) >= 3) && (strlen($emailN) <= 40)) ) { //&& (filter_var($emailB, FILTER_VALIDATE_EMAIL
        $_SESSION['email'] = '<span style="color:red">Twój e-mail został zmieniony</span>';
        $db->UPDATE("UPDATE users SET email='$emailN' WHERE email = '$email'");
        header("location: ../index.php?site=Settings");
    } else {
        $_SESSION['email'] = '<span style="color:red">Niepoprawny e-mail!</span>';
        header("location: ../index.php?site=Settings");
    }
}


//ZMIANA NICKU
$nick = $_POST['nick'];
$nickN = $_POST['nickN'];
$nickLogged = $db->select("SELECT userName from users u JOIN logged_in_users l ON u.id = l.userId", array("userName"));

if (isset($_POST['nick'])) {
    if ($nick == $nickLogged && ((strlen($nickN) >= 3) && (strlen($nickN) <= 20))) {
        $_SESSION['nick'] = '<span style="color:red">Twój nick został zmieniony</span>';
        $db->UPDATE("UPDATE users SET userName='$nickN' WHERE userName = '$nick'");
        header("location: ../index.php?site=Settings");
    } else {
        $_SESSION['nick'] = '<span style="color:red">Niepoprawny nick!</span>';
        header("location: ../index.php?site=Settings");
    }
}


//ZMIANA HASŁA
$haslo = $_POST['haslo'];
$hasloN = $_POST['hasloN'];
$hashed = hash('ripemd160', $haslo);
$hashedN = hash('ripemd160', $hasloN);
$hasloLogged = $db->select("SELECT passwd from users u JOIN logged_in_users l ON u.id = l.userId", array("passwd"));

if (isset($_POST['haslo'])) {
    if ($hashed == $hasloLogged && ((strlen($hasloN) >= 8) && (strlen($hasloN) <= 25))) {//$hashed == $hasloLogged && ((strlen($hasloN) >= 8) && (strlen($hasloN) <= 25))
        $_SESSION['haslo'] = '<span style="color:red">Twoje hasło zostało zmienione</span>';
        $db->UPDATE("UPDATE users SET passwd='$hashedN' WHERE passwd = '$hashed'");
        header("location: ../index.php?site=Settings");
    } else {
        $_SESSION['haslo'] = '<span style="color:red">Niepoprawne hasło!<br>Twoje nowe hasło musi zawierać między 8 a 25 znaków!</span>';
        header("location: ../index.php?site=Settings");
    }
}


//USUNIĘCIE KONTA
$usunE = $_POST['usunE'];
$usunH = $_POST['usunH'];
$hashedH = hash('ripemd160', $usunH);

$emailLogged2 = $db->select("SELECT email from users u JOIN logged_in_users l ON u.id = l.userId", array("email"));
$hasloLogged2 = $db->select("SELECT passwd from users u JOIN logged_in_users l ON u.id = l.userId", array("passwd"));

if (isset($_POST['usunE'])) {
    if ($usunE == $emailLogged2 && $hashedH == $hasloLogged2) {
        $_SESSION['usun'] = '<span style="color:red">Twoje konto zostało usunięte</span>';
        $um->logout($db);
        $db->DELETE("DELETE FROM users WHERE email = '$usunE' AND passwd ='$hashedH' ");
        //$_SESSION['usun'] = '<span style="color:red">Twoje konto zostało usunięte!</span>';
        //dorobić info że konto zostało usunięte
        header("location: ../?site=index");
    } else {
        $_SESSION['usun'] = '<span style="color:red">Niepoprawny e-mail lub hasło!</span>';
        header("location: ../index.php?site=Settings");
    }
}
