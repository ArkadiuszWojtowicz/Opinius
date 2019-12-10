<?php 
class User {

    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;

    protected $nick;
    protected $passwd;
    protected $firstName;
    protected $surname;
    protected $emial;
    protected $date;
    protected $status;
//konstruktor klasy User
    function __construct($nick, $firstName, $surname, $email, $passwd) {
        $this->status = User::STATUS_USER;
        $this->nick = $nick;
        $this->surname = $surname;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->passwd = hash('ripemd160',$passwd);  //$this->passwd = password_hash($passwd, PASSWORD_DEFAULT); 
        $this->date = (new DateTime())->format("Y-m-d H:i:s");

    }
//metoda zapisująca dane do bazy
    function saveDB($db) {
        $firstNameCapital = "CONCAT((UPPER(substring('$this->firstName',1,1))),(LOWER(substring('$this->firstName',2,length('$this->firstName')-1))))"; // odpowiada za zapisanie do bazy imienia z dużej litery
        $surnameCapital = "CONCAT((UPPER(substring('$this->surname',1,1))),(LOWER(substring('$this->surname',2,length('$this->surname')-1))))"; // odpowiada za zapisanie do bazy nazwiska z dużej litery       
        //$x = file_get_contents('man0.jpg');
        $image = "LOAD_FILE(\"C:/xampp/htdocs/Opinius/images/man0.jpg\")";
        $db->INSERT("INSERT INTO users Values(NULL,'$this->nick',$firstNameCapital,$surnameCapital,'$this->email','$this->passwd','$this->status','$this->date',$image)");
    }
//funkcje zwracające poszczególne parametry użytkownika
    function getnick() {
        return $this->nick;
    }
    function getPasswd() {
        return $this->passwd;
    }
    function getFullName() {
        return $this->firstName;
    }
    function getEmial() {
        return $this->emial;
    }
    function getDate() {
        return $this->date;
    }
    function getStatus() {
        return $this->status;
    }
//funkcje ustawiające poszczególne parametry użytkownika
    function setnick($nick) {
        $this->nick = $nick;
    }
    function setPasswd($passwd) {
        $this->passwd = $passwd;
    }
    function setFullName($firstName) {
        $this->firstName = $firstName;
    }
    function setEmial($emial) {
        $this->emial = $emial;
    }
    function setDate($date) {
        $this->date = $date;
    }
    function setStatus($status) {
        $this->status = $status;
    }
}
