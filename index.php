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
        case 'ComputersLenovo':$site = 'ComputersLenovo';
            break;
        case 'ComputersHP':$site = 'ComputersHP';
            break;
        case 'ComputersMSI':$site = 'ComputersMSI';
            break;
        case 'ComputersAcer':$site = 'ComputersAcer';
            break;
        case 'ComputersAsus':$site = 'ComputersAsus';
            break;
        case 'ComputersDell':$site = 'ComputersDell';
            break;
        case 'ComputersApple':$site = 'ComputersApple';
            break;
        case 'Computers':$site = 'Computers';
            break;
        case 'Phones':$site = 'Phones';
            break;
        case 'PhonesXiaomi':$site = 'PhonesXiaomi';
            break;
        case 'PhonesLG':$site = 'PhonesLG';
            break;
        case 'PhonesApple':$site = 'PhonesApple';
            break;
        case 'PhonesSamsung':$site = 'PhonesSamsung';
            break;
        case 'PhonesHuawei':$site = 'PhonesHuawei';
            break;
        case 'PhonesNokia':$site = 'PhonesNokia';
            break;
        case 'Peripherals':$site = 'Peripherals';
            break;
        case 'PeripheralsCanon':$site = 'PeripheralsCanon';
            break;
        case 'PeripheralsLogitech':$site = 'PeripheralsLogitech';
            break;
        case 'PeripheralsRival':$site = 'PeripheralsRival';
            break;
        case 'PeripheralsMedia-Tech':$site = 'PeripheralsMedia-Tech';
            break;
        case 'PeripheralsPhilips':$site = 'PeripheralsPhilips';
            break;
        case 'PeripheralsDeskJet':$site = 'PeripheralsDeskJet';
            break;
        case 'Components':$site = 'Components';
            break;
        case 'ComponentsIntel':$site = 'ComponentsIntel';
            break;
        case 'ComponentsAMD':$site = 'ComponentsAMD';
            break;
        case 'ComponentsMSI':$site = 'ComponentsMSI';
            break;
        case 'ComponentsGeForce':$site = 'ComponentsGeForce';
            break;
        case 'ComponentsGTX':$site = 'ComponentsGTX';
            break;
        case 'Cameras':$site = 'Cameras';
            break;
        case 'CamerasCanon':$site = 'CamerasCanon';
            break;
        case 'CamerasNicon':$site = 'CamerasNicon';
            break;
        case 'CamerasSony':$site = 'CamerasSony';
            break;
        case 'BritishCouncil':$site = 'BritishCouncil';
            break;
        case 'TvsSamsung':$site = 'TvsSamsung';
            break;
        case 'TvsLG':$site = 'TvsLG';
            break;
        case 'TvsPanasonic':$site = 'TvsPanasonic';
            break;
        case 'TvsToshiba':$site = 'TvsToshiba';
            break;
        case 'TvsThomson':$site = 'TvsThomson';
            break;
        case 'TvsPhilips':$site = 'TvsPhilips';
            break;
        case 'TvsManta':$site = 'TvsManta';
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
