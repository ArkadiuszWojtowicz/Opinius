<?php
// przydziela lub odbiera prawa admina zwykłym użytkownikom
session_start();
include_once 'class/database.php';

$db = new Database("localhost", "root", "", "opinius");

$nick = $_POST['nazwa'];
$nickSelect = $db->select("SELECT userName from users WHERE userName='$nick'", array("userName"));
$statusSelect = $db->select("SELECT status from users WHERE userName='$nick'", array("status"));
if (isset($_POST['nazwa'])) {
    if ($nick == $nickSelect && $statusSelect==1) {
        $_SESSION['name'] = '<span style="color:green; text-align: center; font-size:16px;">Użytkownikowi ' . $nickSelect . ' przyznano status admina!</span>';
        $db->UPDATE("UPDATE users SET status=2 WHERE userName='$nick'");
        header("location: ../index.php?site=Contact");
    }else if($nick == $nickSelect && $statusSelect==2){
        $_SESSION['name'] = '<span style="color:red; text-align: center; font-size:16px;">Użytkownik ' . $nickSelect . ' ma już status admina!</span>';
        header("location: ../index.php?site=Contact");
    }
    else{
        $_SESSION['name'] = '<span style="color:red; text-align: center; font-size:16px;">Użytkownik o podanym nicku nie istnieje!</span>';        
        header("location: ../index.php?site=Contact");
    }
}

$nick2 = $_POST['nazwa2'];
$nickSelect2 = $db->select("SELECT userName from users WHERE userName='$nick2'", array("userName"));
$statusSelect2 = $db->select("SELECT status from users WHERE userName='$nick2'", array("status"));
if (isset($_POST['nazwa2'])) {
    if ($nick2 == $nickSelect2 && $statusSelect2==2) {
        $_SESSION['downGradeStatus'] = '<span style="color:green; text-align: center; font-size:16px;">Użytkownikowi ' . $nickSelect2 . ' odebrano status admina!</span>';
        $db->UPDATE("UPDATE users SET status=1 WHERE userName='$nick2'");
        header("location: ../index.php?site=Contact");
    }else if($nick2 == $nickSelect2 && $statusSelect2==1){
        $_SESSION['downGradeStatus'] = '<span style="color:red; text-align: center; font-size:16px;">Użytkownik ' . $nickSelect2 . ' nie ma statusu admina!</span>';
        header("location: ../index.php?site=Contact");
    }
    else{
        $_SESSION['downGradeStatus'] = '<span style="color:red; text-align: center; font-size:16px;">Użytkownik o podanym nicku nie istnieje!</span>';        
        header("location: ../index.php?site=Contact");
    }
}


