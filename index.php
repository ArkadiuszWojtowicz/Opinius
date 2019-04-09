<?php

require_once("class/website.php");
$site_akt = new Website();

if (isset($_GET['site'])) {
    $site = $_GET['site'];
    switch ($site) {
        case 'OurGoal':$site = 'OurGoal';
            break;
        case 'PasswordReminder':$site = 'PasswordReminder';
            break;
        case 'Settings':$site = 'Settings';
            break;
        case 'Contact':$site = 'Contact';
            break;
        case 'Login':$site = 'Login';
            break;
        case 'Tvs':$site = 'Tvs';
            break;
        case 'Computers':$site = 'Computers';
            break;
        case 'Phones':$site = 'Phones';
            break;
        case 'Peripherals':$site = 'Peripherals';
            break;
        case 'Components':$site = 'Components';
            break;
        case 'Cameras':$site = 'Cameras';
            break;
        case 'BritishCouncil':$site = 'BritishCouncil';
            break;
        default:$site = 'Home';
    }
} else {
    $site = "Home";
}

$plik = "scripts/" . $site . ".php";
if (file_exists($plik)) {
    require_once($plik);
    $site_akt->set_title($title);
    $site_akt->set_content($content);
    $site_akt->set_contentLOG($contentLOG);
    $site_akt->set_contentAdmin($contentAdmin);
    $site_akt->display();
}
