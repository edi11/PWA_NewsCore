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
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="onama.html">O Nama</a></li>
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
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide" src="img/placeholder.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Druga udarna vijest</h1>
                        <p>Dogodilo se nešto</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Pročitaj više</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="second-slide" src="img/placeholder.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Druga udarna vijest</h1>
                        <p>Dogodilo se nešto drugo</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Pročitaj više</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="third-slide" src="img/placeholder.jpg" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Treća udarna vijest</h1>
                        <p>Dogodilo se nešto treće</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>


<section>
    <div class="container marketing">


        <div class="row">
            <div class="col-lg-4">
                <div class="frame">
                    <img src="img/placeholder2.jpg" alt="Generic placeholder image" width="140" height="140">
                    <h2>Prva vijest</h2>
                    <p>Dogodilo se nešto</p>
                    <p><a class="btn btn-default" href="#" role="button">Pročitaj više &raquo;</a></p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="frame">
                    <img src="img/placeholder2.jpg" alt="Generic placeholder image" width="140" height="140">
                    <h2>Druga vijest</h2>
                    <p>Dogodilo se nešto drugo</p>
                    <p><a class="btn btn-default" href="#" role="button">Pročitaj više &raquo;</a></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="frame">
                    <img src="img/placeholder2.jpg" alt="Generic placeholder image" width="140" height="140">
                    <h2>Treća vijest</h2>
                    <p>Dogodilo se nešto treće.</p>
                    <p><a class="btn btn-default" href="#" role="button">Pročitaj više &raquo;</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--slijedi ispis svega iz baze -->
<section>
    <div class="containter-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-left">
                <?php
                //spajanje na bazu
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "newscoredb";
                $dbc = mysqli_connect($servername, $username, $password, $dbname) or die('Greška pri spajanju na bazu');

                //dohvaćanje vijesti
                $query = "SELECT * FROM newscoretable WHERE prikaz=1";
                $result = mysqli_query($dbc, $query) or die('Greška kod izvršavanja upita.');

                //ispis vijesti
                while ($row = mysqli_fetch_array($result)) {
                    echo '<h1>' . $row['naslov'] . '</h1>';
                    echo '<h4>' . $row['kategorija'] . '</h4>';
                    echo '<h3>' . $row['sazetak'] . '</h3>';
                    echo "<hr>";
                    echo '<p>' . $row['sadrzaj'] . '</p>';
                    echo "<br><br><br>";
                }

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
