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
    $_SESSION['log'] = FALSE;
    $_SESSION['loggedOut'] = '<span style="color:green; font-size:16px;">Wylogowano pomyślnie!</span>'; 
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
        $_SESSION['wrongLogin'] = 'Nieprawidłowy login lub hasło!';
        header("location:../index.php?site=Login");
    }
} else {  
    $contentAdmin = ""; // aby nie wyswietlał sie blad niezdefiniowania zmiennej w sekcji logowanie
    $contentLOG = ""; // aby nie wyswietlał sie blad niezdefiniowania zmiennej w sekcji logowanie
    $content = '';
             
    $content .= '<div class="textCenter">';
                if (isset($_SESSION['registration'])) {
                    $content .= $_SESSION['registration'];
                    unset($_SESSION['registration']);
                }
                
    $content .='<h2>Chcesz dodać opinię? Zaloguj się!</h2>
                <form action="scripts/Login.php" method="post"> 
                <input type="text" name="nick" placeholder="Login" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Login\'"><br>
                <input type="password" name="passwd" placeholder="Hasło" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Hasło\'" ><br>
                <div style="margin-top:5px;"><a class="passwordReminder" style="text-decoration:none" href="index.php?site=PasswordReminder" >Zapomniałeś/aś hasła?</a><br></div>';
                if (isset($_SESSION['wrongLogin'])) {
                    $content .= '<div style="margin-top:15px;color:red;">' . $_SESSION['wrongLogin'] . '</div>';
                    unset($_SESSION['wrongLogin']);
                }
    $content .='<input type="submit" value="Zaloguj się" name="zaloguj">
                </form>
                
                <h3>Pierwszy raz w serwisie? Zarejestruj się!</h3>    
                <form action="scripts/Registration.php" method="post">
                <input type="text" name="nick" placeholder="Nazwa użytkownika" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Nazwa użytkownika\'" ><br>';
                if (isset($_SESSION['error_nick'])) {
                    $content .= '<div class="error">' . $_SESSION['error_nick'] . '</div>';
                    unset($_SESSION['error_nick']);
                }
    $content .= '<input type="text" name="firstName" placeholder="Imię" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Imię\'"/><br>';
                if (isset($_SESSION['error_imie'])) {
                    $content .= '<div class="error">' . $_SESSION['error_imie'] . '</div>';
                    unset($_SESSION['error_imie']);
                }
    $content .= '<input type="text" name="surname" placeholder="Nazwisko" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Nazwisko\'"/><br>';
                if (isset($_SESSION['error_surname'])) {
                    $content .= '<div class="error">' . $_SESSION['error_surname'] . '</div>';
                    unset($_SESSION['error_surname']);
                }
    $content .= '<input type="password" name="passwd" placeholder="Hasło" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Hasło\'"/><br>';
                if (isset($_SESSION['error_password'])) {
                    $content .= '<div class="error">' . $_SESSION['error_password'] . '</div>';
                    unset($_SESSION['error_password']);
                }
    $content .= '<input type="password" name="passwd2" placeholder="Powtórz hasło" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Powtórz hasło\'" /><br>';   
                if (isset($_SESSION['error_password2'])) {
                    $content .= '<div class="error">' . $_SESSION['error_password2'] . '</div>';
                    unset($_SESSION['error_password2']);
                }
    $content .= '<input type="email" name="email" placeholder="E-mail" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'E-mail\'"/>';
                if (isset($_SESSION['error_email'])) {
                    $content .= '<div class="error">' . $_SESSION['error_email'] . '</div>';
                    unset($_SESSION['error_email']);
                }
    $content .= '<br>
                <label>
                    <input type="checkbox" name="regulamin" value="regulamin" >  Oświadczam, że znam i akceptuję postanowienia <a style="text-decoration:none" href="images/Regulamin_Opinius.pdf" download>Regulaminu Opinius</a>.
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
    
    
