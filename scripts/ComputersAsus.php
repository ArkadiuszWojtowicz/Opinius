<?php

$title = "Komputery i laptopy Asus";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY `id-item` DESC"  , array("id-item","nick","name","category", "brand","review",  "star", "star2", "star3", "star4"));
$reviewsAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY `id-item` DESC"  , array("id-item","nick","name","category", "brand","review",  "star", "star2", "star3", "star4"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorst = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestSpeed = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY star DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstSpeed = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY star", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestVoice = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY star2 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstVoice = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY star2", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestComponents = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY star3 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstComponents = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY star3", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestKeyboard = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY star4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstKeyboard = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Komputery i laptopy' AND brand = 'Asus' ORDER BY star4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));

$contentLOG = '                      
                        <h2>Komputery i laptopy - Asus</h2><br>                       
                        
                        <div class="textLeft" >   
                            <form method="post">

                                <select name="sortSpeed" class="sortSelect" onchange="this.form.submit()">    
                                    <option selected disabled hidden>Sortuj po prędkości</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                            
                                <select name="sortVoice" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po dźwięku</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                       
                        <div class="textLeft">   
                            <form method="post">
                            
                                <select name="sortComponents" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po podzespołach</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                            
                                <select name="sortKeyboard" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po klawiaturze i obudowie</option>
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
                        <h2>Komputery i laptopy - Asus</h2><br>                     

                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortSpeed" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po obrazie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortVoice" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po dźwięku:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>

                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortComponents" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortKeyboard" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
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
                        <h2>Komputery i laptopy - Asus</h2><br>                       
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortSpeed" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po obrazie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortVoice" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po dźwięku:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                  
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortComponents" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortKeyboard" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
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