<?php
session_start();
echo "Dodaje do koszyka ".$_POST['message'];

if ( ! isset($_SESSION['products'] )){
    $_SESSION['products'] = array();
}

array_push($_SESSION['products'], $_POST['message']);