<?php

include_once 'class/database.php';
include_once 'class/user.php';

$db = new Database("localhost", "root", "", "opinius");

if (filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
    $correct = true;
    session_start();
    if (isset(filter_input_array(INPUT_POST)['email'])) {
        $nick = filter_input_array(INPUT_POST)['nick'];
        $checkNick = '/^[0-9A-Za-ząęłńśćźżó_-]{2,20}$/';
        if ((preg_match($checkNick, $nick))==false) {
            $correct = false;
            $_SESSION['error_nick'] = "Nick musi zawierać 2-20 znaków!";
        }//sprawdza poprawność nicku
        $nickBusy = $db->select("SELECT nick from users WHERE nick='$nick'", array("nick"));
        if ($nick == $nickBusy && $nick != '') {
            $correct = false;
            $_SESSION['error_nick'] = "Nick jest już zajęty!";
        }//sprawdza czy nick jest zajęty
        $firstName = filter_input_array(INPUT_POST)['firstName']; 
        $checkFirst = '/^[A-ZŁŻŹa-ząęłńśćźżó]{2,25}$/';
        if ((preg_match($checkFirst, $firstName))==false) {
            $correct = false;
            $_SESSION['error_imie'] = "Imię musi zawierać 2-25 liter! <br>Nie może zawierać cyfr i znaków specjalnych!";
        }//sprawdza poprawność imienia
        $surname = filter_input_array(INPUT_POST)['surname'];
        if ((preg_match($checkFirst, $surname))==false) {
            $correct = false;
            $_SESSION['error_surname'] = "Nazwisko musi zawierać 2-25 liter! <br>Nie może zawierać cyfr i znaków specjalnych!";
        }//sprawdza poprawność nazwiska
        $email = filter_input_array(INPUT_POST)['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (($emailB == false) || ($emailB != $email)) {
            $correct = false;
            $_SESSION['error_email'] = "Podaj poprawny adres e-mail!";
        }//sprawdza poprawność adresu e-mail
        $emailBusy = $db->select("SELECT email from users WHERE email='$email'", array("email"));
        if ($email == $emailBusy && $email != '') {
            $correct = false;
            $_SESSION['error_email'] = "E-mail jest już zajęty!";
        }//sprawdza czy e-mail jest zajęty
        $password1 = filter_input_array(INPUT_POST)['passwd'];
        $password2 = filter_input_array(INPUT_POST)['passwd2'];
        $checkPassword = '/^[0-9A-Za-ząęłńśćźżó]{8,25}$/';
        if ((preg_match($checkPassword, $password1))==false) {
            $correct = false;
            $_SESSION['error_password'] = "Hasło musi zawierać 8-25 znaków! <br>Nie może zawierać znaków specjalnych!";
        }//sprawdza poprawność hasła
        if ($password1 != $password2) {
            $correct = false;
            $_SESSION['error_password2'] = "Podane hasła nie są identyczne! ";
        }
        $password_hash = password_hash($password1, PASSWORD_DEFAULT);
        if (!isset(filter_input_array(INPUT_POST)['regulamin'])) {
            $correct = false;
            $_SESSION['error_regulamin'] = "Potwierdź akceptację regulaminu!";
        }//sprawdza akceptacje regulaminu
        $secret = "6LcoJ4sUAAAAAHO7A1OroDdEU4p4bP_bkeQdyFgi";
        $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . filter_input_array(INPUT_POST)['g-recaptcha-response']);
        $response = json_decode($check);
        if ($response->success == false) {
            $correct = false;
            $_SESSION['error_bot'] = "Potwierdź, że nie jesteś botem!";
        }//sprawdza kod re-captcha       
        header('Location: ../index.php?site=Login');
        if ($correct == true) {
            $user = new User($nick, $firstName, $surname, $email, $password1);
            $user->saveDB($db);
            $_SESSION['registration'] = '<span style="color:green;">Rejestracja przebiegła pomyślnie. Teraz możesz się zalogować!</span>';
            header('Location: ../index.php?site=Login');
        }//jeżeli warunki zostały spełnione dodaje użytkownika do bazy
    }
}

