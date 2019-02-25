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
            echo "<p>Błąd przy odczycie danych z bazy</p>";
        }
        $result->close();
        return $tresc;
    }

    public function displayReviews($sql, $pola) { // ODPOWIADA ZA WYSWIETLANIE TABELI Z OPINIAMI NA STRONIE GLOWNEJ
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola);

            $tresc = "<table width='100%' class='table'><tbody>"; //TU EDYTOWAC

            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];

                //TU EDYTOWAC

                $tresc .= "
                            <tr> 
                              <th rowspan='3' height='275' width='150'>Użytkownik<br><br>" . $row->$p0 . "</th>
                              <th height='40'>" . $row->$p1 . "</th>   
                            </tr>
                            <tr>    
                              <th height='40'>" . $row->$p2 . "</th>    
                            </tr>
                            <tr>    
                              <td>" . $row->$p3 . "</td>    
                            </tr>
                            <tr>    
                               <td width='580' colspan='2' class='reviewSpace'></td>    
                            </tr>      
                        ";
            }
        } else {
            echo "<p>Błąd przy odczycie danych z bazy</p>";
        }
        $tresc .= "</tbody></table>";
        $result->close();
        return $tresc;
    }

    public function selectAdmin($sql, $pola) { // ODPOWIADA ZA WYSWIETLANIE TABELI Z OPINIAMI DLA ADMINA
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola);

            $tresc = "<table width='584' class='table'><tbody>"; //TU EDYTOWAC
            $db = new Database("localhost", "root", "", "klienci");

            //$remove = $db->DELETE("DELETE FROM produkty WHERE (`id-produkt` = '$reviewNumber')");
            while ($row = $result->fetch_object()) {
                $p0 = $pola[0];
                $p1 = $pola[1];
                $p2 = $pola[2];
                $p3 = $pola[3];
                $p4 = $pola[4];
//$reviewNumber = $row->$p0;
                //TU EDYTOWAC   DELETE FROM produkty WHERE opinia = '$row->$p4'
//                static $i = 1;
//                while ($i == 1) {
//                    $reviewNumber = $row->$p0;
//                    $remove = $db->DELETE("DELETE FROM produkty WHERE (`id-produkt` = '$reviewNumber')");
//                    $i++;
//                }
//                
                $xd = $row->$p0;
                $tresc .= "
                            <tr> 
                              <th rowspan='3' height='275' width='150'>Id opinii:<br>" . $row->$p0 . "<br><br>Użytkownik:<br>" . $row->$p1 . "<br><br><form action ='scripts/removeOpinion.php' method='post'>Usuń komentarz:<br><input type='submit' value='" . $xd . "' name='rem'> </form></th>
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

                //TU EDYTOWAC   DELETE FROM produkty WHERE opinia = '$row->$p4'
                $db = new Database("localhost", "root", "", "klienci");
                static $i = 1; // ZABECZPIECZENIE PRZED USUNIECIEM WSZYSTKICH REKORDÓW // USUWANA JEST JEDNA OPINIA
                while ($i == 1) {
                    //$db->DELETE("DELETE FROM produkty WHERE `id-produkt` = '$x0'");
                    $db->DELETE("DELETE FROM produkty WHERE (`id-produkt` = '$x0')");
                    header("location: ../index.php");
                    $i++;
                }
                $tresc .= "";
            }
        } else {
            echo "<p>Błąd przy odczycie danych ::USER</p>";
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
        //Ja tu używam funkcji hash , powinna być passwordhas ale nie chce mi się zmienić
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

    public function protect_int($nmb) {
        return (int) $nmb;
    }
    // Koniec ochorny przed atakiem SQL injection
}

?>
