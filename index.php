<?php
require_once('settings.php');
require_once('dbconn.php');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html>
<head>
<link rel="stylesheet" href="css/main.css">

<link rel="stylesheet" href="css/table-style.css">
<style type="text/css">
body{
    padding: 1px;
    margin: 0px;
    background: #E8CBC0;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to top, #636FA4, #E8CBC0);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to top, #636FA4, #E8CBC0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<meta charset="utf-8" />
</head>
<body>
<div id="header-top">
<img src="img/gastro.png" height="90%" style="float: left" /><h1 style="float: left;" class="top-center">GASTROFAZA CATERING</h1>
</div>

<div id="menu-top" class="vertical-center-menu">
    <a href="index.php" class="menu-entry"><button class="btn">O nas</button></a>
    <a href="products.php" target="main" class="menu-entry"><button class="btn">Produkty</button></a>
    <a href="contact.html" target="main" class="menu-entry"><button class="btn">Kontakt</button></a>
    <a href="cart.php" target="main" class="menu-entry"><button class="btn">Koszyk</button></a>
    <?php
    if (isset($_SESSION['email']))
    {
        echo '<a href="client-info.php" target="main" class="menu-entry"><button class="btn">Panel klienta</button></a>';
        echo '<a href="logout.php" class="menu-entry"><button class="btn">Wyloguj</button></a>';
    }
    ?>
    <?php
    if (! isset($_SESSION['email']))
    {
        echo '
        <a href="register.html" target="main" class="menu-entry"><button class="btn">Rejestracja</button></a>
        <form method="post" action="login.php" style="display:inline;">
            <input type="text" placeholder="e-mail" class="btn" name="email" required />
            <input type="password" placeholder="hasło" class="btn" name="password" required />
            <input type="submit" class="btn" value="zaloguj" />
            </form>
        ';
    }
    ?>

</div>

<div id="content" name="content">
    <iframe id="main" name="main" src="about.html" width="100%" height="auto" frameBorder="0px"></iframe>
</div>
<div id="footer">
    <p class="vertical-center">GASTROFAZA Spółka bez odpowiedzialności</p>
</div>


</body>
</html>