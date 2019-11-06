<?php

$title = "Telewizory Toshiba";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY `id-item` DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$reviewsAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY `id-item` DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorst = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestImage = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY star DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstImage = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY star", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestVoice = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY star2 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstVoice = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY star2", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestFunction = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY star3 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstFunction = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY star3", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestLook = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY star4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstLook = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telewizory' AND brand = 'Toshiba' ORDER BY star4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));

$contentLOG = '                       
                        <h2>Telewizory - Toshiba</h2><br>                       
                        
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortImage" class="sortSelect" onchange="this.form.submit()">
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
                                <select name="sortFunction" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortLook" class="sortSelect" onchange="this.form.submit()">
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

if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 1 && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 1 && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentLOG .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 1 && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentLOG .= $reviews;
}
if (!isset($_POST['sort']) && $status == 1 && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentLOG .= $reviews;
}
if (isset($_POST['sortImage']) && $_POST['sortImage'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestImage;
}
if (isset($_POST['sortImage']) && $_POST['sortImage'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstImage;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestVoice;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstVoice;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortBestFunction;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstFunction;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestLook;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstLook;
}

$content = '
                        <h2>Telewizory - Toshiba</h2><br>                     
                        
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortImage" class="sortSelect" onchange="this.form.submit()">
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
                                <select name="sortFunction" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortLook" class="sortSelect" onchange="this.form.submit()">
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

if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) { // sortowanie opinii
    $content .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $content .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $content .= $reviews;
}
if (!isset($_POST['sort']) && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $content .= $reviews;
}
if (isset($_POST['sortImage']) && $_POST['sortImage'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestImage;
}
if (isset($_POST['sortImage']) && $_POST['sortImage'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstImage;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestVoice;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstVoice;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Malejąco' && !isset($_POST['sort'])) {
    $content .= $sortBestFunction;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstFunction;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestLook;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstLook;
}

$contentAdmin = '                       
                        <h2>Telewizory - Toshiba</h2><br>                       
                        
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortImage" class="sortSelect" onchange="this.form.submit()">
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
                                <select name="sortFunction" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortLook" class="sortSelect" onchange="this.form.submit()">
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 2 && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) { // sortowanie opinii
    $contentAdmin .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 2 && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentAdmin .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 2 && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentAdmin .= $reviews;
}
if (!isset($_POST['sort']) && $status == 2 && !isset($_POST['sortVoice']) && !isset($_POST['sortImage']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentAdmin .= $reviews;
}
if (isset($_POST['sortImage']) && $_POST['sortImage'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestImage;
}
if (isset($_POST['sortImage']) && $_POST['sortImage'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstImage;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestVoice;
}
if (isset($_POST['sortVoice']) && $_POST['sortVoice'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstVoice;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortBestFunction;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstFunction;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestLook;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstLook;
}