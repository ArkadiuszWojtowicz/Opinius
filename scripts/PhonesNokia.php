<?php

$title = "Telefony i smartfony Nokia";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY `id-item` DESC"  , array("id-item","nick","name","category", "brand","review",  "star", "star2", "star3", "star4"));
$reviewsAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY `id-item` DESC"  , array("id-item","nick","name","category", "brand","review",  "star", "star2", "star3", "star4"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorst = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestCamera = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY star DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstCamera = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY star", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestBattery = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY star2 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstBattery = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY star2", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestFunction = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY star3 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstFunction = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY star3", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestLook = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY star4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstLook = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Telefony i smartfony' AND brand = 'Nokia' ORDER BY star4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));

$contentLOG = '                       
                        <h2>Telefony i smartfony - Nokia</h2><br>                       
                        
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortCamera" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po aparacie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortBattery" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 1 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 1 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentLOG .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 1 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentLOG .= $reviews;
}
if (!isset($_POST['sort']) && $status == 1 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentLOG .= $reviews;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestCamera;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstCamera;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestBattery;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstBattery;
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
                        <h2>Telefony i smartfony - Nokia</h2><br>                     
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortCamera" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po aparacie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortBattery" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) { // sortowanie opinii
    $content .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $content .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $content .= $reviews;
}
if (!isset($_POST['sort']) && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $content .= $reviews;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestCamera;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstCamera;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestBattery;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstBattery;
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
                        <h2>Telefony i smartfony - Nokia</h2><br>                       
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortCamera" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po aparacie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortBattery" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 2 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) { // sortowanie opinii
    $contentAdmin .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 2 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentAdmin .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 2 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentAdmin .= $reviews;
}
if (!isset($_POST['sort']) && $status == 2 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $contentAdmin .= $reviews;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestCamera;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstCamera;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestBattery;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstBattery;
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