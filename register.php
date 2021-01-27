<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('settings.php');
require_once('dbconn.php');

$sql='INSERT INTO Klienci(Imie, Nazwisko, Adres, Email, PasswordHash) VALUES (:Imie, :Nazwisko, :Adres, :Email, :PasswordHash)';
$stmt = $conn->prepare($sql);
$stmt->execute(array(   ':Imie' => $_POST['imie'],
                        ':Nazwisko' => $_POST['nazwisko'],
                        ':Adres' => $_POST['adres'],
                        ':Email' => $_POST['email'],
                        ':PasswordHash' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                    ));

echo "Zarejestrowano<br>";
echo '<a href="about.html" target="main" class="menu-entry"><button class="btn">Wróć do strony głównej</button></a>';
