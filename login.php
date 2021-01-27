<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once('settings.php');
require_once('dbconn.php');

$sql='SELECT ID,PasswordHash FROM Klienci WHERE Email = :Email';
$stmt = $conn->prepare($sql);
$stmt->execute(array(   ':Email' => $_POST['email']));
$data = $stmt->fetchAll();
$hash = $data[0]['PasswordHash'];
    
if (password_verify ($_POST['password'], $hash))
{
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['id'] = $data[0]['ID'];
}

header("Location: index.php");
