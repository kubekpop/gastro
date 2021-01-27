<?php
session_start();
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

require_once('settings.php');
require_once('dbconn.php');

$sql='SELECT Imie,Nazwisko,Adres,Email FROM Klienci WHERE Email=:Email';
$stmt = $conn->prepare($sql);
$stmt->execute(array(   
                    ':Email' => $_SESSION['email']
                    ));
$data = $stmt->fetchAll();

$imie = $data[0]['Imie'];
$nazwisko = $data[0]['Nazwisko'];
$adres = $data[0]['Adres'];
$email = $data[0]['Email'];

echo "IMIĘ: {$imie}<br />";
echo "NAZWISKO: {$nazwisko}<br />";
echo "ADRES: {$adres}<br />";
echo "EMAIL: {$email}<br /><br />";

$sql='SELECT * FROM Zamowienia WHERE Klient_ID=:ID';
$stmt = $conn->prepare($sql);
$stmt->execute(array(   
                    ':ID' => $_SESSION['id']));
$data = $stmt->fetchAll();

echo 'Zamówienia:<br /><br />';
foreach ($data as $row) {//dla  kazdego zamowienia klienta
    $sql = 'SELECT * FROM Klienci_zamowienia JOIN Oferta ON Klienci_zamowienia.Oferta_ID = Oferta.ID WHERE Zamowienie_ID = :Zamowienie_ID';
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(   ':Zamowienie_ID' => $row['ID']));
    $data_orders = $stmt->fetchAll();
    $kwota=0;
    foreach ($data_orders as $row_orders)//dla kazdego produktu z zamowienia
    {
        $kwota+=$row_orders['Cena'];
    }

    echo "<a href=\"order-details.php?zamowienie={$row['ID']}\"><button class=\"btn\">{$row['DataZamowienia']} za {$kwota} złotych</button></a><br />";
}