<?php

$title = "Akcesoria";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$opinie = $db->displayReviews("SELECT `id-item`, nick, name, category, review from items WHERE category= 'Akcesoria' ORDER BY `id-item` DESC"  , array("id-item","nick","name","category","review"));
$opinieAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, review from items WHERE category= 'Akcesoria' ORDER BY `id-item` DESC"  , array("id-item","nick","name","category","review"));

$contentLOG = "                       
                        <h2>Akcesoria</h2><br>                       
                        
                ".$opinie;
$content = "
                        <h2>Akcesoria</h2><br>                     

                        ".$opinie;
                        
$contentAdmin = "                       
                        <h2>Akcesoria</h2><br>                       
                        
                ". $opinieAdmin;