<?php
// zmienia e-mail, nick, hasło lub usuwa konto użytkownika
session_start();
include_once 'class/database.php';
include_once 'class/userManager.php'; // potrzebne do wylogowania po usunięciu konta

$db = new Database("localhost", "root", "", "opinius");
$um = new UserManager(); // potrzebne do wylogowania po usunięciu konta

//ZMIANA ADRESU EMAIL
$email = $_POST['email'];
$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
$emailN = $_POST['emailN'];
$emailLogged = $db->select("SELECT email from users u JOIN logged_in_users l ON u.id = l.userId", array("email"));

if (isset($_POST['email'])) {
    if ($email == $emailLogged && ((strlen($emailN) >= 3) && (strlen($emailN) <= 40)) ) { //&& (filter_var($emailB, FILTER_VALIDATE_EMAIL
        $_SESSION['email'] = '<span style="color:green">Twój e-mail został zmieniony</span>';
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
$nickLogged = $db->select("SELECT nick from users u JOIN logged_in_users l ON u.id = l.userId", array("nick"));

if (isset($_POST['nick'])) {
    if ($nick == $nickLogged && ((strlen($nickN) >= 3) && (strlen($nickN) <= 20))) {
        $_SESSION['nick'] = '<span style="color:green">Twój nick został zmieniony</span>';
        $db->UPDATE("UPDATE users SET nick='$nickN' WHERE nick = '$nick'");
        header("location: ../index.php?site=Settings");
    } else {
        $_SESSION['nick'] = '<span style="color:red">Niepoprawny nick!</span>';
        header("location: ../index.php?site=Settings");
    }
}

//ZMIANA HASŁA
$password = $_POST['password'];
$passwordN = $_POST['passwordN'];
$passwordN2 = $_POST['passwordN2'];
$hashed = hash('ripemd160', $password);
$hashedN = hash('ripemd160', $passwordN);
$passwordLogged = $db->select("SELECT passwd from users u JOIN logged_in_users l ON u.id = l.userId", array("passwd"));

if (isset($_POST['password'])) {
    if ($hashed == $passwordLogged && ((strlen($passwordN) >= 8) && (strlen($passwordN) <= 25)) && $passwordN==$passwordN2) {
        $_SESSION['password'] = '<span style="color:green">Twoje hasło zostało zmienione</span>';
        $db->UPDATE("UPDATE users SET passwd='$hashedN' WHERE passwd = '$hashed'");
        header("location: ../index.php?site=Settings");
    } else {
        $_SESSION['password'] = '<span style="color:red">Niepoprawne hasło!<br>Twoje nowe hasło musi zawierać między 8 a 25 znaków!</span>';
        header("location: ../index.php?site=Settings");
    }
    if($passwordN!=$passwordN2){
        $_SESSION['password'] = '<span style="color:red">Twoje nowe hasła nie są identyczne!</span>';
        header("location: ../index.php?site=Settings");
    } 
}

//USUNIĘCIE KONTA
$removeE = $_POST['removeE'];
$removeH = $_POST['removeH'];
$hashedH = hash('ripemd160', $removeH);

$emailLogged2 = $db->select("SELECT email from users u JOIN logged_in_users l ON u.id = l.userId", array("email"));
$passwordLogged2 = $db->select("SELECT passwd from users u JOIN logged_in_users l ON u.id = l.userId", array("passwd"));

if (isset($_POST['removeE'])) {
    if ($removeE == $emailLogged2 && $hashedH == $passwordLogged2) {
        $um->logout($db);
        $_SESSION['remove'] = '<span style="color:green">Twoje konto zostało usunięte</span>';
        $db->DELETE("DELETE FROM users WHERE email = '$removeE' AND passwd ='$hashedH' ");
        //$_SESSION['remove'] = '<span style="color:red">Twoje konto zostało usunięte!</span>';
        //dorobić info że konto zostało usunięte
        header("location: ../?site=index");
    } else {
        $_SESSION['remove'] = '<span style="color:red">Niepoprawny e-mail lub hasło!</span>';
        header("location: ../index.php?site=Settings");
    }
}

