<?php
session_start();
echo "Usuwam z koszyka ".$_POST['message'];

if ( ! isset($_SESSION['products'] )){
    $_SESSION['products'] = array();
}

$toDelete = array_search($_POST['message'], $_SESSION['products']);  // szukamy kiedy pierwszy raz pojawia się id 5

//echo $fo; // pokaż ten index
if($toDelete >= 0)
{
    unset($_SESSION['products'][$toDelete]); // wywal to id xd
}

