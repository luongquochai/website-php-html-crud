<!DOCTYPE HTML>
<html>

<head>
    <title>Mini Project</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <div class="inner">

                <!-- Logo -->
                <a href="home.php" class="logo">
                    <span class="fa fa-car"></span> <span class="title">Car Manufacture Management</span>
                </a>

                <!-- Nav -->
                <nav>
                    <ul>
                        <li><a href="#menu">Menu</a></li>
                    </ul>
                </nav>

            </div>
        </header>

        <!-- Menu -->
        <nav id="menu">
            <h2>Menu</h2>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li>
                    <a href="#" class="dropdown-toggle">Information</a>

                    <ul>
                        <li><a href="information/car.php">Car</a></li>
                        <li><a href="information/customer.php">Customer</a></li>
                        <li><a href="information/dealer.php">Dealer</a></li>
                        <li><a href="information/manufacturer.php">manufacturer</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/slider-image-1-1920x700.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/slider-image-2-1920x700.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/slider-image-3-1920x700.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <br>
            <br>

            <div class="inner">
                <!-- About Us -->
                <header id="inner">
                    <h1>About Us</h1>
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <p><strong>Lê Minh Hoàng</strong></p>
                            <p class="m-n"><em>MAMAIU19051</em></p>
                        </div>

                        <div class="col-sm-6 text-center">
                            <p><strong>Phạm Phú Hanh</strong> </p>
                            <p class="m-n"><em>MAMAIU16010</em></p>
                        </div>
                    </div>
                </header>

                <br>

                <h2 class="h2">About Project</h2>



            </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <ul class="copyright">
                    <li>Copyright © 2021 Company Name </li>
                </ul>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>