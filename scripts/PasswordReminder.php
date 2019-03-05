<?php

$title = "Przypomnienie hasła";


$content = '
                <h2>Przypomnienie hasła</h2>                         
                <p>Zapomniałeś swojego hasła? Podaj swój adres e-mail, na który wyślemy informację o dalszych krokach.</p>
                
                <form action="scripts/Contact_1.php" method="post">
                    <div class="textLeft">
                    <p>E-mail:</p>
                    <input type="email" name="email" class="textLeft" required><br>
                    <input type="submit" class="textLeft" value="Wyślij">
                    </div>
                </form> 
           ';
                        
$contentLOG = ''; 
$contentAdmin = '';
