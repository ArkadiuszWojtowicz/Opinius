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
            $ilepol = count($pola);
            
            
            
            $tresc = "<table width='104%' class='table'><tbody>"; //TU EDYTOWAC

            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];

                //TU EDYTOWAC
                
                $tresc .= "
                            <tr> 
                              <th rowspan='3' height='275' width='150'><br>Użytkownik:<br><br>" . $row->$p1 . "<br><br><br><br><br><br>ID opinii: " . $row->$p0 . "</th>
                              <th height='40'>" . $row->$p2 . "</th>   
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
            echo "Błąd przy odczycie danych z bazy";
        }
        $tresc .= "</tbody></table>";
        $result->close();
        return $tresc;
    }

    public function selectAdmin($sql, $pola) { // ODPOWIADA ZA WYSWIETLANIE TABELI Z OPINIAMI DLA ADMINA
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola);

            $tresc = "<table width='104%' class='table'><tbody>"; //TU EDYTOWAC
            $db = new Database("localhost", "root", "", "opinius");

            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];

                $xd = $row->$p0;
                $tresc .= "
                            <tr> 
                              <th rowspan='3' height='275' width='150'>ID opinii: " . $row->$p0 . "<br><br>Użytkownik:<br>" . $row->$p1 . "<br><br><form action ='scripts/removeOpinion.php' method='post'>Usuń komentarz:<br><input type='submit' value='" . $xd . "' class='rem' name='rem'> </form></th>
                              <th height='40'>" . $row->$p2 . "</th>   
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

    public function rozw($sql, $pola) {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola);

            $tresc .= ""; //TU EDYTOWAC

            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];
                $x0 = $row->$p0;
                $x1 = $row->$p1;
                $x2 = $row->$p2;
                $x3 = $row->$p3;
                $x4 = $row->$p4;

                //TU EDYTOWAC   DELETE FROM items WHERE review = '$row->$p4'
                $db = new Database("localhost", "root", "", "opinius");
                static $i = 1; // ZABECZPIECZENIE PRZED USUNIECIEM WSZYSTKICH REKORDÓW // USUWANA JEST JEDNA OPINIA
                while ($i == 1) {
                    $db->DELETE("DELETE FROM items WHERE (`id-item` = '$x0')");
                    header("location: ../index.php");
                    $i++;
                }
            }
        } else {
            echo "Błąd przy odczycie danych z bazy";
        }
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
        echo "SELECT * FROM $table WHERE userName='$login' AND passwd='$hashedpass' LIMIT 1";
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
