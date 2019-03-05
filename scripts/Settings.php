<?php

if (!isset($_SESSION)) {
    session_start();
}

$title = 'Ustawienia';

include_once 'class/database.php';
include_once 'class/userManager.php';

$db = new Database("localhost", "root", "", "opinius");
$um = new UserManager();

$contentAdmin = '
                    <div class="textCenter"> 
                    <h2> Tutaj możesz zmienić ustawienia swojego konta </h2>
                ';
if (isset($_SESSION['email'])) {
    $contentAdmin .= '<div class="error">' . $_SESSION['email'] . '</div>';
    unset($_SESSION['email']);
}
if (isset($_SESSION['nick'])) {
    $contentAdmin .= '<div class="error">' . $_SESSION['nick'] . '</div>';
    unset($_SESSION['nick']);
}
if (isset($_SESSION['password'])) {
    $contentAdmin .= '<div class="error">' . $_SESSION['password'] . '</div>';
    unset($_SESSION['password']);
}
if (isset($_SESSION['remove'])) {
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
                        <input type="password" name="password"><br><br>
                        Podaj swoje <span style="color:red;"><b>nowe</b></span> hasło:<br>
                        <input type="password" name="passwordN"><br>
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
                    </div>
                ';

$contentLOG = '
                    <div class="textCenter"> 
                    <h2> Tutaj możesz zmienić ustawienia swojego konta </h2>
              ';
if (isset($_SESSION['email'])) {
    $contentLOG .= '<div class="error">' . $_SESSION['email'] . '</div>';
    unset($_SESSION['email']);
}
if (isset($_SESSION['nick'])) {
    $contentLOG .= '<div class="error">' . $_SESSION['nick'] . '</div>';
    unset($_SESSION['nick']);
}
if (isset($_SESSION['password'])) {
    $contentLOG .= '<div class="error">' . $_SESSION['password'] . '</div>';
    unset($_SESSION['password']);
}
if (isset($_SESSION['remove'])) {
    $contentLOG .= '<div class="error">' . $_SESSION['remove'] . '</div>';
    unset($_SESSION['remove']);
}
$contentLOG .= '                       
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
                    </div>
                ';

$content = '              
                <h2>Aby zmienić ustawienia konta musisz się zalogować.</h2>  
           ';


