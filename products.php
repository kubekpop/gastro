
<html>
    <head>
    <meta charset="utf-8" />
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/table-style.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<style type="text/css">
body{
    background-color: transparent !important;
}
</style>
</head>
<body>
<form method="post" action="products.php" name="product-form">

<label for="category">Wybierz kateogrię</label>
<select name="category" id="category" class="btn">
<option value="dania_cieple">Dania ciepłe</option>
<option value="dania_zimne">Dania zimne</option>
<option value="desery">Desery</option>
<option value="usluga">Usługi</option>
</input>
<br />
<input class="btn" type="submit" value="Wyświetl" />
</form>
<!--    https://codepen.io/faaezahmd/pen/dJeRex   --> 

<?php
if(isset($_POST))
{
    require_once('settings.php');
    require_once('dbconn.php');

    if ($dberr != 1) 
    {
        $sql='SELECT * FROM Oferta WHERE Kategoria = :category';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':category', $_POST['category']);
        $stmt->execute();
        $data = $stmt->fetchAll();

        echo '<div class="container">';
        echo '<ul class="responsive-table">';
        echo '<li class="table-header">';
        echo '<div class="col col-1">Zdjęcie</div>
        <div class="col col-2">Produkt</div>
        <div class="col col-3">Cena</div>
        <div class="col col-4">KUPUJ</div>';
        echo '</li>';
        foreach ($data as $row) {
            echo '<li class="table-row">';
            echo '<div class="col col-1" data-label="Zdjęcie"><img src="'.$row['Obrazek'].'" class="product-pic" width="150px" alt="Obrazek_'.$row['Nazwa'].'"/></div>';
            echo '<div class="col col-2" data-label="Produkt">'.$row['Nazwa'].'</div>';
            echo '<div class="col col-3" data-label="Cena">'.$row['Cena'].'</div>';
            echo '<div class="col col-4" data-label="KUPUJ"><button onClick="addToBasket('.$row['ID'].')" value="'.$row['ID'].'">DODAJ DO KOSZYKA</button></div>';
            echo '</li>'; 
        }
        echo '</ul>';
        echo '</div>';
    } 
    else 
    {
        echo "Błąd połączenia z bazą danych";

    }
}

echo '</body></html>';
?>