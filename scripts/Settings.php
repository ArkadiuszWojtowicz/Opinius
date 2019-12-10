<?php

if (!isset($_SESSION)) {
    session_start();
}

$title = 'Ustawienia';

include_once 'class/database.php';
include_once 'class/userManager.php';

$db = new Database("localhost", "root", "", "opinius");
$um = new UserManager();
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       

$contentLOG = '
                    <div class="textCenter"> 
                    <h2>Tutaj możesz zmienić ustawienia swojego konta</h2>
              ';
if (isset($_SESSION['email']) && $status==1) {
    $contentLOG .= '<div class="error">' . $_SESSION['email'] . '</div>';
    unset($_SESSION['email']);
}
if (isset($_SESSION['nick']) && $status==1) {
    $contentLOG .= '<div class="error">' . $_SESSION['nick'] . '</div>';
    unset($_SESSION['nick']);
}
if (isset($_SESSION['password']) && $status==1) {
    $contentLOG .= '<div class="error">' . $_SESSION['password'] . '</div>';
    unset($_SESSION['password']);
}
if (isset($_SESSION['remove']) && $status==1) {
    $contentLOG .= '<div class="error">' . $_SESSION['remove'] . '</div>';
    unset($_SESSION['remove']);
}

$contentLOG .= '      
                    <form action="scripts/setImage.php" method="post" enctype="multipart/form-data" class="textCenter"> 
                        <h3>Ustaw moje zdjęcie:</h3>
                        Wybierz zdjęcie:<br><br>
                        <input type="file" name="file"><br>
                        <input type="submit" value="Zatwierdź" class="emailChange">      
                    </form>
                    <form action="scripts/changeSettings.php" method="post" class="textCenter"> 
                        <h3>Zmień mój adres e-mail:</h3>
                        Podaj swój aktualny adres e-mail:<br>
                        <input type="text" name="email"><br>
                        Podaj swój <span style="color:red;"><b>nowy</b></span> adres e-mail:<br>
                        <input type="text" name="emailN"><br>
                        <input type="submit" value="Zmień mój adres e-mail" class="emailChange">      
                    </form>     
                    <form action="scripts/changeSettings.php" method="post" class="textCenter"> 
                        <h3>Zmień mój nick:</h3>
                        Podaj swój aktualny nick:<br>
                        <input type="text" name="nick"><br>
                        Podaj swój <span style="color:red;"><b>nowy</b></span> nick:<br>
                        <input type="text" name="nickN"><br>
                        <input type="submit" value="Zmień mój nick"> 
                    </form>  
                    <form action="scripts/changeSettings.php" method="post" class="textCenter"> 
                       <h3>Zmień moje hasło:</h3>
                        Podaj swoje aktualne hasło:<br>
                        <input type="password" name="password"><br>
                        Podaj swoje <span style="color:red;"><b>nowe</b></span> hasło:<br>
                        <input type="password" name="passwordN"><br>
                        Potwierdź swoje <span style="color:red;"><b>nowe</b></span> hasło:<br>
                        <input type="password" name="passwordN2"><br>
                        <input type="submit" value="Zmień moje hasło">
                    </form>    
                    <form action="scripts/changeSettings.php" method="post" class="textCenter"> 
                        <h3>Usuń moje konto:</h3>
                        Podaj swój e-mail:<br>
                        <input type="text" name="removeE"><br>
                        Podaj swoje hasło:<br>
                        <input type="password" name="removeH"><br>
                        <input class="deleteButton" type="submit" value="Usuń moje konto">
                        
                    </form>   
                ';

//if (isset($_POST['file'])) {
//    $db->UPDATE("UPDATE users SET image = $file WHERE id = $idLogged");
//}

$contentAdmin = '
                    <div class="textCenter"> 
                    <h2>Tutaj możesz zmienić ustawienia swojego konta</h2>
                ';
if (isset($_SESSION['email']) && $status==2) {
    $contentAdmin .= '<div class="error">' . $_SESSION['email'] . '</div>';
    unset($_SESSION['email']);
}
if (isset($_SESSION['nick']) && $status==2) {
    $contentAdmin .= '<div class="error">' . $_SESSION['nick'] . '</div>';
    unset($_SESSION['nick']);
}
if (isset($_SESSION['password']) && $status==2) {
    $contentAdmin .= '<div class="error">' . $_SESSION['password'] . '</div>';
    unset($_SESSION['password']);
}
if (isset($_SESSION['remove']) && $status==2) {
    $contentAdmin .= '<div class="error">' . $_SESSION['remove'] . '</div>';
    unset($_SESSION['remove']);
}
$contentAdmin .= '                         
                    <form action="scripts/changeSettings.php" method="post" class="textCenter"> 
                        
                        <h3>Zmień mój adres e-mail:</h3>
                        Podaj swój aktualny adres e-mail:<br>
                        <input type="text" name="email"><br>
                        Podaj swój <span style="color:red;"><b>nowy</b></span> adres e-mail:<br>
                        <input type="text" name="emailN"><br>
                        <input type="submit" value="Zmień mój adres e-mail">      
                    </form>     
                    <form action="scripts/changeSettings.php" method="post" class="textCenter"> 
                        <h3>Zmień mój nick:</h3>
                        Podaj swój aktualny nick:<br>
                        <input type="text" name="nick"><br>
                        Podaj swój <span style="color:red;"><b>nowy</b></span> nick:<br>
                        <input type="text" name="nickN"><br>
                        <input type="submit" value="Zmień mój nick"> 
                    </form>  
                    <form action="scripts/changeSettings.php" method="post" class="textCenter"> 
                        <h3>Zmień moje hasło:</h3>
                        Podaj swoje aktualne hasło:<br>
                        <input type="password" name="password"><br>
                        Podaj swoje <span style="color:red;"><b>nowe</b></span> hasło:<br>
                        <input type="password" name="passwordN"><br>
                        Potwierdź swoje <span style="color:red;"><b>nowe</b></span> hasło:<br>
                        <input type="password" name="passwordN2"><br>
                        <input type="submit" value="Zmień moje hasło">  
                    </form>    
                    <form action="scripts/changeSettings.php" method="post" class="textCenter"> 
                        <h3>Usuń moje konto:</h3>
                        Podaj swój e-mail:<br>
                        <input type="text" name="removeE"><br>
                        Podaj swoje hasło:<br>
                        <input type="password" name="removeH"><br>
                        <input class="deleteButton" type="submit" value="Usuń moje konto">       
                    </form>   
             
                ';



$content = '              
                <h2>Aby zmienić ustawienia konta musisz się zalogować.</h2>  
           ';


