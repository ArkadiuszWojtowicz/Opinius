<?php

require_once("class/website.php");
$site_akt = new Website();
//decuduje która strona ma być wyświetlana
if (isset(filter_input_array(INPUT_GET)['site'])) {
    $site = filter_input_array(INPUT_GET)['site'];
    switch ($site) {
        case 'MyReviews':$site = 'MyReviews';
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
    //przekazuje tytuł strony do klasy Website
    $site_akt->set_title($title);
    //przekazuje zawartość strony do klasy Website
    $site_akt->set_content($content);
    //przekazuje zawartość strony do klasy Website
    //dla użytkownika zalogowanego
    $site_akt->set_contentLOG($contentLOG);
    //przekazuje zawartość strony do klasy Website
    //dla administratora
    $site_akt->set_contentAdmin($contentAdmin);
    //wyświetla zawartość strony
    $site_akt->display();
}
