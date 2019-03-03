<?php
session_start();
?>
<?php

$title = "Logowanie";

include_once 'class/database.php';
include_once 'class/user.php';
include_once 'class/userManager.php';

$db = new Database("localhost", "root", "", "opinius");
$um = new UserManager();

if (filter_input(INPUT_GET, "akcja") == "wyloguj") {
    $um->logout($db);
    $_SESSION['loggedOut'] = '<span style="color:green; font-size:16px;">Wylogowano pomyślnie!</span>'; // NIE DZIALA
    //$_SESSION['logged'] = '<span style="color:green; font-size:16px;">Logowanie poprawne!</span>';
    header("location:../index.php?site=index"); // PRZEKIEROWANIE PO WYLOGOWANIU
}
if (filter_input(INPUT_POST, "zaloguj")) {
    $userId = $um->login($db);
    if ($userId > 0) {
        $userId = $um->getLoggedInUser($db, session_id());
        if ($userId > 0) {
            $_SESSION['log'] = TRUE;
            $_SESSION['logged'] = '<span style="color:green; font-size:16px; margin-top:100px;"><br>Udało Ci się zalogować!</span>';
            header("location:../index.php?site=index"); // PRZEKIEROWANIE PO ZALOGOWANIU
        }
        exit;
    } else {
        $_SESSION['logowanie'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
        header("location:../index.php?site=Login");
    }
} else {  
    $contentAdmin = ""; // aby nie wyswietlał sie blad niezdefiniowania zmiennej w sekcji logowanie
    $contentLOG = ""; // aby nie wyswietlał sie blad niezdefiniowania zmiennej w sekcji logowanie
    $content = '';
             
    $content .= '<div class="logowanie">';
                if (isset($_SESSION['registration'])) {
                    $content .= '<div class="error">' . $_SESSION['registration'] . '</div>';
                    unset($_SESSION['registration']);
                }
    $content .='<h2>Chcesz dodać opinię? Zaloguj się!</h2>
                <form action="scripts/Login.php" method="post"> 
                <input type="text" name="userName" placeholder="Login" onfocus="this.placeholder=" onblur="this.placeholder=login"><br>
                <input type="password" name="passwd" placeholder="Hasło" onfocus="this.placeholder=" onblur="this.placeholder=hasło" ><br>';
                if (isset($_SESSION['logowanie'])) {
                    $content .= '<div class="error">' . $_SESSION['logowanie'] . '</div>';
                    unset($_SESSION['logowanie']);
                }
    $content .='<input type="submit" value="Zaloguj się" name="zaloguj">
                </form>
                <br><h3>Pierwszy raz w serwisie? Zarejestruj się!</h3>    
                <form action="scripts/Registration.php" method="post">
                <input type="text" name="userName" placeholder="Nazwa użytkownika" onfocus="this.placeholder=" onblur="this.placeholder=nazwa użytkownika" ><br>';
                if (isset($_SESSION['error_nick'])) {
                    $content .= '<div class="error">' . $_SESSION['error_nick'] . '</div>';
                    unset($_SESSION['error_nick']);
                }
    $content .= '<input type="text" name="firstName" placeholder="Imię" onfocus="this.placeholder=" onblur="this.placeholder=imię"/><br>';
                if (isset($_SESSION['error_imie'])) {
                    $content .= '<div class="error">' . $_SESSION['error_imie'] . '</div>';
                    unset($_SESSION['error_imie']);
                }
    $content .= '<input type="text" name="surname" placeholder="Nazwisko" onfocus="this.placeholder=" onblur="this.placeholder=nazwisko"/><br>';
                if (isset($_SESSION['error_surname'])) {
                    $content .= '<div class="error">' . $_SESSION['error_surname'] . '</div>';
                    unset($_SESSION['error_surname']);
                }
    $content .= '<input type="password" name="passwd" placeholder="Hasło" onfocus="this.placeholder=" onblur="this.placeholder=hasło"/><br>';
                if (isset($_SESSION['error_password'])) {
                    $content .= '<div class="error">' . $_SESSION['error_password'] . '</div>';
                    unset($_SESSION['error_password']);
                }
    $content .= '<input type="password" name="passwd2" placeholder="Powtórz hasło" onfocus="this.placeholder=" onblur="this.placeholder=powtórz hasło" /><br>';   
                if (isset($_SESSION['error_password2'])) {
                    $content .= '<div class="error">' . $_SESSION['error_password2'] . '</div>';
                    unset($_SESSION['error_password2']);
                }
    $content .= '<input type="email" name="email" placeholder="E-mail" onfocus="this.placeholder=" onblur="this.placeholder=e-mail"/>';
                if (isset($_SESSION['error_email'])) {
                    $content .= '<div class="error">' . $_SESSION['error_email'] . '</div>';
                    unset($_SESSION['error_email']);
                }
    $content .= '<br>
                <label>
                    <input type="checkbox" name="regulamin" value="regulamin" >  Oświadczam, że znam i akceptuję postanowienia Regulaminu Opinius.
                </label><br><br>';
                if (isset($_SESSION['error_regulamin'])) {
                    $content .= '<div class="error">' . $_SESSION['error_regulamin'] . '</div><br>';
                    unset($_SESSION['error_regulamin']);
                }           
    $content .= '<div class="g-recaptcha captcha" " data-sitekey="6LcoJ4sUAAAAAG1NRSZ6O2HoSvnz7Y0K3f4fQEjE"></div>';
                if (isset($_SESSION['error_bot'])) {
                    $content .= '<br><div class="error">' . $_SESSION['error_bot'] . '</div>';
                    unset($_SESSION['error_bot']);
                }
    $content .= '<input class="przycisk" type="submit" name="submit" value="Zarejestruj się">
                </form></div>';
}
    
    
