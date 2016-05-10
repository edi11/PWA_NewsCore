<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>NEWS CORE news portal</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body>

<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"
                                                                   style="width:120px;"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse" style="height: 90px;">
                    <ul class="nav navbar-nav" style="margin-top: 20px; background-color: white; border-radius: 20px;">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">O Nama</a></li>
                        <li><a href="http://www.tvz.hr/">TVZ</a></li>

                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>

<header>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide" src="img/placeholder.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 style="font-size: 72px;">O NAMA</h1>

                    </div>
                </div>
            </div>

        </div>
</header>

<?php

//varijable
$naslov = $_POST['naslov'];
$sazetak = $_POST['sazetak'];
$sadrzaj = $_POST['sadrzaj'];
$kategorije = $_POST['kategorije'];
$prikaz = $_POST['prikaz'];

$prikaz2 = 0;
if (isset($prikaz)) $prikaz2 = 1;

//spajanje na bazu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newscoredb";
$dbc = mysqli_connect($servername, $username, $password, $dbname) or die('Greška pri spajanju na bazu');

//unos u bazu
$query = "INSERT INTO newscoretable
	( naslov, sazetak, sadrzaj, kategorija, prikaz) 
	VALUES 
	('$naslov', '$sazetak', '$sadrzaj', '$kategorije', '$prikaz2')";

$result = mysqli_query($dbc, $query) or die('Greška kod izvršavanja upita.');

//zatvaranje baze
mysqli_close($dbc);


?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-left" style=" margin-bottom: 30px;">
                    <?php if (isset($prikaz)) {

                        echo "<h1>$naslov </h1>";
                        echo "<h4>$kategorije </h4>";
                        echo "<h3>$sazetak</h3>";
                        echo "<hr>";
                        echo "<p>$sadrzaj</p>";

                    } else {
                        echo "<h1>Skrivena vijest</h1>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container-fluid">
        <div class="row" id="footer">


            <p class="text-center footer_text">&copy; 2016 NEWS CORE d.o.o. </p>
            <p class="text-center footer_text">Edi Ferhatović </p>
            <p class="text-center footer_text"> e-mail: eferhatov@tvz.hr</p>

        </div>
    </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>

