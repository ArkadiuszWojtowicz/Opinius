<?php

$title = "Akcesoria";

include_once 'Class/Database.php';
$db = new Database("localhost", "root", "", "klienci");

$opinie = $db->displayReviews("SELECT nick, nazwa, kategoria, opinia from produkty WHERE kategoria= 'Akcesoria' ORDER BY `id-produkt` DESC"  , array("nick","nazwa","kategoria","opinia"));
$opinieAdmin = $db->selectAdmin("SELECT `id-produkt`, nick, nazwa, kategoria, opinia from produkty WHERE kategoria= 'Akcesoria' ORDER BY `id-produkt` DESC"  , array("id-produkt","nick","nazwa","kategoria","opinia"));

$contentLOG = "                       
                        <h2>Akcesoria</h2><br>                       
                        
                ".$opinie;
$content = "
                        <h2>Akcesoria</h2><br>                     

                        ".$opinie;
                        
$contentAdmin = "                       
                        <h2>Akcesoria</h2><br>                       
                        
                ". $opinieAdmin;