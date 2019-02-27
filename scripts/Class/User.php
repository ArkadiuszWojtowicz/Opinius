<?php 
class User {

    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;

    protected $userName;
    protected $passwd;
    protected $firstName;
    protected $surname;
    protected $emial;
    protected $date;
    protected $status;

    function __construct($userName, $firstName, $surname, $email, $passwd) {
        $this->status = User::STATUS_USER;
        $this->userName = $userName;
        $this->surname = $surname;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->passwd = hash('ripemd160',$passwd);  //$this->passwd = password_hash($passwd, PASSWORD_DEFAULT); 
        $this->date = (new DateTime())->format("Y-m-d H:i:s");
    }

    function saveDB($db) {
        $firstNameCapital = "CONCAT((UPPER(substring('$this->firstName',1,1))),(LOWER(substring('$this->firstName',2,length('$this->firstName')-1))))"; // odpowiada za zapisanie do bazy imienia z dużej litery
        $surnameCapital = "CONCAT((UPPER(substring('$this->surname',1,1))),(LOWER(substring('$this->surname',2,length('$this->surname')-1))))"; // odpowiada za zapisanie do bazy nazwiska z dużej litery       
        $db->INSERT("INSERT INTO users Values(NULL,'$this->userName',$firstNameCapital,$surnameCapital,'$this->email','$this->passwd','$this->status','$this->date')");
    }

    function getUserName() {
        return $this->userName;
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

    function setUserName($userName) {
        $this->userName = $userName;
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
