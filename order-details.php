<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('settings.php');
require_once('dbconn.php');

if (isset($_GET['zamowienie'])){
$zamowienie = $_GET['zamowienie'];



    $sql = 'SELECT * FROM Klienci_zamowienia JOIN Oferta ON Klienci_zamowienia.Oferta_ID = Oferta.ID WHERE Zamowienie_ID = :Zamowienie_ID';
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(   ':Zamowienie_ID' => $zamowienie));
    $data_orders = $stmt->fetchAll();
    $kwota=0;
    foreach ($data_orders as $row_orders)//dla kazdego produktu z zamowienia
    {
        echo "{$row_orders['Nazwa']}    {$row_orders['Cena']} zł<br />";
        $kwota+=$row_orders['Cena'];
    }

    echo "SUMA: {$kwota} złotych<br />";
}