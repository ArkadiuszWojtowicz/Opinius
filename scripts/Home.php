<?php

if (!isset($_SESSION)) { // aby wyświetlić info o usunięciu konta po usunięciu //NIE DZIAŁA
    session_start();
}

$title = "Opinius";

include_once 'class/Database.php';
include_once 'class/UserManager.php';

$db = new Database("localhost", "root", "", "klienci");
//$um = new UserManager();

$opinie = $db->displayReviews("SELECT nick, nazwa, kategoria, opinia from produkty ORDER BY `id-produkt` DESC", array("nick", "nazwa", "kategoria", "opinia"));
$opinieAdmin = $db->selectAdmin("SELECT `id-produkt`, nick, nazwa, kategoria, opinia from produkty ORDER BY `id-produkt` DESC", array("id-produkt", "nick", "nazwa", "kategoria", "opinia"));

//$sessionId = $db->select("SELECT sessionId from users u JOIN logged_in_users l ON u.id = l.userId" , array("sessionId"));
//trzeba bedzie sprawdzic czy jak jest dwóch zalogowanych uzytkowników na stronie to czy wyswietla wszystko dobrze
//$nick = $db->select("SELECT userName from users u JOIN logged_in_users l ON u.id = l.userId", array("userName"));
//$admin = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));
$contentAdmin = '';
$contentLOG = '';
$content = '';

if (isset($_SESSION['logged'])) { // info o zalogowaniu
    $contentLOG .= '
                                        <div class="logowanie">' . $_SESSION['logged'] . '</div>
                                    ';
    unset($_SESSION['logged']);
}

if (isset($_SESSION['loggedOut'])) { // info o wylogowaniu
    $content .= '
                                        <div class="logowanie">' . $_SESSION['loggedOut'] . '</div>
                                    ';
    unset($_SESSION['loggedOut']);
}

if (isset($_SESSION['added'])) { // info o dodaniu opinii
    $contentLOG .= '
                                        <div class="logowanie">' . $_SESSION['added'] . '</div>
                                    ';
    unset($_SESSION['added']);
}



$contentLOG .= '<h2> Tutaj możesz dodać opinię </h2>
                    <form action="scripts/addOpinion.php" method="post"> 
                        <div class="addReview">
                        <p>Nazwa przedmiotu:</p>
                        <input type="text" name="nazwa" class="addReview" required><br>
                        <p>Kategoria:</p>
                        <select name="kategoria" class="addReview">
                            <option>Telewizory</option>
                            <option>Komputery i laptopy</option>
                            <option>Telefony i smartfony</option>
                            <option>Urządzenia peryferyjne</option>
                            <option>Podzespoły</option>
                            <option>Akcesoria</option>                           
                        </select><br>
                        <p>Twoja opinia:<p>
                        <textarea rows="9" cols="67" name="opinia" class="addReview" required></textarea><br>
                        <input type="submit" value="Dodaj opinię" class="addReview"><br>                        
                        
                        </div>
                    </form>    
                ' . $opinie;

if (isset($_SESSION['logged'])) { // info o zalogowaniu
    $contentAdmin.= '
                                        <div class="logowanie">' . $_SESSION['logged'] . '</div>
                                    ';
    unset($_SESSION['logged']);
}
if (isset($_SESSION['added'])) { // info o dodaniu opinii
    $contentAdmin .= '
                                        <div class="logowanie">' . $_SESSION['added'] . '</div>
                                    ';
    unset($_SESSION['added']);
}
$contentAdmin .= '                        
                    <h2> Tutaj możesz dodać opinię </h2>
                    <form action="scripts/addOpinion.php" method="post" class="logowanie"> 
                        <div class="addReview">
                        <p>Nazwa przedmiotu:</p>
                        <input type="text" name="nazwa" class="addReview" required><br>
                        <p>Kategoria:</p>
                        <select name="kategoria" class="addReview">
                            <option>Telewizory</option>
                            <option>Komputery i laptopy</option>
                            <option>Telefony i smartfony</option>
                            <option>Urządzenia peryferyjne</option>
                            <option>Podzespoły</option>
                            <option>Akcesoria</option>                           
                        </select><br>
                        <p>Twoja opinia:<p>
                        <textarea rows="6" cols="59" name="opinia" class="addReview" required></textarea><br>
                        <input type="submit" value="Dodaj opinię" class="addReview"><br>                        
                        
                        </div>
                    </form>    
                ' . $opinieAdmin;


$content .= '          
                <h2>Aby dodać opinię musisz się zalogować!</h2>        
            
            ' . $opinie;
