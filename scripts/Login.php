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
    
//            if (isset($_SESSION['correct']))
//            {               
//                $content .= '
//                                    <div class="error">'.$_SESSION['correct'].'</div>
//                              ';
//                unset($_SESSION['correct']);
//            }           
    $content .= '

        <div class="logowanie">   
        
                ';
            if (isset($_SESSION['registration'])) {
                $content .= '
                                            <div class="error">' . $_SESSION['registration'] . '</div>
                                      ';
                unset($_SESSION['registration']);
            }
            $content .= '

            <h2>Chcesz dodać opinię? Zaloguj się!</h2>
        
        <form action="scripts/Login.php" method="post"> 
            <input type="text" name="userName" placeholder="Login" onfocus="this.placeholder=" onblur="this.placeholder=login">
            <input type="password" name="passwd" placeholder="Hasło" onfocus="this.placeholder=" onblur="this.placeholder=hasło" >
            


            ';
    if (isset($_SESSION['logowanie'])) {
        $content .= '
                                    <div class="error">' . $_SESSION['logowanie'] . '</div>
                              ';
        unset($_SESSION['logowanie']);
    }
    $content .= '

            <input type="submit" value="Zaloguj się" name="zaloguj">
            
        </form>
        
        
            <br><h3>Pierwszy raz w serwisie? Zarejestruj się!</h3>
        
        <form action="scripts/Registration.php" method="post">
            <input type="text" name="userName" placeholder="Nazwa użytkownika" onfocus="this.placeholder=" 
                    onblur="this.placeholder=nazwa użytkownika" 
                    
                        ';


//                          if (isset($_SESSION['fr_nick']))
//                            {
//                                //echo $_SESSION['fr_nick'];
//                              $x=7; 
//                                $content .= '
//                                   echo  '.$_SESSION['fr_nick'].';
//                              ';
//                                unset($_SESSION['fr_nick']);
//                            }
//            if (isset($_SESSION["correct"]))
//            {               
//                $content .= '
//                                    <div class="error">'.$_SESSION["correct"].'</div>
//                              ';
//                unset($_SESSION["correct"]);
//            }  
//            
    $content .= '

            />
           ';


    if (isset($_SESSION['e_nick'])) {//<div class="error">'.$_SESSION['e_nick'].'</div>
//               $x =7;
        $content .= '
                
                    <div class="error">' . $_SESSION['e_nick'] . '</div>
                ';
        unset($_SESSION['e_nick']);
    }

    // JESZCZE TRZEBA DODAC VALUE value= I POTEM "
    $content .= '
            <input type="text" name="firstName" placeholder="Imię" onfocus="this.placeholder=" onblur="this.placeholder=imię"/>
            
            ';
    if (isset($_SESSION['e_imie'])) {
        $content .= '
                                    <div class="error">' . $_SESSION['e_imie'] . '</div>
                              ';
        unset($_SESSION['e_imie']);
    }

    $content .= '
                <input type="text" name="surname" placeholder="Nazwisko" onfocus="this.placeholder=" onblur="this.placeholder=nazwisko"/>
            
            ';
    if (isset($_SESSION['e_surname'])) {
        $content .= '
                                    <div class="error">' . $_SESSION['e_surname'] . '</div>
                              ';
        unset($_SESSION['e_surname']);
    }
    $content .= '

            <input type="password" name="passwd" placeholder="Hasło" onfocus="this.placeholder=" onblur="this.placeholder=hasło"/>
            
            ';
    if (isset($_SESSION['e_haslo'])) {
        $content .= '
                                    <div class="error">' . $_SESSION['e_haslo'] . '</div>
                              ';
        unset($_SESSION['e_haslo']);
    }

    $content .= '
            <input type="password" name="passwd2" placeholder="Powtórz hasło" onfocus="this.placeholder=" onblur="this.placeholder=powtórz hasło"/>
            
            ';
    if (isset($_SESSION['e_haslo2'])) {
        $content .= '
                                    <div class="error">' . $_SESSION['e_haslo2'] . '</div>
                              ';
        unset($_SESSION['e_haslo2']);
    }


    $content .= '

            <input type="email" name="email" placeholder="E-mail" onfocus="this.placeholder=" onblur="this.placeholder=e-mail"/>
            
            ';
    if (isset($_SESSION['e_email'])) {
        $content .= '
                                    <div class="error">' . $_SESSION['e_email'] . '</div>
                              ';
        unset($_SESSION['e_email']);
    }

    $content .= '
            <br><br>
            <label>
                <input type="checkbox" name="regulamin" value="regulamin" >  Oświadczam, że znam i akceptuję postanowienia Regulaminu Opinius.
            </label>
            
            ';
    if (isset($_SESSION['e_regulamin'])) {
        $content .= '
                                    <div class="error">' . $_SESSION['e_regulamin'] . '</div>
                              ';
        unset($_SESSION['e_regulamin']);
    }           //<div class="g-recaptcha captcha" data-sitekey="6LfrbIwUAAAAABgkg530Z2pPdu1VKIUeSIHlmF02"></div>
    $content .= '

            
            <div class="g-recaptcha captcha" data-sitekey="6LcoJ4sUAAAAAG1NRSZ6O2HoSvnz7Y0K3f4fQEjE"></div>
            ';
    if (isset($_SESSION['e_bot'])) {
        $content .= '
                                    <div class="error">' . $_SESSION['e_bot'] . '</div>
                              ';
        unset($_SESSION['e_bot']);
    }
    $content .= '

            <input class="przycisk" type="submit" name="submit" value="Zarejestruj się">
            
        </form>
        
        </div>
            ';
}
    
    
