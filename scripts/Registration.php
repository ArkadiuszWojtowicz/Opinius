<?php

include_once 'class/database.php';
include_once 'class/user.php';

$db = new Database("localhost", "root", "", "opinius");

if (filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {

    $wszystko_OK = true;

    session_start();
    if (isset($_POST['email'])) {
        //Udana walidacja? Załóżmy, że tak!
        //Sprawdź poprawność nickname'a
        $nick = $_POST['userName'];
        //Sprawdzenie długości nicka

        if (ctype_alnum($nick) == false) {
            $wszystko_OK = false;
            $_SESSION['e_nick'] = "Nick może składać się tylko z liter i cyfr (bez polskich znaków)!";
        }

        if ((strlen($nick) < 3) || (strlen($nick) > 20)) {
            $wszystko_OK = false;
            $_SESSION['e_nick'] = "Nick musi posiadać od 3 do 20 znaków!";
        }

        $nickBusy = $db->select("SELECT userName from users WHERE userName='$nick'", array("userName"));
        if ($nick == $nickBusy && $nick != '') {
            $wszystko_OK = false;
            $_SESSION['e_nick'] = "Nick jest już zajęty!";
        }

        //Sprawdzenie imienia 
        $firstName = $_POST['firstName'];
        if ((strlen($firstName) < 3) || (strlen($firstName) > 25)) {
            $wszystko_OK = false;
            $_SESSION['e_imie'] = "Imię musi zawierać od 3-25 znaków!";
        }
        //Sprawdzenie nazwiska
        $surname = $_POST['surname'];
        if ((strlen($surname) < 3) || (strlen($surname) > 25)) {
            $wszystko_OK = false;
            $_SESSION['e_surname'] = "Nazwisko musi zawierać od 3-25 znaków!";
        }

        // Sprawdź poprawność adresu email
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

        if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
            $wszystko_OK = false;
            $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
        }
        
        $emailBusy = $db->select("SELECT email from users WHERE email='$email'", array("email"));
        if ($email == $emailBusy && $email != '') {
            $wszystko_OK = false;
            $_SESSION['e_email'] = "E-mail jest już zajęty!";
        }

        //Sprawdź poprawność hasła
        $haslo1 = $_POST['passwd'];
        $haslo2 = $_POST['passwd2'];

        if ((strlen($haslo1) < 8) || (strlen($haslo1) > 20)) {
            $wszystko_OK = false;
            $_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków!";
        }

        if ($haslo1 != $haslo2) {
            $wszystko_OK = false;
            $_SESSION['e_haslo2'] = "Podane hasła nie są identyczne! " . $haslo1 . "+" . $haslo2;
        }

        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

        //Czy zaakceptowano regulamin?
        if (!isset($_POST['regulamin'])) {
            $wszystko_OK = false;
            $_SESSION['e_regulamin'] = "Potwierdź akceptację regulaminu!";
        }

        //Sprawdzenie captcha!
        $sekret = "6LcoJ4sUAAAAAHO7A1OroDdEU4p4bP_bkeQdyFgi";

        //$sekret = "6LfrbIwUAAAAAMFsn-cmfTHkYfnUEurTHW8guh3w";
        $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $sekret . '&response=' . $_POST['g-recaptcha-response']);

        $odpowiedz = json_decode($sprawdz);

        if ($odpowiedz->success == false) {
            $wszystko_OK = false;
            $_SESSION['e_bot'] = "Potwierdź, że nie jesteś botem!";
        }
        //Zapamiętaj wprowadzone dane
//            $nick2 = $_POST['userName'];
//            $_SESSION['fr_nick'] = $nick2;
//            $_SESSION['fr_imie'] = $imie;
//            $_SESSION['fr_email'] = $email;
//            $_SESSION['fr_haslo1'] = $haslo1;
//            //$_SESSION['fr_haslo2'] = $haslo2;
//            if (isset($_POST['regulamin'])) {
//                $_SESSION['fr_regulamin'] = true;
//            }
//                    try {
//                        $polaczenie = new mysqli($serwer, $user, $pass, $baza);
//                        if ($polaczenie->connect_errno != 0) {
//                            throw new Exception(mysqli_connect_errno());
//                        } else {
//                            //Czy email już istnieje?
//                            $rezultat = $polaczenie->query("SELECT id FROM users WHERE email='$email'");
//
//                            if (!$rezultat) {
//                                throw new Exception($polaczenie->error);
//                            }
//                            $ile_takich_maili = $rezultat->num_rows;
//                            if ($ile_takich_maili > 0) {
//                                $wszystko_OK = false;
//                                $_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
//                            }
//
//                            //Czy nick jest już zarezerwowany?
//                            $rezultat = $polaczenie->query("SELECT id FROM users WHERE userName='$userName'");
//
//                            if (!$rezultat) {
//                                throw new Exception($polaczenie->error);
//                            }
//                            $ile_takich_nickow = $rezultat->num_rows;
//                            if ($ile_takich_nickow > 0) {
//                                $wszystko_OK = false;
//                                $_SESSION['e_nick'] = "Istnieje już gracz o takim nicku!";
//                            }
//
////                            if ($wszystko_OK == true) {
////                                
////                                if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email', 100, 100, 100, 14)")) {
////                                    $_SESSION['udanarejestracja'] = true;
////                                    header('Location: witamy.php');
////                                } else {
////                                    throw new Exception($polaczenie->error);
////                                }
////                            }
//
//                            $polaczenie->close();
//                        }
//                    } catch (Exception $e) {
//                        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
//                        echo '<br />Informacja developerska: ' . $e;
//                    }
        header('Location: ../index.php?site=Login');
        if ($wszystko_OK == true) {
            $user = new User($nick, $imie, $surname, $email, $haslo1);
            $user->saveDB($db);
            $_SESSION['registration'] = '<span style="color:green">Rejestracja przebiegła pomyślnie. Teraz możesz się zalogować!</span>';
            header('Location: ../index.php?site=Login');
        }
    }
}

