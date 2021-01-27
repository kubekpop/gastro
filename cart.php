<?php
session_start();
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
require_once('settings.php');
require_once('dbconn.php');
?>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/table-style.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>
<body>

<?php
if (isset($_SESSION['products'] ))
{
    echo '<div class="container">';
    echo '<ul class="responsive-table">';
    echo '<li class="table-header">';
    echo '<div class="col col-1">Zdjęcie</div>
    <div class="col col-2">Produkt</div>
    <div class="col col-3">Cena</div>
    <div class="col col-4">USUŃ</div>';
    echo '</li>';

    foreach ($_SESSION['products'] as $product){
        if ($dberr != 1) {
            $sql='SELECT * FROM Oferta WHERE ID = :id';
            $stmt = $conn ->prepare($sql);
            $stmt->bindParam(':id', $product);
            $stmt->execute();
            $data = $stmt->fetchAll();
            
            foreach ($data as $row) {
                echo '<li class="table-row">';
                echo '<div class="col col-1" data-label="Zdjęcie"><img src="'.$row['Obrazek'].'" class="product-pic" width="150px" alt="Obrazek_'.$row['Nazwa'].'"/></div>';
                echo '<div class="col col-2" data-label="Produkt">'.$row['Nazwa'].'</div>';
                echo '<div class="col col-3" data-label="Cena">'.$row['Cena'].'</div>';
                echo '<div class="col col-4" data-label="USUŃ"><button onClick="removeFromBasket('.$row['ID'].')" value="'.$row['ID'].'">USUŃ Z KOSZYKA</button></div>';
                echo '</li>'; 
            }
        } 
        else 
        {
            echo "Błąd połączenia z bazą danych";
        }


    }
    echo '</ul>';
    echo '<a href="order.php"><button class="btn">ZAMÓW</button></a>';
    echo '</div>';
}
else
{
    echo "Twój koszyk jest pusty, zamów coś PLZ";
}
?>
</body>
</html>