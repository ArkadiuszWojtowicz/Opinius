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
            
            $tresc = "<table width='100%' class='table'><tbody>"; 

            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];
                $p5 = $pola[5];
                if($row->$p5==1){
                    $new = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($row->$p5==2){
                    $new = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($row->$p5==3){
                    $new = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($row->$p5==4){
                    $new = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                if($row->$p5==5){
                    $new = "<i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i><i class='icon-star-filled-display' style='color:yellow' name='button'></i>";
                }
                
                $tresc .= "
                            <tr> 
                              <th rowspan='4' height='275' width='170'><br>Użytkownik:<br><br>" . $row->$p1 . "<br><br><br><br><br><br>ID opinii: " . $row->$p0 . "</th>
                              <th height='40'>" . $row->$p2 . "</th>   
                            </tr>
                            <tr>    
                              <th height='40'>" . $row->$p3 . "</th>    
                            </tr>       
                            <tr>    
                              <th height='40'>" . $new . "</th>    
                            </tr>
                            <tr>    
                              <td>" . $row->$p4 . "</td>    
                            </tr>
                            <tr>    
                               <td  colspan='2' class='reviewSpace'></td>    
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

            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];

                $IdComment = $row->$p0;// <th rowspan='3' height='275' width='150'>ID opinii: " . $row->$p0 . "<br><br>Użytkownik:<br>" . $row->$p1 . "<br><br><br><br><form action ='scripts/removeOpinion.php' method='post'>Usuń komentarz:<br><input type='submit' value='" . $IdComment . "' class='rem' name='rem'> </form></th>
//                $y=$db->DELETE("DELETE FROM items WHERE (`id-item` = '$IdComment')");
                $tresc .= "
                            <tr> 
                              <th rowspan='3' height='275' width='150'>ID opinii: " . $row->$p0 . "<br><br>Użytkownik:<br>" . $row->$p1 . "<br><br><br><br><form action ='scripts/removeOpinion.php' method='post'>Usuń komentarz:<br><input type='submit' value='" . $IdComment . "' class='rem' name='rem'> </form></th>"
                        . "   <th height='40'>" . $row->$p2 . "</th>   
                            </tr>
                            <tr>    
                              <th height='40'>" . $row->$p3 . "</th>    
                            </tr>
                            <tr>    
                              <td>" . $row->$p4 . "</td>    
                            </tr>
                            <tr>    
                               <td width='580' colspan='2' class='reviewSpace'></td>    
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
