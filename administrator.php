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

<!--slijedi ispis svega iz baze -->
<section>
    <div class="containter-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-2 text-left">
                <?php
                //spajanje na bazu
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "newscoredb";
                $dbc = mysqli_connect($servername, $username, $password, $dbname) or die('Greška pri spajanju na bazu');

                //dohvaćanje vijesti
                $query = "SELECT * FROM newscoretable";
                $result = mysqli_query($dbc, $query) or die('Greška kod izvršavanja upita.');

                //ispis vijesti
                while ($row = mysqli_fetch_array($result)) {
                    echo '<h4>' . $row['naslov'] . '        ' . $row['prikaz'] . '</h4>';

                    echo "<hr>";
                }


                ?>
            </div>

            <div class="col-md-4">
                <form name="forma" action="administrator.php" method="POST">
                    <label for="naslovvijesti">Naslov vijesti koju želite pobrisati:</label>
                    <input id="naslovvijesti" type="text" name="idnaslov"/>
                    <br>
                    <label for="naslovvijesti">Naslov vijesti kojoj želite promijeniti vidljivost:</label>
                    <input id="naslovvijesti" type="text" name="idnaslov2"/>
                    <br>
                    <input type="submit" value="Potvrdi">
                </form>

                <?php
                $idnaslov = isset($_POST['idnaslov']) ? $_POST['idnaslov'] : '';
                $idnaslov2 = isset($_POST['idnaslov2']) ? $_POST['idnaslov2'] : '';


                $query = "DELETE FROM newscoretable WHERE naslov ='$idnaslov '";
                $result = mysqli_query($dbc, $query) or die('Greška kod brisanja.');


                $query = "SELECT * FROM newscoretable WHERE naslov ='$idnaslov2'";
                $result = mysqli_query($dbc, $query) or die('Greška kod dohvaćanja podataka');

                if ($row['prikaz'] = 1) {
                    $query = "UPDATE newscoretable SET prikaz='0' WHERE naslov ='$idnaslov2'";
                    $result = mysqli_query($dbc, $query) or die('Greška kod izmjene.');
                };

                if ($row['prikaz'] != 0) {
                    $query = "UPDATE newscoretable SET prikaz='1' WHERE naslov ='$idnaslov2'";
                    $result = mysqli_query($dbc, $query) or die('Greška kod izmjene.');

                };


                //zatvaranje baze
                mysqli_close($dbc);
                ?>
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
