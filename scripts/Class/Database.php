<?php 
class Database {

    public $mysqli;

    public function __construct($serwer, $user, $pass, $baza) {
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);

        if ($this->mysqli->connect_errno) {
            printf("Nie udało się połączyć z serwerem: %s\n", $this->mysqli->connect_error);
            exit();
        }
        $this->mysqli->set_charset("utf8");
    }

    function __destruct() {
        $this->mysqli->close();
    }

    public function select($sql, $pola) {
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola);
            $tresc = "";
            while ($row = $result->fetch_object()) {
                for ($i = 0; $i < $ilepol; $i++) {
                    $p = $pola[$i];
                    $tresc = $row->$p;
                }
            }
        } else {
            echo "Błąd przy odczycie danych z bazy";
        }
        $result->close();
        return $tresc;
    }

    public function displayReviews($sql, $pola) { // ODPOWIADA ZA WYSWIETLANIE TABELI Z OPINIAMI NA STRONIE GLOWNEJ
        if ($result = $this->mysqli->query($sql)) {         
            
            $tresc = "<table class='table'><tbody>"; 
            $stars1 = "";
            $stars2 = "";
            $stars3 = "";
            $stars4 = "";
            $detailedStars1 = "";
            $detailedStars2 = "";
            $detailedStars3 = "";
            $detailedStars4 = "";
            $average1=1;
            $average2=2;
            $average3=3;
            $average4=4;
            
            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];
                $p5 = $pola[5];
                
                if(isset($pola[6])){
                    $p6 = $pola[6];
                    $detailedStars1 = $row->$p6;
                    $average1 = $row->$p6;
                }
                if(isset($pola[7])){
                    $p7 = $pola[7];
                    $detailedStars2 = $row->$p7;
                    $average2 = $row->$p7;
                }
                if(isset($pola[8])){
                    $p8 = $pola[8];
                    $detailedStars3 = $row->$p8;
                    $average3 = $row->$p8;
                }
                if(isset($pola[9])){
                    $p9 = $pola[9];
                    $detailedStars4 = $row->$p9;
                    $average4 = $row->$p9;
                }
                

                $average = ($average1 + $average2 + $average3 + $average4) / 4;
                
                if($detailedStars1==1){
                    $stars1 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars1==2){
                    $stars1 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars1==3){
                    $stars1 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars1==4){
                    $stars1 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars1==5){
                    $stars1 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars2==1){
                    $stars2 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars2==2){
                    $stars2 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars2==3){
                    $stars2 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars2==4){
                    $stars2 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars2==5){
                    $stars2 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars3==1){
                    $stars3 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars3==2){
                    $stars3 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars3==3){
                    $stars3 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars3==4){
                    $stars3 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars3==5){
                    $stars3 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars4==1){
                    $stars4 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars4==2){
                    $stars4 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars4==3){
                    $stars4 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars4==4){
                    $stars4 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars4==5){
                    $stars4 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                
                $detail1 = "";
                $detail2 = "";
                $detail3 = "";
                $detail4 = "";
                
                if($row->$p3 === "Telewizory"){
                    $detail1 = "Obraz:";
                    $detail2 = "Dźwięk:";
                    $detail3 = "Funkcje dodatkowe:";
                    $detail4 = "Wygląd:";
                }
                if($row->$p3 === "Komputery i laptopy"){
                    $detail1 = "Prędkość:";
                    $detail2 = "Dźwięk:";
                    $detail3 = "Podzespoły:";
                    $detail4 = "Klawiatura i obudowa:";
                }
                if($row->$p3 === "Telefony i smartfony"){
                    $detail1 = "Aparat:";
                    $detail2 = "Bateria:";
                    $detail3 = "Funkcje telefonu:";
                    $detail4 = "Wygląd:";
                }
                if($row->$p3 === "Urządzenia peryferyjne"){
                    $detail1 = "-:";
                    $detail2 = "Dźwięk:";
                    $detail3 = "Funkcje dodatkowe:";
                    $detail4 = "Wygląd:";
                }
                if($row->$p3 === "Podzespoły"){
                    $detail1 = "Prędkość:";
                    $detail2 = "Temperatura:";
                    $detail3 = "Kompatybilność:";
                    $detail4 = "Dodatkowe technologie:";
                }
                if($row->$p3 === "Aparaty i kamery"){
                    $detail1 = "Rozdzielczość:";
                    $detail2 = "Kontrola ekspozycji:";
                    $detail3 = "Przybliżenie optyczne:";
                    $detail4 = "Matryca:";
                }
                
                $tresc .= "
                            <tr width='50%'> 
                              <th rowspan='8' height='275' width='170' style='border-left: none;margin-left:0'>ID opinii: " . $row->$p0 . "<br><br><br>Użytkownik:<br><br>" . $row->$p1 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>Model: </th>   
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $row->$p2 . "</th>  
                            </tr>
                            <tr width='50%'>    
                              <th height='40' width='2%' style='border-right: none; text-align:left'>Kategoria:</th>
                              <th height='40' width='55%' style='border-left: none; text-align:right'>" . $row->$p3 . "</th>
                              <th height='40' width='10%' style='border-right: none; text-align:left'>Marka:</th>
                              <th height='40' width='44%' style='border-left: none; text-align:right'>" . $row->$p4 . "</th>    
                            </tr>       
                            <tr>    
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>Średnia ocena:</th>
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $average . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>" . $detail1 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $stars1 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>" . $detail2 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $stars2 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>" . $detail3 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $stars3 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>" . $detail4 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $stars4 . "</th>    
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
        $tresc .= "</tbody></table>";
        $result->close();
        return $tresc;
    }

    public function selectAdmin($sql, $pola) { // ODPOWIADA ZA WYSWIETLANIE TABELI Z OPINIAMI DLA ADMINA
        if ($result = $this->mysqli->query($sql)) {

            $tresc = "<table width='104%' class='table'><tbody>"; 
            $db = new Database("localhost", "root", "", "opinius");
            $stars1 = "";
            $stars2 = "";
            $stars3 = "";
            $stars4 = "";
            $detailedStars1 = "";
            $detailedStars2 = "";
            $detailedStars3 = "";
            $detailedStars4 = "";
            $average1=1;
            $average2=2;
            $average3=3;
            $average4=4;
            
            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];
                $p5 = $pola[5];
                
                if(isset($pola[6])){
                    $p6 = $pola[6];
                    $detailedStars1 = $row->$p6;
                    $average1 = $row->$p6;
                }
                if(isset($pola[7])){
                    $p7 = $pola[7];
                    $detailedStars2 = $row->$p7;
                    $average2 = $row->$p7;
                }
                if(isset($pola[8])){
                    $p8 = $pola[8];
                    $detailedStars3 = $row->$p8;
                    $average3 = $row->$p8;
                }
                if(isset($pola[9])){
                    $p9 = $pola[9];
                    $detailedStars4 = $row->$p9;
                    $average4 = $row->$p9;
                }
                

                $average = ($average1 + $average2 + $average3 + $average4) / 4;
                
                if($detailedStars1==1){
                    $stars1 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars1==2){
                    $stars1 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars1==3){
                    $stars1 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars1==4){
                    $stars1 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars1==5){
                    $stars1 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars2==1){
                    $stars2 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars2==2){
                    $stars2 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars2==3){
                    $stars2 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars2==4){
                    $stars2 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars2==5){
                    $stars2 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars3==1){
                    $stars3 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars3==2){
                    $stars3 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars3==3){
                    $stars3 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars3==4){
                    $stars3 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars3==5){
                    $stars3 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars4==1){
                    $stars4 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars4==2){
                    $stars4 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars4==3){
                    $stars4 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars4==4){
                    $stars4 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($detailedStars4==5){
                    $stars4 = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                
                $detail1 = "";
                $detail2 = "";
                $detail3 = "";
                $detail4 = "";
                
                if($row->$p3 === "Telewizory"){
                    $detail1 = "Obraz:";
                    $detail2 = "Dźwięk:";
                    $detail3 = "Funkcje dodatkowe:";
                    $detail4 = "Wygląd:";
                }
                if($row->$p3 === "Komputery i laptopy"){
                    $detail1 = "Prędkość:";
                    $detail2 = "Dźwięk:";
                    $detail3 = "Podzespoły:";
                    $detail4 = "Klawiatura i obudowa:";
                }
                if($row->$p3 === "Telefony i smartfony"){
                    $detail1 = "Aparat:";
                    $detail2 = "Bateria:";
                    $detail3 = "Funkcje telefonu:";
                    $detail4 = "Wygląd:";
                }
                if($row->$p3 === "Urządzenia peryferyjne"){
                    $detail1 = "-:";
                    $detail2 = "Dźwięk:";
                    $detail3 = "Funkcje dodatkowe:";
                    $detail4 = "Wygląd:";
                }
                if($row->$p3 === "Podzespoły"){
                    $detail1 = "Prędkość:";
                    $detail2 = "Temperatura:";
                    $detail3 = "Kompatybilność:";
                    $detail4 = "Dodatkowe technologie:";
                }
                if($row->$p3 === "Aparaty i kamery"){
                    $detail1 = "Rozdzielczość:";
                    $detail2 = "Kontrola ekspozycji:";
                    $detail3 = "Przybliżenie optyczne:";
                    $detail4 = "Matryca:";
                }
                $IdComment = $row->$p0;
                
                $tresc .= "
                            <tr width='50%'> 
                              <th rowspan='8' height='275' width='170' style='border-left: none;margin-left:0'>ID opinii: " . $row->$p0 . "<br><br><br>Użytkownik:<br><br>" . $row->$p1 . "<br><br><br><br><form action ='scripts/removeOpinion.php' method='post'><br><button type='submit' value='" . $IdComment . "' class='rem' name='rem'>Usuń opinię</button> </form></th>
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>Model: </th>   
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $row->$p2 . "</th>  
                            </tr>
                            <tr width='50%'>    
                              <th height='40' width='2%' style='border-right: none; text-align:left'>Kategoria:</th>
                              <th height='40' width='55%' style='border-left: none; text-align:right'>" . $row->$p3 . "</th>
                              <th height='40' width='10%' style='border-right: none; text-align:left'>Marka:</th>
                              <th height='40' width='44%' style='border-left: none; text-align:right'>" . $row->$p4 . "</th>    
                            </tr>       
                            <tr>    
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>Średnia ocena:</th>
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $average . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>" . $detail1 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $stars1 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>" . $detail2 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $stars2 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>" . $detail3 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $stars3 . "</th>    
                            </tr>
                            <tr>    
                              <th height='40' width='50%' colspan='2' style='border-right: none; text-align:left'>" . $detail4 . "</th>
                              <th height='40' width='50%' colspan='2' style='border-left: none; text-align:right'>" . $stars4 . "</th>    
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
        $tresc .= "</tbody></table>";
        $result->close();
        return $tresc;
    }

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

    public function deleteById($userId, $table) {
        $sql = "DELETE FROM $table WHERE userId ='$userId'";
        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
        } else {
            echo "Błąd podczas kasowania:: deleteBYId";
        }
    }

    public function selectUser($login, $passwd, $table) {
        $ret = -1;
        $hashedpass = hash('ripemd160', $passwd);
        if ($result = $this->mysqli->query("SELECT * FROM $table WHERE userName='$login' AND passwd='$hashedpass' LIMIT 1")) {
            if (mysqli_num_rows($result) > 0) {
                $row = $result->fetch_object();
                $ret = $row->id;
            }
        }
        return $ret;
    }

    // Ochrona przed atakiem SQL injection
    public function protect_string($str) {
        return $this->mysqli->real_escape_string($str);
    }

    // Ochrona przed atakiem SQL injection
    public function protect_int($nmb) {
        return (int) $nmb;
    }

}

?>
