<?php

if (!isset($_SESSION)) {
    session_start();
}

$title = 'Ustawienia';

include_once 'class/Database.php';
include_once 'class/UserManager.php';

$db = new Database("localhost", "root", "", "klienci");
$um = new UserManager();

$contentAdmin = '
                        <div class="logowanie"> 
                    <h2> Tutaj możesz zmienić ustawienia swojego konta </h2>
                    ';
if (isset($_SESSION['email'])) {
    $contentAdmin .= '
                                        <div class="error">' . $_SESSION['email'] . '</div>
                                    ';
    //unset($_SESSION['email']);
}
if (isset($_SESSION['nick'])) {
    $contentAdmin .= '
                                        <div class="error">' . $_SESSION['nick'] . '</div>
                                    ';
    //unset($_SESSION['nick']);
}
if (isset($_SESSION['haslo'])) {
    $contentAdmin .= '
                                        <div class="error">' . $_SESSION['haslo'] . '</div>
                                    ';
    //unset($_SESSION['haslo']);
}
if (isset($_SESSION['usun'])) {
    $contentAdmin .= '
                                        <div class="error">' . $_SESSION['usun'] . '</div>
                                    ';
    //unset($_SESSION['usun']);
}
$contentAdmin .= '  
                         
                    <form action="scripts/changeSettings.php" method="post" class="logowanie"> 
                        
                        <h3>Zmień mój adres e-mail:</h3>
                        Podaj swój aktualny adres e-mail:<br>
                        <input type="text" name="email"><br>
                        Podaj swój <span style="color:red;"><b>nowy</b></span> adres e-mail:<br>
                        <input type="text" name="emailN"><br>
                        <input type="submit" value="Zmień mój adres e-mail">      
                    </form>     
                    <form action="scripts/changeSettings.php" method="post" class="logowanie"> 
                        <h3>Zmień mój nick:</h3>
                        Podaj swój aktualny nick:<br>
                        <input type="text" name="nick"><br>
                        Podaj swój <span style="color:red;"><b>nowy</b></span> nick:<br>
                        <input type="text" name="nickN"><br>
                        <input type="submit" value="Zmień mój nick"> 
                    </form>  
                    <form action="scripts/changeSettings.php" method="post" class="logowanie"> 
                        <h3>Zmień moje hasło:</h3>
                        Podaj swoje aktualne hasło:<br>
                        <input type="password" name="haslo"><br><br>
                        Podaj swoje <span style="color:red;"><b>nowe</b></span> hasło:<br>
                        <input type="password" name="hasloN"><br>
                        <input type="submit" value="Zmień moje hasło">  
                    </form>    
                    <form action="scripts/changeSettings.php" method="post" class="logowanie"> 
                        <h3>Usuń moje konto:</h3>
                        Podaj swój e-mail:<br>
                        <input type="text" name="usunE"><br>
                        Podaj swoje hasło:<br>
                        <input type="password" name="usunH"><br>
                        <input class="deleteButton" type="submit" value="Usuń moje konto">
                        
                    </form>   
                    </div>
                ';

$contentLOG = '
                        <div class="logowanie"> 
                    <h2> Tutaj możesz zmienić ustawienia swojego konta </h2>
                    ';
if (isset($_SESSION['email'])) {
    $contentLOG .= '
                                        <div class="error">' . $_SESSION['email'] . '</div>
                                    ';
    unset($_SESSION['email']);
}
if (isset($_SESSION['nick'])) {
    $contentLOG .= '
                                        <div class="error">' . $_SESSION['nick'] . '</div>
                                    ';
    unset($_SESSION['nick']);
}
if (isset($_SESSION['haslo'])) {
    $contentLOG .= '
                                        <div class="error">' . $_SESSION['haslo'] . '</div>
                                    ';
    unset($_SESSION['haslo']);
}
if (isset($_SESSION['usun'])) {
    $contentLOG .= '
                                        <div class="error">' . $_SESSION['usun'] . '</div>
                                    ';
    unset($_SESSION['usun']);
}
$contentLOG .= '  
                         
                    <form action="scripts/changeSettings.php" method="post" class="logowanie"> 
                        
                        <h3>Zmień mój adres e-mail:</h3>
                        Podaj swój aktualny adres e-mail:<br>
                        <input type="text" name="email"><br>
                        Podaj swój <span style="color:red;"><b>nowy</b></span> adres e-mail:<br>
                        <input type="text" name="emailN"><br>
                        <input type="submit" value="Zmień mój adres e-mail">      
                    </form>     
                    <form action="scripts/changeSettings.php" method="post" class="logowanie"> 
                        <h3>Zmień mój nick:</h3>
                        Podaj swój aktualny nick:<br>
                        <input type="text" name="nick"><br>
                        Podaj swój <span style="color:red;"><b>nowy</b></span> nick:<br>
                        <input type="text" name="nickN"><br>
                        <input type="submit" value="Zmień mój nick"> 
                    </form>  
                    <form action="scripts/changeSettings.php" method="post" class="logowanie"> 
                       <h3>Zmień moje hasło:</h3>
                        Podaj swoje aktualne hasło:<br>
                        <input type="password" name="haslo"><br><br>
                        Podaj swoje <span style="color:red;"><b>nowe</b></span> hasło:<br>
                        <input type="password" name="hasloN"><br>
                        <input type="submit" value="Zmień moje hasło">
                    </form>    
                    <form action="scripts/changeSettings.php" method="post" class="logowanie"> 
                        <h3>Usuń moje konto:</h3>
                        Podaj swój e-mail:<br>
                        <input type="text" name="usunE"><br>
                        Podaj swoje hasło:<br>
                        <input type="password" name="usunH"><br>
                        <input class="deleteButton" type="submit" value="Usuń moje konto">
                        
                    </form>   
                    </div>
                ';

$content = '              
                   <h2>Aby zmienić ustawienia konta musisz się zalogować.</h2>  
            ';


