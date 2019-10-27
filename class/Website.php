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

            <nav>
                <ul>
                    <li> <a href="?site=index">Opinie</a> </li>
                    <li> <a href="#">Kategorie <i class="icon-down-open"></i></a> 
                        <ul>
                            <li> <a href="?site=Tvs">Telewizory</a> </li>
                            <li> <a href="?site=Computers">Komputery i laptopy</a> </li>
                            <li> <a href="?site=Phones">Telefony i smartfony</a> </li>
                            <li> <a href="?site=Peripherals">Urządzenia peryferyjne</a> </li>
                            <li> <a href="?site=Components">Podzespoły</a> </li>
                            <li> <a href="?site=Cameras">Aparaty i kamery</a> </li>
                        </ul>
                    </li> 
                    <li> <a href="?site=OurGoal">Nasz cel</a> </li>
                    <li> <a href="?site=Contact">Kontakt</a> </li>           
                    <li> <a href="scripts/Login.php?akcja=wyloguj">Wyloguj</a> </li>
                    <li> <a href="?site=Settings"><i class="icon-cog-alt"></i></a> </li>                          
                </ul>
            </nav>
            <?php
        } else if ($this->log == TRUE && $status == 2) {
            ?>

            <nav>
                <ul>
                    <li> <a href="?site=index">Opinie</a> </li>
                    <li> <a href="#">Kategorie <i class="icon-down-open"></i></a> 
                        <ul>
                            <li> <a href="?site=Tvs">Telewizory</a> </li>
                            <li> <a href="?site=Computers">Komputery i laptopy</a> </li>
                            <li> <a href="?site=Phones">Telefony i smartfony</a> </li>
                            <li> <a href="?site=Peripherals">Urządzenia peryferyjne</a> </li>
                            <li> <a href="?site=Components">Podzespoły</a> </li>
                            <li> <a href="?site=Cameras">Aparaty i kamery</a> </li>
                        </ul>
                    </li> 
                    <li> <a href="?site=OurGoal">Nasz cel</a> </li>
                    <li> <a href="?site=Contact">Prawa admina</a> </li>           
                    <li> <a href="scripts/Login.php?akcja=wyloguj">Wyloguj</a> </li>
                    <li> <a href="?site=Settings"><i class="icon-cog-alt"></i></a> </li>                          
                </ul>
            </nav>
            <?php
        } else {
            ?>

            <nav>
                <ul>
                    <li> <a href="?site=index">Opinie</a> </li>
                    <li> <a href="#">Kategorie <i class="icon-down-open"></i></a> 
                        <ul>
                            <li> <a href="?site=Tvs">Telewizory</a> </li>
                            <li> <a href="?site=Computers">Komputery i laptopy</a> </li>
                            <li> <a href="?site=Phones">Telefony i smartfony</a> </li>
                            <li> <a href="?site=Peripherals">Urządzenia peryferyjne</a> </li>
                            <li> <a href="?site=Components">Podzespoły</a> </li>
                            <li> <a href="?site=Cameras">Aparaty i kamery</a> </li>
                        </ul>
                    </li> 
                    <li> <a href="?site=OurGoal">Nasz cel</a> </li>
                    <li> <a href="?site=Contact">Kontakt</a> </li>
                    <li> <a href="?site=Login">Logowanie</a> </li>
                    <li> <a href="?site=Settings"><i class="icon-cog-alt"></i></a> </li>
                </ul>
            </nav>
            <?php
        }
    }

    public function logo() {
        ?>

        <a href="?site=index" style="text-decoration: none;">
            <div id="slideLogo">
                <div id='logo'>
                    <div class="opinius"><span style="color:red">O</span>pinius</div>
                    <div class="logoText">Łatwiejsze wybory z każdym dniem</div>
                    <div class="star">
                        <i class="icon-star-filled-slide s1"></i>
                        <i class="icon-star-filled-slide s2"></i>
                        <i class="icon-star-filled-slide s3"></i>
                        <i class="icon-star-filled-slide s4"></i>
                        <i class="icon-star-filled-slide s5"></i>
                    </div>
                </div>
            </div>
        </a>

        <?php
    }

    public function brands() {

        if ($this->title == "Telewizory" || $this->title == "Telewizory Samsung" || $this->title == "Telewizory LG" || $this->title == "Telewizory Panasonic" || $this->title == "Telewizory Toshiba" || $this->title == "Telewizory Thomson" || $this->title == "Telewizory Philips" || $this->title == "Telewizory Manta") {
            ?>     

            <div class="fakeReviews" style="height:480px">        
                <form action="" method="post">
                    <div class="frLink">
                        <a href="index.php?site=TvsSamsung">Samsung <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=TvsLG">LG <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=TvsPanasonic">Panasonic <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=TvsToshiba">Toshiba <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=TvsThomson">Thomson <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=TvsPhilips">Philips <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=TvsManta">Manta <i class="icon-right"></i></a><br>
                    </div>
                </form>
            </div>

            <?php
        }
        if ($this->title == "Komputery i laptopy" || $this->title == "Komputery i laptopy Acer" || $this->title == "Komputery i laptopy Apple" || $this->title == "Komputery i laptopy Asus" || $this->title == "Komputery i laptopy Dell" || $this->title == "Komputery i laptopy HP" || $this->title == "Komputery i laptopy Lenovo" || $this->title == "Komputery i laptopy MSI") {
            ?>
            <div class="fakeReviews" style="height:480px;">        
                <form action="" method="post">
                    <div class="frLink">
                        <a href="index.php?site=ComputersLenovo">Lenovo <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=ComputersAcer">Acer <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=ComputersApple">Apple <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=ComputersAsus">Asus <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=ComputersDell">Dell <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=ComputersHP">HP <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=ComputersMSI">MSI <i class="icon-right"></i></a><br>
                    </div>
                </form>
            </div>
            <?php
        }
        if ($this->title == "Telefony i smartfony" || $this->title == "Telefony i smartfony Xiaomi" || $this->title == "Telefony i smartfony LG" || $this->title == "Telefony i smartfony Apple" || $this->title == "Telefony i smartfony Samsung" || $this->title == "Telefony i smartfony Huawei" || $this->title == "Telefony i smartfony Nokia") {
            ?>
            <div class="fakeReviews" style="height:415px;">        
                <form action="" method="post">
                    <div class="frLink">
                        <a href="index.php?site=PhonesXiaomi">Xiaomi <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=PhonesLG">LG <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=PhonesApple">Apple <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=PhonesSamsung">Samsung <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=PhonesHuawei">Huawei <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=PhonesNokia">Nokia <i class="icon-right"></i></a><br>
                    </div>
                </form>
            </div>
            <?php
        }
        if ($this->title == "Urządzenia peryferyjne" || $this->title == "Urządzenia peryferyjne Canon" || $this->title == "Urządzenia peryferyjne Logitech" || $this->title == "Urządzenia peryferyjne Rival" || $this->title == "Urządzenia peryferyjne Media-Tech" || $this->title == "Urządzenia peryferyjne Philips" || $this->title == "Urządzenia peryferyjne DeskJet") {
            ?>
            <div class="fakeReviews" style="height:415px;">        
                <form action="" method="post">
                    <div class="frLink">
                        <a href="index.php?site=PeripheralsCanon">Canon <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=PeripheralsLogitech">Logitech <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=PeripheralsRival">Rival <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=PeripheralsMedia-Tech">Media-Tech <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=PeripheralsPhilips">Philips <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=PeripheralsDeskJet">DeskJet <i class="icon-right"></i></a><br>
                    </div>
                </form>
            </div>
            <?php
        }
        if ($this->title == "Podzespoły" || $this->title == "Podzespoły Intel" || $this->title == "Podzespoły AMD" || $this->title == "Podzespoły MSI" || $this->title == "Podzespoły GeForce" || $this->title == "Podzespoły GTX") {
            ?>
            <div class="fakeReviews" style="height:350px;">        
                <form action="" method="post">
                    <div class="frLink">
                        <a href="index.php?site=ComponentsIntel">Intel <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=ComponentsAMD">AMD <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=ComponentsMSI">MSI <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=ComponentsGeForce">GeForce <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=ComponentsGTX">GTX <i class="icon-right"></i></a><br>
                    </div>
                </form>
            </div>
            <?php
        }
        if ($this->title == "Aparaty i kamery" || $this->title == "Aparaty i kamery Canon" || $this->title == "Aparaty i kamery Nicon" || $this->title == "Aparaty i kamery Sony") {
            ?>
            <div class="fakeReviews" style="height:218px;">        
                <form action="" method="post">
                    <div class="frLink">
                        <a href="index.php?site=CamerasCanon">Canon <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=CamerasNicon">Nicon <i class="icon-right"></i></a><br>
                    </div>
                    <div class="frLink">
                        <a href="index.php?site=CamerasSony">Sony <i class="icon-right"></i></a><br>
                    </div>
                </form>
            </div>
            <?php
        }
    }

    public function left_menu() {

        $this->logo();
        $this->brands();

        if ($this->title != "Telewizory" && $this->title != "Telewizory Samsung" && $this->title != "Telewizory LG" && $this->title != "Telewizory Panasonic" && $this->title != "Telewizory Toshiba" && $this->title != "Telewizory Thomson" && $this->title != "Telewizory Philips" && $this->title != "Telewizory Manta") {
            ?>          
            <div class="fakeReviews" >                                      
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
            <?php
        }

        if ($this->title != "Komputery i laptopy" && $this->title != "Komputery i laptopy Acer" && $this->title != "Komputery i laptopy Apple" && $this->title != "Komputery i laptopy Asus" && $this->title != "Komputery i laptopy Dell" && $this->title != "Komputery i laptopy HP" && $this->title != "Komputery i laptopy Lenovo" && $this->title != "Komputery i laptopy MSI") {
            ?>
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
            <?php
        }
        if ($this->title != "Telefony i smartfony" && $this->title != "Telefony i smartfony Xiaomi" && $this->title != "Telefony i smartfony LG" && $this->title != "Telefony i smartfony Apple" && $this->title != "Telefony i smartfony Samsung" && $this->title != "Telefony i smartfony Huawei" && $this->title != "Telefony i smartfony Nokia") {
            ?>
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
            <?php
        }
        if ($this->title != "Urządzenia peryferyjne" && $this->title != "Urządzenia peryferyjne Canon" && $this->title != "Urządzenia peryferyjne Logitech" && $this->title != "Urządzenia peryferyjne Rival" && $this->title != "Urządzenia peryferyjne Media-Tech" && $this->title != "Urządzenia peryferyjne Philips" && $this->title != "Urządzenia peryferyjne DeskJet") {
            ?>
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
            <?php
        }
        if ($this->title != "Podzespoły" && $this->title != "Podzespoły Intel" && $this->title != "Podzespoły AMD" && $this->title != "Podzespoły MSI" && $this->title != "Podzespoły GeForce" && $this->title != "Podzespoły GTX") {
            ?>
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
            <?php
        }
        if ($this->title != "Aparaty i kamery" && $this->title != "Aparaty i kamery Canon" && $this->title != "Aparaty i kamery Nicon" && $this->title != "Aparaty i kamery Sony") {
            ?>
            <div class="fakeReviews">                                      
                <div class="frLink">
                    <a href="index.php?site=Cameras">Aparaty i kamery</a><br>
                </div>
                <div class="frDestination">
                    <a href="index.php?site=Cameras">Dowiedz się więcej <i class="icon-right"></i></a>
                </div>
                <div class="frPhoto">
                    <a href="index.php?site=Cameras"><img src="images/cameras.jpg" alt="Brak zdjęcia" width="100%" height="175px"></img></a>
                </div>
            </div>
            <?php
        }
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
            echo '<footer><p>Copyright © www.opinius.pl</p></footer>';
        }

        public function content() {

            $this->menu();
            echo '<aside>';
            $this->left_menu();
            echo '</aside>';
            echo '<section>';
            $db = new Database("localhost", "root", "", "opinius");
            $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));
            if ($this->log == True && $status == 1) {
                echo $this->contentLOG;
            } else if ($this->log == True && $status == 2) {
                echo $this->contentAdmin;
            } else {
                echo $this->content;
            }
            echo "</section>";
            $this->socials();
            $this->footer();

            echo '</body></html>';
        }

    }
    