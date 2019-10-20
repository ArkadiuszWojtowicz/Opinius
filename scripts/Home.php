<?php

if (!isset($_SESSION)) {
    session_start();
}

$title = "Opinius";

include_once 'class/database.php';
include_once 'class/userManager.php';

$db = new Database("localhost", "root", "", "opinius");

$opinie = $db->displayReviews("SELECT `id-item`, nick, name, category, review, star from items ORDER BY `id-item` DESC", array("id-item", "nick", "name", "category", "review", "star"));
$opinieAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, review from items ORDER BY `id-item` DESC", array("id-item", "nick", "name", "category", "review"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       

$contentAdmin = '';
$contentLOG = '';
$content = '';

if (isset($_SESSION['logged']) && $status == 1) { // info o zalogowaniu
    $contentLOG .= '<div class="textCenter">' . $_SESSION['logged'] . '</div>';
    unset($_SESSION['logged']);
}
if (isset($_SESSION['loggedOut']) && $status !=1 && status !=2) { // info o wylogowaniu
    $content .= '<div class="textCenter">' . $_SESSION['loggedOut'] . '</div>';
    unset($_SESSION['loggedOut']);
}
if (isset($_SESSION['added']) && $status == 1) { // info o dodaniu opinii
    $contentLOG .= '<div class="textCenter">' . $_SESSION['added'] . '</div>';
    unset($_SESSION['added']);
}

$contentLOG .= '    <h2> Tutaj możesz dodać opinię </h2>
                    
                    <div id="slideshow">
                        <img src="images/home1.jpg" alt="home1" class="active">
                        <img src="images/home2.jpg" alt="home2" >
                        <img src="images/home3.jpg" alt="home3" >
                    </div>
                    <br><br>
                    <form action="scripts/addOpinion.php" method="post"> 
                        <div class="textLeft">
                            <p>Nazwa przedmiotu:</p>
                            <input type="text" name="name" class="textLeft" required><br>
                            <p>Kategoria:</p>
                            <select name="category" class="textLeft">
                                <option>Telewizory</option>
                                <option>Komputery i laptopy</option>
                                <option>Telefony i smartfony</option>
                                <option>Urządzenia peryferyjne</option>
                                <option>Podzespoły</option>
                                <option>Aparaty i kamery</option>    
                            </select><br>
                            <p>Twoja ocena:</p>
                            <div class="rating" id="stars">
                                <label><input type="radio" style="display:none" value="5" name="button" onclick="changeColor5star()"><i class="icon-star-filled" name="button"></i></label>
                                <label><input type="radio" style="display:none" value="4" name="button" onclick="changeColor4star()"><i class="icon-star-filled" name="button"></i></label>
                                <label><input type="radio" style="display:none" value="3" name="button" onclick="changeColor3star()"><i class="icon-star-filled" name="button"></i></label>
                                <label><input type="radio" style="display:none" value="2" name="button" onclick="changeColor2star()"><i class="icon-star-filled" name="button"></i></label>
                                <label><input type="radio" style="display:none" value="1" name="button" onclick="changeColor1star()"><i class="icon-star-filled" name="button"></i></label>
                            </div>
                            <p>Twoja opinia:<p>
                            <textarea rows="9" name="review" class="textLeft" required></textarea><br>
                            <input type="submit" value="Dodaj opinię" class="textLeft"><br>                                                
                        </div>
                    </form>    
                ' . $opinie;



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
                            <p>Nazwa przedmiotu:</p>
                            <input type="text" name="name" class="textLeft" required><br>
                            <p>Kategoria:</p>
                            <select name="category" class="textLeft">
                                <option>Telewizory</option>
                                <option>Komputery i laptopy</option>
                                <option>Telefony i smartfony</option>
                                <option>Urządzenia peryferyjne</option>
                                <option>Podzespoły</option>
                                <option>Aparaty i kamery</option>    
                            </select><br>
                            <p>Twoja opinia:<p>
                            <textarea rows="9" name="review" class="textLeft" required></textarea><br>
                            <input type="submit" value="Dodaj opinię" class="textLeft"><br>                                                
                        </div>
                    </form> 
                ' . $opinieAdmin;

$content .= '         
                <h2>Aby dodać opinię musisz się zalogować!</h2>  
                
                <div id="slideshow">
                    <img src="images/home1.jpg" alt="home1" class="active">
                    <img src="images/home2.jpg" alt="home2" >
                    <img src="images/home3.jpg" alt="home3" >
                </div>
            <br><br>
            ' . $opinie;
