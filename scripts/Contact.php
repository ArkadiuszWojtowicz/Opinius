<?php
if (!isset($_SESSION)) {
    session_start();
}
$log = '';
if (isset($_SESSION['log'])) {
    $log = $_SESSION['log'];
}
$sesId = session_id();

$title = "";

include_once 'class/database.php';
include_once 'class/userManager.php';
$db = new Database("localhost", "root", "", "opinius");

$userIdSession = $db->select('SELECT userId FROM logged_in_users WHERE sessionId = "'.$sesId.'"', array("userId"));
if ($log == True) {
    $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId WHERE id = " . $userIdSession . "", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
} else {
    $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));
}

$adres = 'admin@opinius.com.pl';

$content = '';                  
if (isset($_SESSION['sendEmail']) && $status !=1 && $status !=2) {    
    $content .=  '<div class="textCenter">' . $_SESSION['sendEmail'] . '</div>';
    unset($_SESSION['sendEmail']);
}
$content .= '
                        <div class="textCenter">
                        <h2>Kontakt</h2>                         
                        <p>Masz pytanie? Napisz do admina!</p>
                        <p>Odpowiem najszybciej jak to możliwe ;)</p><br>
                        </div>
                    <form action="scripts/sendMail.php" method="post" class="textCenter"> 
                        
                        <p>Twój e-mail:</p>
                        <input type="email" name="email" class="textLeft" required><br>     
                        <p>Temat:</p>
                        <input type="text" name="name" class="textLeft" required><br>                        
                        <p>Treść:</p>
                        <textarea rows="6" cols="70" name="review" class="textLeft" required></textarea><br>
                        <input type="submit" class="textLeft" value="Wyślij"><br>                        
                      
                    </form>
';

$contentLOG ='';
if (isset($_SESSION['sendEmail']) && $status == 1) { 
    $contentLOG .=  '<div class="textCenter">' . $_SESSION['sendEmail'] . '</div>';
    unset($_SESSION['sendEmail']);
}
$contentLOG .= '        
                        <div class="textCenter">
                        <h2> Kontakt </h2>
                        <p>Masz pytanie? Napisz do admina.</p>                       
                        <p>Odpowiem najszybciej jak to możliwe ;)</p><br>
                        </div>
                    <form action="scripts/sendMail.php" method="post" class="textCenter"> 
                     
                        <p>Twój e-mail:</p>
                        <input type="email" name="email" class="textLeft" required><br>     
                        <p>Temat:</p>
                        <input type="text" name="name" class="textLeft" required><br>                        
                        <p>Treść:</p>
                        <textarea rows="6" cols="50" name="review" class="textLeft" required></textarea><br>
                        <input type="submit" class="textLeft" value="Wyślij"><br>                        
                                     
                    </form>    

';
               

                        

if (isset($_SESSION['name']) && $status ==2) { // info o zmianie statusu użytkownika
    $contentAdmin .= '<div class="textLeft">' . $_SESSION['name'] . '</div>';
    unset($_SESSION['name']);
}
if (isset($_SESSION['downGradeStatus'])) { // info o błędnej zmianie statusu użytkownika
    $contentAdmin .= '<div class="textCenter">' . $_SESSION['downGradeStatus'] . '</div>';
    unset($_SESSION['downGradeStatus']);
}
$contentAdmin = '
                    <h2>Prawa admina</h2>   
                    <div class="textCenter">                 
                        <p>Zmień prawa dostępu do strony. Możesz przyznać status admina lub go odebrać.</p>
                        
                        <h3 margin-bottom:20px;">Nadaj prawa admina</h3>
                        <form action="scripts/setAdmin.php" method="post">               
                            <p>Nazwa użytkownika:</p>
                            <input type="text" name="name" required><br>                       
                            <input type="submit" value="Zatwierdź"><br>                                                                     
                        </form>   
                        
                        <h3 margin-bottom:20px;">Odbierz prawa admina</h3>
                        <form action="scripts/setAdmin.php" method="post"> 
                            <p>Nazwa użytkownika:</p>
                            <input type="text" name="name2" required><br>                       
                            <input type="submit" value="Zatwierdź" class="deleteButton"><br>                                                  
                        </form>    
                    </div>    
';

