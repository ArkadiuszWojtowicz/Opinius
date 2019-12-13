<?php
//klasa do obsługi bazy danych
class Database {

    public $mysqli;
//konstruktor bazy danych
    public function __construct($serwer, $user, $pass, $baza) {
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);

        if ($this->mysqli->connect_errno) {
            printf("Nie udało się połączyć z serwerem: %s\n", $this->mysqli->connect_error);
            exit();
        }
        $this->mysqli->set_charset("utf8");
    }
//destruktor bazy danych    
    function __destruct() {
        $this->mysqli->close();
    }
//metoda wyświetlajaca dane z bazy
    public function select($sql, $pola) {
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola);
            $content = "";
            while ($row = $result->fetch_object()) {
                for ($i = 0; $i < $ilepol; $i++) {
                    $p = $pola[$i];
                    $content = $row->$p;
                }
            }
        } else {
            echo "Błąd przy odczycie danych z bazy";
        }
        $result->close();
        return $content;
    }
//metoda wyświetlająca opinie dla zwykłego użytkownika
    public function displayReviews($sql, $pola) { // ODPOWIADA ZA WYSWIETLANIE TABELI Z OPINIAMI NA STRONIE GLOWNEJ
        if ($result = $this->mysqli->query($sql)) {

            $content = "<table class='table' width='100%'><tbody>";
            $stars1 = "";
            $stars2 = "";
            $stars3 = "";
            $stars4 = "";
            $detailedStars1 = "";
            $detailedStars2 = "";
            $detailedStars3 = "";
            $detailedStars4 = "";
            $average1 = 1;
            $average2 = 2;
            $average3 = 3;
            $average4 = 4;

            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];
                $p5 = $pola[5];

                if (isset($pola[6])) {
                    $p6 = $pola[6];
                    $detailedStars1 = $row->$p6;
                    $average1 = $row->$p6;
                }
                if (isset($pola[7])) {
                    $p7 = $pola[7];
                    $detailedStars2 = $row->$p7;
                    $average2 = $row->$p7;
                }
                if (isset($pola[8])) {
                    $p8 = $pola[8];
                    $detailedStars3 = $row->$p8;
                    $average3 = $row->$p8;
                }
                if (isset($pola[9])) {
                    $p9 = $pola[9];
                    $detailedStars4 = $row->$p9;
                    $average4 = $row->$p9;
                }


                $average = ($average1 + $average2 + $average3 + $average4) / 4;
                $number = "";
                if ($average == 5) {
                    $number = "<div style='display:inline-block'>5.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow;' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4.75) {
                    $number = "<div style='display:inline-block'>4.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4.5) {
                    $number = "<div style='display:inline-block'>4.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4.25) {
                    $number = "<div style='display:inline-block'>4.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4) {
                    $number = "<div style='display:inline-block'>4.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3.75) {
                    $number = "<div style='display:inline-block'>3.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3.5) {
                    $number = "<div style='display:inline-block'>3.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3.25) {
                    $number = "<div style='display:inline-block'>3.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3) {
                    $number = "<div style='display:inline-block'>3.0</div>";
                    $average = "</i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2.75) {
                    $number = "<div style='display:inline-block'>2.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2.5) {
                    $number = "<div style='display:inline-block'>2.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2.25) {
                    $number = "<div style='display:inline-block'>2.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2) {
                    $number = "<div style='display:inline-block'>2.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1.75) {
                    $number = "<div style='display:inline-block'>1.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1.5) {
                    $number = "<div style='display:inline-block'>1.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1.25) {
                    $number = "<div style='display:inline-block'>1.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1) {
                    $number = "<div style='display:inline-block'>1.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }


                if ($detailedStars1 == 1) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 2) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 3) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 4) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 5) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 1) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 2) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 3) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 4) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 5) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 1) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 2) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 3) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 4) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 5) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 1) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 2) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 3) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 4) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 5) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }

                $detail1 = "";
                $detail2 = "";
                $detail3 = "";
                $detail4 = "";

                if ($row->$p3 === "Telefony i smartfony") {
                    $detail1 = "Funkcjonalność:";
                    $detail2 = "Bateria:";
                    $detail3 = "Zdjęcia:";
                    $detail4 = "Wyświetlacz:";
                }
                if ($row->$p3 === "Komputery i laptopy") {
                    $detail1 = "Wydajność:";
                    $detail2 = "Wykonanie:";
                    $detail3 = "Wyświetlacz:";
                    $detail4 = "Funkcjonalność:";
                }
                if ($row->$p3 === "Telewizory") {
                    $detail1 = "Obraz:";
                    $detail2 = "Dźwięk:";
                    $detail3 = "Funkcjonalność:";
                    $detail4 = "Wygląd:";
                }
                if ($row->$p3 === "Podzespoły") {
                    $detail1 = "Wydajność:";
                    $detail2 = "Wykonanie:";
                    $detail3 = "Kultura pracy:";
                    $detail4 = "Wygląd:";
                }
                if ($row->$p3 === "Aparaty i kamery") {
                    $detail1 = "Jakość zdjęć:";
                    $detail2 = "Funkcjonalność:";
                    $detail3 = "Wygląd:";
                    $detail4 = "Bateria:";
                }
                $image = "";
                if (isset($pola[10])) {
                    $p10 = $pola[10];
                    $image = base64_encode($row->$p10);
                }

                 $content .= "
                            <tr > 
                              <th rowspan='9' height='275' width='170' style='border-left: none;margin-left:0'>ID opinii: " . $row->$p0 . 
                              "<br><br><br><br><br><br><br><br><img src='data:image/jpeg;base64," . $image . "' style='max-width: 150px; max-height:300px; min-width:150px; min-height:150px;'/>"
                              . "<br><br><br><br><br><br><br><br><br><br>Użytkownik:<br><br>" . $row->$p1 . "</th>
                              <th height='40'  colspan='2' style='border-right: none; text-align:left'>Model: </th>   
                              <th height='40'  colspan='2' style='border-left: none; text-align:right'>" . $row->$p2 . "</th>  
                            </tr>
                            <tr >    
                              <th height='40' colspan='2' style='border-right: none; text-align:left'>Kategoria:</th>
                              <th height='40' colspan='2' style='border-left: none; text-align:right'>" . $row->$p3 . "</th>
                            </tr>
                            <tr>
                              <th height='40' colspan='2' style='border-right: none; text-align:left'>Marka:</th>
                              <th height='40' colspan='2' style='border-left: none; text-align:right'>" . $row->$p4 . "</th>    
                            </tr>       
                            <tr >    
                              <th height='40' colspan='2' style='border-right: none; text-align:left;'>Średnia ocena:</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right;'>" . $number . $average . "</</th>    
                            </tr>
                            <tr>    
                              <th height='40'  colspan='2' style='border-right: none; text-align:left'>" . $detail1 . "</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right'>" . $stars1 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40'  colspan='2' style='border-right: none; text-align:left'>" . $detail2 . "</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right'>" . $stars2 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40'  colspan='2' style='border-right: none; text-align:left'>" . $detail3 . "</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right'>" . $stars3 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' colspan='2' style='border-right: none; text-align:left'>" . $detail4 . "</th>
                              <th height='40' colspan='2' style='border-left: none; text-align:right'>" . $stars4 . "</th>    
                            </tr>
                            <tr>    
                              <td colspan='4'>" . $row->$p5 . "</td>  
                            </tr>
                            <tr>    
                               <td colspan='5' class='reviewSpace'></td>    
                            </tr>      
                        ";
            }
        } else {
            echo "Błąd przy odczycie danych z bazy";
        }
        $content .= "</tbody></table>";
        $result->close();
        return $content;
    }
//metoda wyświetlająca opinie zalogowanego użytkownika z możliwością edycji
    public function editReviews($sql, $pola) {
        if ($result = $this->mysqli->query($sql)) {

            $content = "<table class='table'><tbody>";
            $stars1 = "";
            $stars2 = "";
            $stars3 = "";
            $stars4 = "";
            $detailedStars1 = "";
            $detailedStars2 = "";
            $detailedStars3 = "";
            $detailedStars4 = "";
            $average1 = 1;
            $average2 = 2;
            $average3 = 3;
            $average4 = 4;

            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];
                $p5 = $pola[5];

                if (isset($pola[6])) {
                    $p6 = $pola[6];
                    $detailedStars1 = $row->$p6;
                    $average1 = $row->$p6;
                }
                if (isset($pola[7])) {
                    $p7 = $pola[7];
                    $detailedStars2 = $row->$p7;
                    $average2 = $row->$p7;
                }
                if (isset($pola[8])) {
                    $p8 = $pola[8];
                    $detailedStars3 = $row->$p8;
                    $average3 = $row->$p8;
                }
                if (isset($pola[9])) {
                    $p9 = $pola[9];
                    $detailedStars4 = $row->$p9;
                    $average4 = $row->$p9;
                }


                $average = ($average1 + $average2 + $average3 + $average4) / 4;
                $number = "";
                if ($average == 5) {
                    $number = "<div style='display:inline-block'>5.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow;' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4.75) {
                    $number = "<div style='display:inline-block'>4.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4.5) {
                    $number = "<div style='display:inline-block'>4.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4.25) {
                    $number = "<div style='display:inline-block'>4.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4) {
                    $number = "<div style='display:inline-block'>4.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3.75) {
                    $number = "<div style='display:inline-block'>3.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3.5) {
                    $number = "<div style='display:inline-block'>3.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3.25) {
                    $number = "<div style='display:inline-block'>3.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3) {
                    $number = "<div style='display:inline-block'>3.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2.75) {
                    $number = "<div style='display:inline-block'>2.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2.5) {
                    $number = "<div style='display:inline-block'>2.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2.25) {
                    $number = "<div style='display:inline-block'>2.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2) {
                    $number = "<div style='display:inline-block'>2.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1.75) {
                    $number = "<div style='display:inline-block'>1.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1.5) {
                    $number = "<div style='display:inline-block'>1.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1.25) {
                    $number = "<div style='display:inline-block'>1.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1) {
                    $number = "<div style='display:inline-block'>1.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }


                if ($detailedStars1 == 1) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 2) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 3) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 4) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 5) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 1) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 2) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 3) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 4) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 5) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 1) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 2) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 3) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 4) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 5) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 1) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 2) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 3) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 4) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 5) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }

                $detail1 = "";
                $detail2 = "";
                $detail3 = "";
                $detail4 = "";

                if ($row->$p3 === "Telefony i smartfony") {
                    $detail1 = "Funkcjonalność:";
                    $detail2 = "Bateria:";
                    $detail3 = "Zdjęcia:";
                    $detail4 = "Wyświetlacz:";
                }
                if ($row->$p3 === "Komputery i laptopy") {
                    $detail1 = "Wydajność:";
                    $detail2 = "Wykonanie:";
                    $detail3 = "Wyświetlacz:";
                    $detail4 = "Funkcjonalność:";
                }
                if ($row->$p3 === "Telewizory") {
                    $detail1 = "Obraz:";
                    $detail2 = "Dźwięk:";
                    $detail3 = "Funkcjonalność:";
                    $detail4 = "Wygląd:";
                }
                if ($row->$p3 === "Podzespoły") {
                    $detail1 = "Wydajność:";
                    $detail2 = "Wykonanie:";
                    $detail3 = "Kultura pracy:";
                    $detail4 = "Wygląd:";
                }
                if ($row->$p3 === "Aparaty i kamery") {
                    $detail1 = "Jakość zdjęć:";
                    $detail2 = "Funkcjonalność:";
                    $detail3 = "Wygląd:";
                    $detail4 = "Bateria:";
                }
                
                $image = "";
                if (isset($pola[10])) {
                    $p10 = $pola[10];
                    $image = base64_encode($row->$p10);
                }
                
                $IdComment = $row->$p0; // do edycji opinii
     

                $content .= "
                            <tr > 
                              <th rowspan='9' height='275' width='170' style='border-left: none;margin-left:0'>ID opinii: " . $row->$p0 . "<br><br><br><br><br><br><br><br><img src='data:image/jpeg;base64," . $image . "' style='max-width: 150px; max-height:300px;'/><br><br><br><br><button type='submit' class='edit' value='" . $IdComment . "' name='editID' onclick='editReview($IdComment)'>Edytuj</button><br><br><br><br>Użytkownik:<br><br>" . $row->$p1 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>Model: </th>   
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $row->$p2 . "</th>  
                            </tr>
                            <tr >    
                              <th height='40' colspan='2' style='border-right: none; text-align:left'>Kategoria:</th>
                              <th height='40' colspan='2' style='border-left: none; text-align:right'>" . $row->$p3 . "</th>
                            </tr>
                            <tr>
                              <th height='40' colspan='2' style='border-right: none; text-align:left'>Marka:</th>
                              <th height='40' colspan='2' style='border-left: none; text-align:right'>" . $row->$p4 . "</th>    
                            </tr>       
                            <tr >    
                              <th height='40' colspan='2' style='border-right: none; text-align:left;'>Średnia ocena:</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right;'>" . $number . $average . "</</th>    
                            </tr>
                            <tr>    
                              <th height='40'  colspan='2' style='border-right: none; text-align:left'>" . $detail1 . "</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right'>" . $stars1 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40'  colspan='2' style='border-right: none; text-align:left'>" . $detail2 . "</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right'>" . $stars2 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40'  colspan='2' style='border-right: none; text-align:left'>" . $detail3 . "</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right'>" . $stars3 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' colspan='2' style='border-right: none; text-align:left'>" . $detail4 . "</th>
                              <th height='40' colspan='2' style='border-left: none; text-align:right'>" . $stars4 . "</th>    
                            </tr>
                            <tr>    
                              <td colspan='4'>" . $row->$p5 . "</td>  
                            </tr>
                            <tr>    
                               <td colspan='5' class='reviewSpace'></td>    
                            </tr>      
                        ";
            }
        } else {
            echo "Błąd przy odczycie danych z bazy";
        }
        $content .= "</tbody></table>";
        $result->close();
        return $content;
    }
//metoda wyświetlająca opinie dla administratora z możliwością usuwania
    public function selectAdmin($sql, $pola) { 
        if ($result = $this->mysqli->query($sql)) {

            $content = "<table class='table'><tbody>";
            $stars1 = "";
            $stars2 = "";
            $stars3 = "";
            $stars4 = "";
            $detailedStars1 = "";
            $detailedStars2 = "";
            $detailedStars3 = "";
            $detailedStars4 = "";
            $average1 = 1;
            $average2 = 2;
            $average3 = 3;
            $average4 = 4;

            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];
                $p5 = $pola[5];

                if (isset($pola[6])) {
                    $p6 = $pola[6];
                    $detailedStars1 = $row->$p6;
                    $average1 = $row->$p6;
                }
                if (isset($pola[7])) {
                    $p7 = $pola[7];
                    $detailedStars2 = $row->$p7;
                    $average2 = $row->$p7;
                }
                if (isset($pola[8])) {
                    $p8 = $pola[8];
                    $detailedStars3 = $row->$p8;
                    $average3 = $row->$p8;
                }
                if (isset($pola[9])) {
                    $p9 = $pola[9];
                    $detailedStars4 = $row->$p9;
                    $average4 = $row->$p9;
                }


                $average = ($average1 + $average2 + $average3 + $average4) / 4;
                $number = "";
                if ($average == 5) {
                    $number = "<div style='display:inline-block'>5.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow;' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4.75) {
                    $number = "<div style='display:inline-block'>4.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4.5) {
                    $number = "<div style='display:inline-block'>4.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4.25) {
                    $number = "<div style='display:inline-block'>4.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 4) {
                    $number = "<div style='display:inline-block'>4.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3.75) {
                    $number = "<div style='display:inline-block'>3.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3.5) {
                    $number = "<div style='display:inline-block'>3.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3.25) {
                    $number = "<div style='display:inline-block'>3.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 3) {
                    $number = "<div style='display:inline-block'>3.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2.75) {
                    $number = "<div style='display:inline-block'>2.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2.5) {
                    $number = "<div style='display:inline-block'>2.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2.25) {
                    $number = "<div style='display:inline-block'>2.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }
                if ($average == 2) {
                    $number = "<div style='display:inline-block'>2.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1.75) {
                    $number = "<div style='display:inline-block'>1.75</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display75' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1.5) {
                    $number = "<div style='display:inline-block'>1.5</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display50' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1.25) {
                    $number = "<div style='display:inline-block'>1.25</div>";
                    $average = "<div style='display:inline-block'><i class='icon-star-display25' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($average == 1) {
                    $number = "<div style='display:inline-block'>1.0</div>";
                    $average = "<i class='icon-star-display' style='color:yellow' name='button'></i></div>";
                }


                if ($detailedStars1 == 1) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 2) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 3) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 4) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars1 == 5) {
                    $stars1 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 1) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 2) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 3) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 4) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars2 == 5) {
                    $stars2 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 1) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 2) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 3) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 4) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars3 == 5) {
                    $stars3 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 1) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 2) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 3) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 4) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }
                if ($detailedStars4 == 5) {
                    $stars4 = "<i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i><i class='icon-star-display' style='color:yellow' name='button'></i>";
                }

                $detail1 = "";
                $detail2 = "";
                $detail3 = "";
                $detail4 = "";

                if ($row->$p3 === "Telefony i smartfony") {
                    $detail1 = "Funkcjonalność:";
                    $detail2 = "Bateria:";
                    $detail3 = "Zdjęcia:";
                    $detail4 = "Wyświetlacz:";
                }
                if ($row->$p3 === "Komputery i laptopy") {
                    $detail1 = "Wydajność:";
                    $detail2 = "Wykonanie:";
                    $detail3 = "Wyświetlacz:";
                    $detail4 = "Funkcjonalność:";
                }
                if ($row->$p3 === "Telewizory") {
                    $detail1 = "Obraz:";
                    $detail2 = "Dźwięk:";
                    $detail3 = "Funkcjonalność:";
                    $detail4 = "Wygląd:";
                }
                if ($row->$p3 === "Podzespoły") {
                    $detail1 = "Wydajność:";
                    $detail2 = "Wykonanie:";
                    $detail3 = "Kultura pracy:";
                    $detail4 = "Wygląd:";
                }
                if ($row->$p3 === "Aparaty i kamery") {
                    $detail1 = "Jakość zdjęć:";
                    $detail2 = "Funkcjonalność:";
                    $detail3 = "Wygląd:";
                    $detail4 = "Bateria:";
                }
                
                $image = "";
                if (isset($pola[10])) {
                    $p10 = $pola[10];
                    $image = base64_encode($row->$p10);
                }
                
                $IdComment = $row->$p0;

                $content .= "
                            <tr > 
                              <th rowspan='9' height='275' width='170' style='border-left: none;margin-left:0'>ID opinii: " . $row->$p0 . "<br><br><br><br><br><br><br><br><img src='data:image/jpeg;base64," . $image . "' style='max-width: 150px; max-height:300px;'/><br><br><br><br><form action ='scripts/removeOpinion.php' method='post'><br><button type='submit' value='" . $IdComment . "' class='rem' name='rem'>Usuń opinię</button></form><br><br>Użytkownik:<br><br>" . $row->$p1 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>Model: </th>   
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $row->$p2 . "</th>  
                            </tr>
                            <tr >    
                              <th height='40' colspan='2' style='border-right: none; text-align:left'>Kategoria:</th>
                              <th height='40' colspan='2' style='border-left: none; text-align:right'>" . $row->$p3 . "</th>
                            </tr>
                            <tr>
                              <th height='40' colspan='2' style='border-right: none; text-align:left'>Marka:</th>
                              <th height='40' colspan='2' style='border-left: none; text-align:right'>" . $row->$p4 . "</th>    
                            </tr>       
                            <tr >    
                              <th height='40' colspan='2' style='border-right: none; text-align:left;'>Średnia ocena:</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right;'>" . $number . $average . "</</th>    
                            </tr>
                            <tr>    
                              <th height='40'  colspan='2' style='border-right: none; text-align:left'>" . $detail1 . "</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right'>" . $stars1 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40'  colspan='2' style='border-right: none; text-align:left'>" . $detail2 . "</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right'>" . $stars2 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40'  colspan='2' style='border-right: none; text-align:left'>" . $detail3 . "</th>
                              <th height='40'  colspan='2' style='border-left: none; text-align:right'>" . $stars3 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' colspan='2' style='border-right: none; text-align:left'>" . $detail4 . "</th>
                              <th height='40' colspan='2' style='border-left: none; text-align:right'>" . $stars4 . "</th>    
                            </tr>
                            <tr>    
                              <td colspan='4'>" . $row->$p5 . "</td>  
                            </tr>
                            <tr>    
                               <td colspan='5' class='reviewSpace'></td>    
                            </tr>      
                        ";
            }
        } else {
            echo "<p>Błąd przy odczycie danych ::USER</p>";
        }
        $content .= "</tbody></table>";
        $result->close();
        return $content;
    }
//metoda odpowiedzialna za wstawianie danych do bazy
    public function insert($sql) {
        $ret = true;
        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
        } else {
            $ret = false;
            echo "Błąd podczas dodawania do bazy";
        }
        return $ret;
    }
//metoda odpowiedzialna za aktualizację danych w bazie
    public function UPDATE($sql) {
        $ret = true;
        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
        } else {
            $ret = false;
            echo "Błąd podczas updatowania do bazy";
        }
        return $ret;
    }
//metoda odpowiedzialna za usuwanie danych do bazy
    public function DELETE($sql) {
        $ret = true;
        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
        } else {
            $ret = false;
            echo "Błąd podczas kasowania danych z bazy";
        }
        return $ret;
    }
//metoda odpowiedzialna za usuwanie danych do bazy po id użytkownika
    public function deleteById($userId, $table) {
        $sql = "DELETE FROM $table WHERE userId ='$userId'";
        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
        } else {
            echo "Błąd podczas kasowania:: deleteBYId";
        }
    }
//metoda odpowiedzialna za wybieranie poszczególnego użytkownika
    public function selectUser($login, $passwd, $table) {
        $ret = -1;
        $hashedpass = hash('ripemd160', $passwd);
        if ($result = $this->mysqli->query("SELECT * FROM $table WHERE nick='$login' AND passwd='$hashedpass' LIMIT 1")) {
            if (mysqli_num_rows($result) > 0) {
                $row = $result->fetch_object();
                $ret = $row->id;
            }
        }
        return $ret;
    }
}
