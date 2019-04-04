<?php
include_once 'scripts/class/database.php'; // cel: zmienne $content $contentLOG $contentAdmin

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
        $db = new Database("localhost", "root", "", "opinius");
        $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));
        if ($this->log == TRUE && $status == 1) {
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
                    <li> <a href="?site=Contact">Kontakt</a> </li>           
                    <li> <a href="scripts/Login.php?akcja=wyloguj">Wyloguj</a> </li>
                    <li> <a href="?site=Settings"><i class="icon-cog-alt"></i></a> </li>                          
                </ul>
            </div>
            <?php
        } else if ($this->log == TRUE && $status == 2) {
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
                    <li> <a href="?site=Contact">Prawa admina</a> </li>           
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
                    <li> <a href="?site=Contact">Kontakt</a> </li>
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
<!--                <div id="logo">
                    <div class="opinius"><span style="color:red">O</span>pinius</div>
                    <div class="logoText">Łatwiejsze wybory z każdym dniem</div>
                    <div class="star">
                        <i class="icon-star-filled"></i><i class="icon-star-filled"></i><i class="icon-star-filled"></i><i class="icon-star-filled"></i><i class="icon-star"></i>
                    </div>
                </div>-->
                <div id="slideLogo">
                    <div id='logo'>
                        <div class="opinius"><span style="color:red">O</span>pinius</div>
                        <div class="logoText">Łatwiejsze wybory z każdym dniem</div>
                        <div class="star">
                            <i class="icon-star-filled s1"></i>
                            <i class="icon-star-filled s2"></i>
                            <i class="icon-star-filled s3"></i>
                            <i class="icon-star-filled s4"></i>
                            <i class="icon-star-filled s5"></i>
                        </div>
                    </div>
                </div>
            </a>
            <div class="fakeReviews">                                      
                <div class="frLink">
                    <a href="index.php?site=Tvs">Telewizory</a><br>
                </div>
                <div class="frDestination">
                    <a href="index.php?site=Tvs">Dowiedz się więcej <i class="icon-right"></i></a>
                </div>
                <div class="frPhoto" style="text-align: center;">
                    <a href="index.php?site=Tvs"><img src="images/tv.jpg" alt="Brak zdjęcia" width="100%" height="175px"></img></a>
                </div>
            </div>
            <div class="fakeReviews">                                      
                <div class="frLink">
                    <a href="index.php?site=Computers">Komputery i laptopy</a><br>
                </div>
                <div class="frDestination">
                    <a href="index.php?site=Computers">Dowiedz się więcej <i class="icon-right"></i></a>
                </div>
                <div class="frPhoto">
                    <a href="index.php?site=Computers"><img src="images/comp.jpg" alt="Brak zdjęcia" width="100%" height="175px"></img></a>
                </div>
            </div>
            <div class="fakeReviews">                                      
                <div class="frLink">
                    <a href="index.php?site=Phones">Telefony i smartfony</a><br>
                </div>
                <div class="frDestination">
                    <a href="index.php?site=Phones">Dowiedz się więcej <i class="icon-right"></i></a>
                </div>
                <div class="frPhoto">
                    <a href="index.php?site=Phones"><img src="images/phones.jpg" alt="Brak zdjęcia" width="100%" height="175px"></img></a>
                </div>
            </div>
            <div class="fakeReviews">                                      
                <div class="frLink">
                    <a href="index.php?site=Peripherals">Urządzenia peryferyjne</a><br>
                </div>
                <div class="frDestination">
                    <a href="index.php?site=Peripherals">Dowiedz się więcej <i class="icon-right"></i></a>
                </div>
                <div class="frPhoto" style="text-align: center;">
                    <a href="index.php?site=Peripherals"><img src="images/peri.jpg" alt="Brak zdjęcia" width="100%" height="175px"></img></a>
                </div>
            </div>
            <div class="fakeReviews">                                      
                <div class="frLink">
                    <a href="index.php?site=Components">Podzespoły</a><br>
                </div>
                <div class="frDestination">
                    <a href="index.php?site=Components">Dowiedz się więcej <i class="icon-right"></i></a>
                </div>
                <div class="frPhoto">
                    <a href="index.php?site=Components"><img src="images/components.jpg" alt="Brak zdjęcia" width="100%" height="175px"></img></a>
                </div>
            </div>
            <div class="fakeReviews">                                      
                <div class="frLink">
                    <a href="index.php?site=Accessories">Akcesoria</a><br>
                </div>
                <div class="frDestination">
                    <a href="index.php?site=Accessories">Dowiedz się więcej <i class="icon-right"></i></a>
                </div>
                <div class="frPhoto">
                    <a href="index.php?site=Accessories"><img src="images/accessories.jpg" alt="Brak zdjęcia" width="100%" height="175px"></img></a>
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
                <script src="js/jquery-3.3.1.min.js"></script>
                <script type="text/javascript" src="js/slide.js"></script>

                <?php
                $this->display_title();
                echo "</head><body>";
            }

            public function socials() {
                ?>
            <div class="socials">
                <div class="socialdivs">
                    <a href="https://www.facebook.com/" target="_blank"><div class="fb">
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
            echo '<div class="footer"><p>Copyright © www.opinius.pl</p></div>';
        }

        public function content() {

            $this->menu();
            $this->left_menu();
            echo '<div id="right">';
            $db = new Database("localhost", "root", "", "opinius");
            $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));
            if ($this->log == True && $status == 1) {
                echo $this->contentLOG;
            } else if ($this->log == True && $status == 2) {
                echo $this->contentAdmin;
            } else {
                echo $this->content;
            }
            echo "</div>";
            $this->socials();
            $this->footer();


            echo '</body></html>';
        }

    }
    