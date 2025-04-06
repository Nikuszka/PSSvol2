<?php

require_once dirname(__FILE__).'/../config.php';

$kwota = $_REQUEST['kwota'];
$lata = $_REQUEST['lata'];
$oprocentowanie = $_REQUEST['oprocentowanie'];

if (!(isset($kwota) && isset($lata) && isset($oprocentowanie))) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($kwota == "") {
    $messages[] = 'Nie podano kwoty kredytu';
}
if ($lata == "") {
    $messages[] = 'Nie podano liczby lat';
}
if ($oprocentowanie == "") {
    $messages[] = 'Nie podano oprocentowania';
}

if (empty($messages)) {
    if (!is_numeric($kwota) || $kwota <= 0) {
        $messages[] = 'Kwota kredytu nie jest liczbą dodatnią';
    }
    if (!is_numeric($lata) || $lata <= 0) {
        $messages[] = 'Liczba lat nie jest liczbą dodatnią';
    }
    if (!is_numeric($oprocentowanie) || $oprocentowanie <= 0) {
        $messages[] = 'Oprocentowanie nie jest liczbą dodatnią';
    }
}

if (empty($messages)) {
    $kwota = intval($kwota);
    $lata = intval($lata);
    $oprocentowanie = intval($oprocentowanie);

    $oprocentowanie_miesieczne = ($oprocentowanie / 100) / 12;
    $ilosc_rat = $lata * 12;

    $rata = ($kwota * $oprocentowanie_miesieczne) / (1 - pow(1 + $oprocentowanie_miesieczne, -$ilosc_rat));
}

include 'calc_view.php';
?>