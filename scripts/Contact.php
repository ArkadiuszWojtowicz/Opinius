<?php

$title = "Kontakt";

session_start();

include_once 'class/database.php';
include_once 'class/userManager.php';

$db = new Database("serwer1980150.home.pl", "30402744_opinius", "Waldek84!", "30402744_opinius");
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));

$adres = 'admin@opinius.com.pl';
if (isset($_SESSION['sendEmail']) && $status == 1) { 
    $contentLOG =  '<div class="textCenter">' . $_SESSION['sendEmail'] . '</div>';
    unset($_SESSION['sendEmail']);
}
$contentLOG .= '           
                        <h2> Kontakt </h2>
                        <p>Masz pytanie? Napisz do admina.</p>                       
                        <p>Odpowiem najszybciej jak to możliwe ;)</p><br>
                    <form action="scripts/sendMail.php" method="post" class="textCenter"> 
                        <div class="textLeft">
                        <p>Temat:</p>
                        <input type="text" name="name" class="textLeft" required><br>                        
                        <p>Treść:</p>
                        <textarea rows="6" cols="50" name="review" class="textLeft" required></textarea><br>
                        <input type="submit" class="textLeft" value="Wyślij"><br>                        
                        </div>                       
                    </form>    

';
               
$content = '';                  
if (isset($_SESSION['sendEmail'])) {    
    $content .=  '<div class="textCenter">' . $_SESSION['sendEmail'] . '</div>';
    unset($_SESSION['sendEmail']);
}
$content .= '
                        <h2>Kontakt</h2>                         
                        <p>Masz pytanie? Napisz do admina!</p>
                        <p>Odpowiem najszybciej jak to możliwe ;)</p><br>
                    <form action="scripts/sendMail.php" method="post" class="textCenter"> 
                        <div class="textLeft">
                        <p>Temat:</p>
                        <input type="text" name="name" class="textLeft" required><br>                        
                        <p>Treść:</p>
                        <textarea rows="6" cols="70" name="review" class="textLeft" required></textarea><br>
                        <input type="submit" class="textLeft" value="Wyślij"><br>                        
                        </div>
                    </form>
';
                        
$contentAdmin = '
                        <h2>Prawa admina</h2>                         
                        <p>Zmień prawa dostępu do strony. Możesz przyznać status admina lub go odebrać.</p>
                        <h3 style="text-align:left; margin-bottom:20px;">Nadaj prawa admina</h3>
                  ';
if (isset($_SESSION['name'])) { // info o zmianie statusu użytkownika
    $contentAdmin .= '<div class="textLeft">' . $_SESSION['name'] . '</div>';
    unset($_SESSION['name']);
}
$contentAdmin .= '
                    <form action="scripts/setAdmin.php" method="post" class="textLeft"> 
                        <div class="textLeft">
                        <p>Nazwa użytkownika:</p>
                        <input type="text" name="name" class="textLeft" required><br>                       
                        <input type="submit" value="Zatwierdź" class="textLeft" ><br>                                                
                        </div>
                    </form>    
                    <h3 style="text-align:left; margin-bottom:20px;">Odbierz prawa admina</h3>
';
if (isset($_SESSION['downGradeStatus'])) { // info o błędnej zmianie statusu użytkownika
    $contentAdmin .= '<div class="textLeft">' . $_SESSION['downGradeStatus'] . '</div>';
    unset($_SESSION['downGradeStatus']);
}
$contentAdmin .= '
                    <form action="scripts/setAdmin.php" method="post" class="textLeft"> 
                        <div class="textLeft">
                        <p>Nazwa użytkownika:</p>
                        <input type="text" name="name2" class="textLeft" required><br>                       
                        <input type="submit" value="Zatwierdź" class="textLeft deleteButton"><br>                                                
                        </div>
                    </form>    
';

