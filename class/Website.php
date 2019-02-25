<?php
include_once 'scripts/class/Database.php'; // cel: zmienne $content $contentLOG $contentAdmin

class Website {

    protected $log;
    protected $content;
    protected $contentLOG;
    protected $contentAdmin;
    protected $title = "Opinius";
    protected $keywords = "Opinie, komputery, laptopy, smartfony, IT, technologie";

    //interfejs klasy – metody modyfikujące fragmenty strony
    public function set_content($new_content) {
        $this->content = $new_content;
    }

    public function set_contentLOG($new_contentLOG) {
        $this->contentLOG = $new_contentLOG;
    }

    public function set_contentAdmin($new_contentAdmin) {
        $this->contentAdmin = $new_contentAdmin;
    }

    function set_title($new_title) {
        $this->title = $new_title;
    }

    public function set_keywords($new_slowa) {
        $this->keywords = $new_slowa;
    }

    public function set_style($url) {
        echo '<link rel="stylesheet" href=' . $url . ' type="text/css" />';
    }

    //interfejs klasy – funkcje wyświetlające stronę
    public function display() {
        $this->display_html();
        $this->content();
    }

    public function display_title() {
        echo "<title>$this->title</title>";
    }

    public function display_keywords() {
        echo "<meta name=\"keywords\" contents=\"$this->keywords\">";
    }

    public function menu() {
        if ($this->log == True) {
            ?>

            <div class="menu">
                <ul>
                    <li> <a href="?site=index">Opinie</a> </li>
                    <li> <a href="#">Kategorie <i class="icon-down-open"></i></a> 
                        <ul>
                            <li> <a href="?site=Tvs">Telewizory</a> </li>
                            <li> <a href="?site=Computers">Komputery i laptopy</a> </li>
                            <li> <a href="?site=Phones">Telefony i smartfony</a> </li>
                            <li> <a href="?site=Peripherals">Urządzenia peryferyjne</a> </li>
                            <li> <a href="?site=Components">Podzespoły</a> </li>
                            <li> <a href="?site=Accessories">Akcesoria</a> </li>
                        </ul>
                    </li> 
                    <li> <a href="?site=OurGoal">Nasz cel</a> </li>
                    <li> <a href="#">Więcej <i class="icon-down-open"></i></a> 
                        <ol class="secondUL">
                            <li> <a href="?site=Contact">Kontakt</a> </li>
                            <li> <a href="?site=Contact">Inna podstrona</a> </li>    
                        </ol>
                    </li>             
                    <li> <a href="scripts/Login.php?akcja=wyloguj">Wyloguj</a> </li>
                    <li> <a href="?site=Settings"><i class="icon-cog-alt"></i></a> </li>                          
                </ul>
            </div>
            <?php
        } else {
            ?>

            <div class="menu">
                <ul>
                    <li> <a href="?site=index">Opinie</a> </li>
                    <li> <a href="#">Kategorie <i class="icon-down-open"></i></a> 
                        <ul>
                            <li> <a href="?site=Tvs">Telewizory</a> </li>
                            <li> <a href="?site=Computers">Komputery i laptopy</a> </li>
                            <li> <a href="?site=Phones">Telefony i smartfony</a> </li>
                            <li> <a href="?site=Peripherals">Urządzenia peryferyjne</a> </li>
                            <li> <a href="?site=Components">Podzespoły</a> </li>
                            <li> <a href="?site=Accessories">Akcesoria</a> </li>
                        </ul>
                    </li> 
                    <li> <a href="?site=OurGoal">Nasz cel</a> </li>
                    <li> <a href="#">Więcej <i class="icon-down-open"></i></a> 
                        <ol class="secondUL">
                            <li> <a href="?site=Contact">Kontakt</a> </li>
                            <li> <a href="?site=Contact">Inna podstrona</a> </li>    
                        </ol>
                    </li> 
                    <li> <a href="?site=Login">Logowanie</a> </li>
                    <li> <a href="?site=Settings"><i class="icon-cog-alt"></i></a> </li>
                </ul>
            </div>
            <?php
        }
    }

    public function left_menu() {
        ?>

        <div id="left">
            <a href="?site=index" style="text-decoration: none;">
                <div id="logo">
                    <div class="opinius"><span style="color:red">O</span>pinius</div>
                    <div class="logoText">Łatwiejsze wybory z każdym dniem</div>
                    <div class="star">
                        <i class="icon-star-filled"></i><i class="icon-star-filled"></i><i class="icon-star-filled"></i><i class="icon-star-filled"></i><i class="icon-star"></i>
                    </div>
                </div></a>
            <div class="examples">
                Przykłady fałszywych opinii znajdziesz poniżej<br>                    
            </div>
            <div class="examples2">
                <i class="icon-down"></i><i class="icon-down"></i><i class="icon-down"></i><i class="icon-down"></i><i class="icon-down"></i>
            </div>
            <div class="fakeReviews">                                      
                <div class="frLink">
                    <a href="https://strefakursow.pl/kursy/programowanie/kurs_c_od_zera_do_bohatera.html" target="_blank">strefakursow.pl</a><br>
                </div>
                <div class="frDestination">
                    <a href="index.php?site=BritishCouncil">Dowiedz się więcej <i class="icon-right"></i></a>
                </div>
                <div class="frPhoto" style="text-align: center;">
                    <a href="index.php?site=BritishCouncil"><img src="images/strefaKursów.jpg" alt="Brak zdjęcia" width="85%" height="155px"></img></a>
                </div>
            </div>
            <div class="fakeReviews">                                      
                <div class="frLink">
                    <a href="https://nonacne.pl/opinie-klientow.html" target="_blank">nonacne.pl</a><br>
                </div>
                <div class="frDestination">
                    <a href="index.php?site=BritishCouncil">Dowiedz się więcej <i class="icon-right"></i></a>
                </div>
                <div class="frPhoto">
                    <a href="index.php?site=BritishCouncil"><img src="images/nonacne.jpg" alt="Brak zdjęcia" width="100%" height="175px"></img></a>
                </div>
            </div>
            <div class="fakeReviews">                                      
                <div class="frLink">
                    <a href="https://www.britishcouncil.pl/road-success-first-and-advanced?_ga=2.153140408.1673976468.1549381039-1215084853.1549283412" target="_blank">britishcouncil.pl</a><br>
                </div>
                <div class="frDestination">
                    <a href="index.php?site=BritishCouncil">Dowiedz się więcej <i class="icon-right"></i></a>
                </div>
                <div class="frPhoto">
                    <a href="index.php?site=BritishCouncil"><img src="images/britishCouncil.jpg" alt="Brak zdjęcia" width="100%" height="175px"></img></a>
                </div>
            </div>
            <div class="fakeReviews" style="height: 290px">                                      
<!--                <div class="frLink">-->
                    <div class="text">Zauważyłeś stronę z fałszywymi opiniami w internecie?<br><br>
                        Nie czekaj ani chwili dłużej.<br><br>
                        Skontaktuj się z adminem, a zostaną dodane w tej sekcji!</div>
                <!--</div>-->
                <div class="frDestination2">
                    <a href="index.php?site=Contact">Skontaktuj się <i class="icon-right"></i></a>
                </div>
            </div>
        </div>

        <?php
    }

    public function display_html() {


        if (!isset($_SESSION)) {
            session_start();
        }

        $this->log = '';
        if (isset($_SESSION['log'])) {
            $this->log = $_SESSION['log'];
        }
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset=UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=true">
                <link href="css/fontello.css" rel="stylesheet" type="text/css" />
                <link href="css/style.css" rel="stylesheet" type="text/css" />
                <script src='https://www.google.com/recaptcha/api.js'></script>

                <?php
                $this->display_title();
                echo "</head><body>";
            }

            public function socials() {
                ?>
            <div class="socials">
                <div class="socialdivs">
                    <a href="https://www.facebook.com/" target="_blank"left><div class="fb">
                            <i class="icon-facebook"></i>                        
                        </div></a>

                    <a href="https://www.youtube.com/" target="_blank"><div class="yt">
                            <i class="icon-youtube"></i>
                        </div></a>
                    <a href="https://twitter.com/?lang=pl" target="_blank"><div class="tw">
                            <i class="icon-twitter"></i>
                        </div></a>
                    <a href="https://plus.google.com/discover" target="_blank"><div class="gplus">
                            <i class="icon-gplus"></i>
                        </div></a>
                    <div style="clear:both"></div>
                </div>
            </div>
            <?php
        }

        public function footer() {
            echo '<div id="footer"><p>Copyright © www.opinius.pl</p></div>';
        }

        public function content() {

            echo '<div id="container">';
            $this->menu();
            echo '<div id="middle"> ';
            $this->left_menu();
            echo '<div id="right">';
            $db = new Database("localhost", "root", "", "klienci");
            $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));
            if ($this->log == True && $status == 1) {
                echo $this->contentLOG;
            } else if ($this->log == True && $status == 2) {
                echo $this->contentAdmin;
            } else {
                echo $this->content;
            }
            echo "</div></div>";
            $this->socials();
            $this->footer();
            echo "</div>";
            echo '</body></html>';
        }

    }
    