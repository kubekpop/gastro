<?php
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
session_start();
require_once('settings.php');
require_once('dbconn.php');

if(isset($_POST['feedback'])) {
    $feedback=1;
}
else{
    $feedback=0;
}

$sql='INSERT INTO Kontakt(Nazwa, Tresc, Mail, Kontakt_zwrotny) VALUES (:Nazwa, :Tresc, :Mail, :Feedback)';
$stmt = $conn->prepare($sql);
$stmt->execute(array(   ':Nazwa' => $_POST['imie'],
                        ':Tresc' => $_POST['zapytanie'],
                        ':Feedback' => $feedback,
                        ':Mail' => $_POST['email']
                        ));
echo "Wysłano wiadomość<br>";
echo '<a href="about.html" target="main" class="menu-entry"><button class="btn">Wróć do strony głównej</button></a>';