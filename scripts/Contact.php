<?php

$title = "Kontakt";

session_start();

$mojemail = 'usor0192@wp.pl';
$contentLOG = '           
                        <h2> Kontakt </h2>
                        <p>Masz pytanie? Napisz do admina.</p>                       
                        <p>Odpowiem najszybciej jak to możliwe ;)</p><br>
                    <form action="mailto:'. $mojemail .'" method="post" class="textCenter" enctype="text/plain" onsubmit="mail_form(this); return false"> 
                        <div class="textLeft">
                        <p>Temat:</p>
                        <input type="text" name="name" class="textLeft" required><br>                        
                        <p>Treść:</p>
                        <textarea rows="6" cols="50" name="review" class="textLeft" required></textarea><br>
                        <input type="submit" class="textLeft" value="Wyślij"><br>                        
                        </div>                       
                    </form>    

';
                     
$content = '
                        <h2>Kontakt</h2>                         
                        <p>Masz pytanie? Napisz do admina!</p>
                        <p>Odpowiem najszybciej jak to możliwe ;)</p><br>
                    <form action="mailto:'. $mojemail .'" method="post" class="textCenter" enctype="text/plain" onsubmit="mail_form(this); return false"> 
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
    $contentAdmin .= '
                            <div class="textLeft">' . $_SESSION['name'] . '</div>
                        ';
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
    $contentAdmin .= '
                            <div class="textLeft">' . $_SESSION['downGradeStatus'] . '</div>
                        ';
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
