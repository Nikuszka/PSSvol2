<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów

$kwota= $_REQUEST ['kwota'];
$okres = $_REQUEST ['okres'];
$op = $_REQUEST ['op'];


// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if (!(isset($kwota) && isset($okres) && isset($op))) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
    if ( $kwota == "") {
	$messages [] = 'Nie podano kwoty';
    }
    if ( $okres == "") {
	$messages [] = 'Nie podano okresu';
    }
    if ( $op == "") {
    $messages [] = 'Nie podano oprocentowania';
    }

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $kwota ) || $kwota <= 0) {
		$messages [] = 'Kwota nie jest poprawna';
	}
	
	if (! is_numeric( $okres ) || $okres <= 0) {
		$messages [] = 'Okres nie poprawny';
	}

    if (! is_numeric( $op ) || $op < 0) {
        $messages [] = 'Oprocentowanie nie jest poprawne';
    }

}

// wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kwota = intval($kwota);
	$okres = intval($okres);
    $op = intval($op);
	
	//wykonanie operacji
    $oprocentowanie_miesieczne = ($op / 100) / 12;
    $ilosc_rat = $okres * 12;

    $rata = ($kwota * $oprocentowanie_miesieczne) / (1 - pow(1 + $oprocentowanie_miesieczne, -$ilosc_rat));

}


include 'calc_view.php';