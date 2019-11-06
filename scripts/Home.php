<?php

if (!isset($_SESSION)) {
    session_start();
}

$title = "Opinius";

include_once 'class/database.php';
include_once 'class/userManager.php';

$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items ORDER BY `id-item` DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4", "star2", "star3", "star4"));
$reviewsAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items ORDER BY `id-item` DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4", "star2", "star3", "star4"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorst = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));

//$star1 = $db->displayReviews("SELECT (star + star2 + star3 + star4)/4 from items"  , array("star", "star2", "star3", "star4"));


$contentAdmin = '';
$contentLOG = '';
$content = '';

if (isset($_SESSION['logged']) && $status == 1) { // info o zalogowaniu
    $contentLOG .= '<div class="textCenter">' . $_SESSION['logged'] . '</div>';
    unset($_SESSION['logged']);
}
if (isset($_SESSION['loggedOut']) && $status != 1 && status != 2) { // info o wylogowaniu
    $content .= '<div class="textCenter">' . $_SESSION['loggedOut'] . '</div>';
    unset($_SESSION['loggedOut']);
}
if (isset($_SESSION['added']) && $status == 1) { // info o dodaniu opinii
    $contentLOG .= '<div class="textCenter">' . $_SESSION['added'] . '</div>';
    unset($_SESSION['added']);
}

//<p>Ogólna ocena:</p>
//                            <div class="rating" id="stars" name="stars">
//                                <label><input type="radio" style="display:none" value="5" name="button" onclick="changeColor5star()"><i class="icon-star-filled" name="button"></i></label>
//                                <label><input type="radio" style="display:none" value="4" name="button" onclick="changeColor4star()"><i class="icon-star-filled" name="button"></i></label>
//                                <label><input type="radio" style="display:none" value="3" name="button" onclick="changeColor3star()"><i class="icon-star-filled" name="button"></i></label>
//                                <label><input type="radio" style="display:none" value="2" name="button" onclick="changeColor2star()"><i class="icon-star-filled" name="button"></i></label>
//                                <label><input type="radio" style="display:none" value="1" name="button" onclick="changeColor1star()"><i class="icon-star-filled" name="button"></i></label>
//                            </div>

$contentLOG .= '    <h2> Tutaj możesz dodać opinię </h2>
                    
                    <div id="slideshow">
                        <img src="images/home1.jpg" alt="home1" class="active">
                        <img src="images/home2.jpg" alt="home2" >
                        <img src="images/home3.jpg" alt="home3" >
                    </div>
                    <br><br>
                    <form action="scripts/addOpinion.php" method="post"> 
                        <div class="textLeft">
                            <p>Model:</p>
                            <input type="text" name="name" class="textLeft" required><br>
                            <div style="display:inline-block">
                                <p>Kategoria:</p>
                                <select name="category" class="textLeft" onchange="change(value)">
                                    <option selected disabled hidden>Wybierz kategorię</option>
                                    <option value="Telewizory">Telewizory</option>
                                    <option value="Komputery i laptopy">Komputery i laptopy</option>
                                    <option value="Telefony i smartfony">Telefony i smartfony</option>
                                    <option value="Urządzenia peryferyjne">Urządzenia peryferyjne</option>
                                    <option value="Podzespoły">Podzespoły</option>
                                    <option value="Aparaty i kamery">Aparaty i kamery</option>    
                                </select>
                            </div>
                            <div style="display:inline-block; margin-left: 20px;" id="brand"></div>
                            
                            <div id="detailedStars1"><p><br></p></div>
                            <div class="rating" id="stars1" name="stars">
                                <label><input type="radio" style="display:none" value="5" name="detailedButton1" onclick="changeColor5starDetailed1()"><i class="icon-star-filled-detailed" name="detailedButton1"></i></label>
                                <label><input type="radio" style="display:none" value="4" name="detailedButton1" onclick="changeColor4starDetailed1()"><i class="icon-star-filled-detailed" name="detailedButton1"></i></label>
                                <label><input type="radio" style="display:none" value="3" name="detailedButton1" onclick="changeColor3starDetailed1()"><i class="icon-star-filled-detailed" name="detailedButton1"></i></label>
                                <label><input type="radio" style="display:none" value="2" name="detailedButton1" onclick="changeColor2starDetailed1()"><i class="icon-star-filled-detailed" name="detailedButton1"></i></label>
                                <label><input type="radio" style="display:none" value="1" name="detailedButton1" onclick="changeColor1starDetailed1()"><i class="icon-star-filled-detailed" name="detailedButton1"></i></label>
                            </div>
                            <div id="detailedStars2"><p><br></p></div>
                            <div class="rating" id="stars2" name="stars">
                                <label><input type="radio" style="display:none" value="5" name="detailedButton2" onclick="changeColor5starDetailed2()"><i class="icon-star-filled-detailed" name="detailedButton2"></i></label>
                                <label><input type="radio" style="display:none" value="4" name="detailedButton2" onclick="changeColor4starDetailed2()"><i class="icon-star-filled-detailed" name="detailedButton2"></i></label>
                                <label><input type="radio" style="display:none" value="3" name="detailedButton2" onclick="changeColor3starDetailed2()"><i class="icon-star-filled-detailed" name="detailedButton2"></i></label>
                                <label><input type="radio" style="display:none" value="2" name="detailedButton2" onclick="changeColor2starDetailed2()"><i class="icon-star-filled-detailed" name="detailedButton2"></i></label>
                                <label><input type="radio" style="display:none" value="1" name="detailedButton2" onclick="changeColor1starDetailed2()"><i class="icon-star-filled-detailed" name="detailedButton2"></i></label>
                            </div>
                            <div id="detailedStars3"><p><br></p></div>
                            <div class="rating" id="stars3" name="stars">
                                <label><input type="radio" style="display:none" value="5" name="detailedButton3" onclick="changeColor5starDetailed3()"><i class="icon-star-filled-detailed" name="detailedButton3"></i></label>
                                <label><input type="radio" style="display:none" value="4" name="detailedButton3" onclick="changeColor4starDetailed3()"><i class="icon-star-filled-detailed" name="detailedButton3"></i></label>
                                <label><input type="radio" style="display:none" value="3" name="detailedButton3" onclick="changeColor3starDetailed3()"><i class="icon-star-filled-detailed" name="detailedButton3"></i></label>
                                <label><input type="radio" style="display:none" value="2" name="detailedButton3" onclick="changeColor2starDetailed3()"><i class="icon-star-filled-detailed" name="detailedButton3"></i></label>
                                <label><input type="radio" style="display:none" value="1" name="detailedButton3" onclick="changeColor1starDetailed3()"><i class="icon-star-filled-detailed" name="detailedButton3"></i></label>
                            </div>
                            <div id="detailedStars4"><p><br></p></div>
                            <div class="rating" id="stars4" name="stars">
                                <label><input type="radio" style="display:none" value="5" name="detailedButton4" onclick="changeColor5starDetailed4()"><i class="icon-star-filled-detailed" name="detailedButton4"></i></label>
                                <label><input type="radio" style="display:none" value="4" name="detailedButton4" onclick="changeColor4starDetailed4()"><i class="icon-star-filled-detailed" name="detailedButton4"></i></label>
                                <label><input type="radio" style="display:none" value="3" name="detailedButton4" onclick="changeColor3starDetailed4()"><i class="icon-star-filled-detailed" name="detailedButton4"></i></label>
                                <label><input type="radio" style="display:none" value="2" name="detailedButton4" onclick="changeColor2starDetailed4()"><i class="icon-star-filled-detailed" name="detailedButton4"></i></label>
                                <label><input type="radio" style="display:none" value="1" name="detailedButton4" onclick="changeColor1starDetailed4()"><i class="icon-star-filled-detailed" name="detailedButton4"></i></label>
                            </div>
                            <br>
                            <p>Twoja opinia:<p>
                            <textarea rows="9" name="review" class="textLeft" required></textarea><br>
                            <input type="submit" value="Dodaj opinię" class="textLeft"><br>                                                
                        </div>
                    </form>   
                      
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

if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 1) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 1) {
    $contentLOG .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 1) {
    $contentLOG .= $reviews;
}
if (!isset($_POST['sort']) && $status == 1) {
    $contentLOG .= $reviews;
}

if (isset($_SESSION['logged']) && $status == 2) { // info o zalogowaniu
    $contentAdmin .= '<div class="textCenter">' . $_SESSION['logged'] . '</div>';
    unset($_SESSION['logged']);
}
if (isset($_SESSION['added']) && $status == 2) { // info o dodaniu opinii
    $contentAdmin .= '<div class="textCenter">' . $_SESSION['added'] . '</div>';
    unset($_SESSION['added']);
}
if (isset($_SESSION['rem']) && $status == 2) { // info o usunięciu opinii
    $contentAdmin .= '<div class="textCenter">' . $_SESSION['rem'] . '</div>';
    unset($_SESSION['rem']);
}
$contentAdmin .= '                        
                    <h2> Tutaj możesz dodać opinię </h2>
                    
                    <div id="slideshow">
                        <img src="images/home1.jpg" alt="home1" class="active">
                        <img src="images/home2.jpg" alt="home2" >
                        <img src="images/home3.jpg" alt="home3" >
                    </div>
                    <br><br>
                    <form action="scripts/addOpinion.php" method="post"> 
                        <div class="textLeft">
                            <p>Model:</p>
                            <input type="text" name="name" class="textLeft" required><br>
                            <div style="display:inline-block">
                                <p>Kategoria:</p>
                                <select name="category" class="textLeft" onchange="change(value)">
                                    <option selected disabled hidden>Wybierz kategorię</option>
                                    <option value="Telewizory">Telewizory</option>
                                    <option value="Komputery i laptopy">Komputery i laptopy</option>
                                    <option value="Telefony i smartfony">Telefony i smartfony</option>
                                    <option value="Urządzenia peryferyjne">Urządzenia peryferyjne</option>
                                    <option value="Podzespoły">Podzespoły</option>
                                    <option value="Aparaty i kamery">Aparaty i kamery</option>    
                                </select>
                            </div>
                            <div style="display:inline-block; margin-left: 20px;" id="brand"></div>
                            
                            <div id="detailedStars1"><p><br></p></div>
                            <div class="rating" id="stars1" name="stars">
                                <label><input type="radio" style="display:none" value="5" name="detailedButton1" onclick="changeColor5starDetailed1()"><i class="icon-star-filled-detailed" name="detailedButton1"></i></label>
                                <label><input type="radio" style="display:none" value="4" name="detailedButton1" onclick="changeColor4starDetailed1()"><i class="icon-star-filled-detailed" name="detailedButton1"></i></label>
                                <label><input type="radio" style="display:none" value="3" name="detailedButton1" onclick="changeColor3starDetailed1()"><i class="icon-star-filled-detailed" name="detailedButton1"></i></label>
                                <label><input type="radio" style="display:none" value="2" name="detailedButton1" onclick="changeColor2starDetailed1()"><i class="icon-star-filled-detailed" name="detailedButton1"></i></label>
                                <label><input type="radio" style="display:none" value="1" name="detailedButton1" onclick="changeColor1starDetailed1()"><i class="icon-star-filled-detailed" name="detailedButton1"></i></label>
                            </div>
                            <div id="detailedStars2"><p><br></p></div>
                            <div class="rating" id="stars2" name="stars">
                                <label><input type="radio" style="display:none" value="5" name="detailedButton2" onclick="changeColor5starDetailed2()"><i class="icon-star-filled-detailed" name="detailedButton2"></i></label>
                                <label><input type="radio" style="display:none" value="4" name="detailedButton2" onclick="changeColor4starDetailed2()"><i class="icon-star-filled-detailed" name="detailedButton2"></i></label>
                                <label><input type="radio" style="display:none" value="3" name="detailedButton2" onclick="changeColor3starDetailed2()"><i class="icon-star-filled-detailed" name="detailedButton2"></i></label>
                                <label><input type="radio" style="display:none" value="2" name="detailedButton2" onclick="changeColor2starDetailed2()"><i class="icon-star-filled-detailed" name="detailedButton2"></i></label>
                                <label><input type="radio" style="display:none" value="1" name="detailedButton2" onclick="changeColor1starDetailed2()"><i class="icon-star-filled-detailed" name="detailedButton2"></i></label>
                            </div>
                            <div id="detailedStars3"><p><br></p></div>
                            <div class="rating" id="stars3" name="stars">
                                <label><input type="radio" style="display:none" value="5" name="detailedButton3" onclick="changeColor5starDetailed3()"><i class="icon-star-filled-detailed" name="detailedButton3"></i></label>
                                <label><input type="radio" style="display:none" value="4" name="detailedButton3" onclick="changeColor4starDetailed3()"><i class="icon-star-filled-detailed" name="detailedButton3"></i></label>
                                <label><input type="radio" style="display:none" value="3" name="detailedButton3" onclick="changeColor3starDetailed3()"><i class="icon-star-filled-detailed" name="detailedButton3"></i></label>
                                <label><input type="radio" style="display:none" value="2" name="detailedButton3" onclick="changeColor2starDetailed3()"><i class="icon-star-filled-detailed" name="detailedButton3"></i></label>
                                <label><input type="radio" style="display:none" value="1" name="detailedButton3" onclick="changeColor1starDetailed3()"><i class="icon-star-filled-detailed" name="detailedButton3"></i></label>
                            </div>
                            <div id="detailedStars4"><p><br></p></div>
                            <div class="rating" id="stars4" name="stars">
                                <label><input type="radio" style="display:none" value="5" name="detailedButton4" onclick="changeColor5starDetailed4()"><i class="icon-star-filled-detailed" name="detailedButton4"></i></label>
                                <label><input type="radio" style="display:none" value="4" name="detailedButton4" onclick="changeColor4starDetailed4()"><i class="icon-star-filled-detailed" name="detailedButton4"></i></label>
                                <label><input type="radio" style="display:none" value="3" name="detailedButton4" onclick="changeColor3starDetailed4()"><i class="icon-star-filled-detailed" name="detailedButton4"></i></label>
                                <label><input type="radio" style="display:none" value="2" name="detailedButton4" onclick="changeColor2starDetailed4()"><i class="icon-star-filled-detailed" name="detailedButton4"></i></label>
                                <label><input type="radio" style="display:none" value="1" name="detailedButton4" onclick="changeColor1starDetailed4()"><i class="icon-star-filled-detailed" name="detailedButton4"></i></label>
                            </div>
                            <br>
                            <p>Twoja opinia:<p>
                            <textarea rows="9" name="review" class="textLeft" required></textarea><br>
                            <input type="submit" value="Dodaj opinię" class="textLeft"><br>                                                
                        </div>
                    </form>   
                      
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

if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 2) { // sortowanie opinii
    $contentAdmin .= $sortBestAdmin;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 2) {
    $contentAdmin .= $sortWorstAdmin;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 2) {
    $contentAdmin .= $reviewsAdmin;
}
if (!isset($_POST['sort']) && $status == 2) {
    $contentAdmin .= $reviewsAdmin;
}

$content .= '         
                <h2>Aby dodać opinię musisz się zalogować!</h2>  
                
                <div id="slideshow">
                    <img src="images/home1.jpg" alt="home1" class="active">
                    <img src="images/home2.jpg" alt="home2" >
                    <img src="images/home3.jpg" alt="home3" >
                </div>
            <br><br>
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

if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco') { // sortowanie opinii
    $content .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco') {
    $content .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze') {
    $content .= $reviews;
}
if (!isset($_POST['sort'])) {
    $content .= $reviews;
}