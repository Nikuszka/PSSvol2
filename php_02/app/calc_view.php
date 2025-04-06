<?php
//Tu już nie ładujemy konfiguracji - sam widok nie będzie już punktem wejścia do aplikacji.
//Wszystkie żądania idą do kontrolera, a kontroler wywołuje skrypt widoku.
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
    <a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
    <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

    <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
        <label for="id_kwota">Kwota kredytu: </label>
        <input id="id_kwota" type="text" name="kwota" value="<?php print($kwota); ?>" /><br />

        <label for="id_lata">Liczba lat: </label>
        <input id="id_lata" type="text" name="lata" value="<?php print($lata); ?>" /><br />

        <label for="id_oprocentowanie">Oprocentowanie: </label>
        <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php print($oprocentowanie); ?>" /><br />

        <input type="submit" value="Oblicz" />
    </form>

    <?php
    if (isset($messages)) {
        if (count($messages) > 0) {
            echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
            foreach ($messages as $key => $msg) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ol>';
        }
    }
    ?>

    <?php if (isset($rata)){ ?>
        <div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
            <?php echo 'Miesięczna rata: '.$rata; ?>
        </div>
    <?php } ?>

</body>
</html>