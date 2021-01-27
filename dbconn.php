<?php
try {
    $conn = new PDO("mysql:host=$dbServer;dbname=$dbName;charset=$charset", $dbUser, $dbPass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully <br />"; 
    $dberr = 0;

} catch(PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
    $dberr = 1;
  }
