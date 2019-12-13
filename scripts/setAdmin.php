<?php
// przydziela lub odbiera prawa admina zwykłym użytkownikom
session_start();
include_once 'class/database.php';

$db = new Database("localhost", "root", "", "opinius");

$nick = filter_input_array(INPUT_POST)['name'];
$nickSelect = $db->select("SELECT nick from users WHERE nick='$nick'", array("nick"));
$statusSelect = $db->select("SELECT status from users WHERE nick='$nick'", array("status"));
if (isset(filter_input_array(INPUT_POST)['name'])) {
    if ($nick == $nickSelect && $statusSelect==1) {
        $_SESSION['name'] = '<span style="color:green; text-align: center; font-size:16px;">Użytkownikowi ' . $nickSelect . ' przyznano status admina!</span>';
        $db->UPDATE("UPDATE users SET status=2 WHERE nick='$nick'");
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

$nick2 = filter_input_array(INPUT_POST)['name2'];
$nickSelect2 = $db->select("SELECT nick from users WHERE nick='$nick2'", array("nick"));
$statusSelect2 = $db->select("SELECT status from users WHERE nick='$nick2'", array("status"));
if (isset(filter_input_array(INPUT_POST)['name2'])) {
    if ($nick2 == $nickSelect2 && $statusSelect2==2) {
        $_SESSION['downGradeStatus'] = '<span style="color:green; text-align: center; font-size:16px;">Użytkownikowi ' . $nickSelect2 . ' odebrano status admina!</span>';
        $db->UPDATE("UPDATE users SET status=1 WHERE nick='$nick2'");
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


