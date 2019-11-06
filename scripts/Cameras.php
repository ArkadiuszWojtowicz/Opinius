<?php

$title = "Aparaty i kamery";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY `id-item` DESC"  , array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$reviewsAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY `id-item` DESC"  , array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorst = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestResolution = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY star DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstResolution = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY star", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestControl = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY star2 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstControl = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY star2", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestZoom = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY star3 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstZoom = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY star3", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestMatrix = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY star4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstMatrix = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Aparaty i kamery' ORDER BY star4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));



$contentLOG = '                       
                        <h2>Aparaty i kamery</h2><br>                       
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortResolution" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po rozdzielczości:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortControl" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po kontroli ekspozycji:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
          
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortZoom" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po przybliżeniu optycznym:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortMatrix" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po matrycy:</option>
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 1 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 1 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentLOG .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 1 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentLOG .= $reviews;
}
if (!isset($_POST['sort']) && $status == 1 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentLOG .= $reviews;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestResolution;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstResolution;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestControl;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstControl;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortBestZoom;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstZoom;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestMatrix;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstMatrix;
}
$content = '
                        <h2>Aparaty i kamery</h2><br>                     
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortResolution" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po rozdzielczości:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortControl" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po kontroli ekspozycji:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
              
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortZoom" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po przybliżeniu optycznym:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortMatrix" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po matrycy:</option>
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) { // sortowanie opinii
    $content .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $content .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $content .= $reviews;
}
if (!isset($_POST['sort']) && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $content .= $reviews;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestResolution;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstResolution;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestControl;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstControl;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Malejąco' && !isset($_POST['sort'])) {
    $content .= $sortBestZoom;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstZoom;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestMatrix;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstMatrix;
}
                        
$contentAdmin = '                     
                        <h2>Aparaty i kamery</h2><br>                       
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortResolution" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po rozdzielczości:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortControl" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po kontroli ekspozycji:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
             
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortZoom" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po przybliżeniu optycznym:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortMatrix" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po matrycy:</option>
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 2 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) { // sortowanie opinii
    $contentAdmin .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 2 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentAdmin .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 2 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentAdmin .= $reviews;
}
if (!isset($_POST['sort']) && $status == 2 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentAdmin .= $reviews;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestResolution;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstResolution;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestControl;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstControl;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortBestZoom;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstZoom;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestMatrix;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstMatrix;
}