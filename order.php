<?php
session_start();
require_once('settings.php');
require_once('dbconn.php');
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

//var_dump($_SESSION);

if ($dberr != 1) {
    $sql='SELECT ID FROM Zamowienia ORDER BY ID DESC LIMIT 1';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':category', $_POST['category']);
    $stmt->execute();
    $data = $stmt->fetchAll();

    $order_id = (int)$data[0]['ID'] + 1;
    $sql = 'INSERT INTO Zamowienia(ID, StatusZamowienia, Klient_ID) VALUES (:ID, :StatusZamowienia, :Klient_ID)';

    $stmt = $conn->prepare($sql);
    $stmt->execute(array(   ':ID' => $order_id,
                            ':StatusZamowienia' => 'Nowe',
                            ':Klient_ID' => $_SESSION['id']
                        ));


    foreach ($_SESSION['products'] as $product){
        $sql = 'INSERT INTO Klienci_zamowienia(ID, Oferta_ID, Zamowienie_ID, Ilosc) VALUES ( NULL, :Produkt, :Zamowienie, "1" )';
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(   ':Produkt' => $product,
                                ':Zamowienie' => $order_id
                        ));

    }

    unset($_SESSION['products']);



    header('Location: client-info.php');
    
}
?>