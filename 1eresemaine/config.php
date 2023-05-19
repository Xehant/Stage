<?php
session_start();

try {
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('localhost', 'retro', 'test', 'seek');
} catch (mysqli_sql_exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>
