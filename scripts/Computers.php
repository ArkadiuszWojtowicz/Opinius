<?php

$title = "Komputery i laptopy";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY r.`id-reviews`  DESC"  , array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$reviewsAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY r.`id-reviews`  DESC"  , array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorst = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestSpeed = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY star DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstSpeed = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY star", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestVoice = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY star2 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstVoice = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY star2", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestComponents = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY star3 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstComponents = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY star3", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestKeyboard = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY star4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstKeyboard = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' ORDER BY star4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));

$contentLOG = '                      
                        <h2>Komputery i laptopy</h2><br>                       
                        
                        <div class="textLeft" >   
                            <form method="post">

                                <select name="sortSpeed" class="sortSelectComputers" onchange="this.form.submit()">    
                                    <option selected disabled hidden>Sortuj po wydajności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                            
                                <select name="sortVoice" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wykonaniu:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                       
                        <div class="textLeft">   
                            <form method="post">
                            
                                <select name="sortComponents" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyświetlaczu:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                            
                                <select name="sortKeyboard" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textRight">   
                            <form method="post">
                                <select name="sort" class="sortSelectShort" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj opinie:</option>
                                    <option value="Najnowsze">Najnowsze</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>';
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 1 && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 1 && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) {
    $contentLOG .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 1 && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) {
    $contentLOG .= $reviews;
}
if (!isset($_POST['sort']) && $status == 1 && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) {
    $contentLOG .= $reviews;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestSpeed;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstSpeed;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestVoice;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstVoice;
}
if (isset($_POST['sortComponents']) && $_POST['sortComponents'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortBestComponents;
}
if (isset($_POST['sortComponents']) && $_POST['sortComponents'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstComponents;
}
if (isset($_POST['sortKeyboard']) && $_POST['sortKeyboard'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestKeyboard;
}
if (isset($_POST['sortKeyboard']) && $_POST['sortKeyboard'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstKeyboard;
}
$content = '
                        <h2>Komputery i laptopy</h2><br>                     

                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortSpeed" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wydajności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortVoice" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wykonaniu:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
               
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortComponents" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyświetlaczu:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortKeyboard" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textRight">   
                        <form method="post">
                            <select name="sort" class="sortSelectShort" onchange="this.form.submit()">
                                <option selected disabled hidden>Sortuj opinie:</option>
                                <option value="Najnowsze">Najnowsze</option>
                                <option value="Malejąco">Od najlepszej</option>
                                <option value="Rosnąco">Od najgorszej</option>                                                    
                            </select>
                        </form> 
                        </div>';
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) { // sortowanie opinii
    $content .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) {
    $content .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) {
    $content .= $reviews;
}
if (!isset($_POST['sort']) && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) {
    $content .= $reviews;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestSpeed;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstSpeed;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestVoice;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstVoice;
}
if (isset($_POST['sortComponents']) && $_POST['sortComponents'] === 'Malejąco' && !isset($_POST['sort'])) {
    $content .= $sortBestComponents;
}
if (isset($_POST['sortComponents']) && $_POST['sortComponents'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstComponents;
}
if (isset($_POST['sortKeyboard']) && $_POST['sortKeyboard'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestKeyboard;
}
if (isset($_POST['sortKeyboard']) && $_POST['sortKeyboard'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstKeyboard;
}

                        
$contentAdmin = '                       
                        <h2>Komputery i laptopy</h2><br>                       
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortSpeed" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wydajności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortVoice" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wykonaniu:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortComponents" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyświetlaczu:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortKeyboard" class="sortSelectComputers" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textRight">   
                        <form method="post">
                            <select name="sort" class="sortSelectShort" onchange="this.form.submit()">
                                <option selected disabled hidden>Sortuj opinie:</option>
                                <option value="Najnowsze">Najnowsze</option>
                                <option value="Malejąco">Od najlepszej</option>
                                <option value="Rosnąco">Od najgorszej</option>                                                    
                            </select>
                        </form> 
                    </div>';
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 2 && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) { // sortowanie opinii
    $contentAdmin .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 2 && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) {
    $contentAdmin .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 2 && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) {
    $contentAdmin .= $reviews;
}
if (!isset($_POST['sort']) && $status == 2 && !isset($_POST['sortVoice']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortComponents']) && !isset($_POST['sortKeyboard'])) {
    $contentAdmin .= $reviews;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestSpeed;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstSpeed;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestVoice;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstVoice;
}
if (isset($_POST['sortComponents']) && $_POST['sortComponents'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortBestComponents;
}
if (isset($_POST['sortComponents']) && $_POST['sortComponents'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstComponents;
}
if (isset($_POST['sortKeyboard']) && $_POST['sortKeyboard'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestKeyboard;
}
if (isset($_POST['sortKeyboard']) && $_POST['sortKeyboard'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstKeyboard;
}