<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: home.php");
    die();
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        <title>Login</title>

        <link rel="stylesheet" href="alert/css/sweetalert.css">
        <link rel="shortcut icon" href="assets/img/icon.png">

        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <h1>Login</h1>
                            </div>
                            <div class="login-form">
                                <form action="ceklogin.php" method="post">
                                    <div class="form-group">
                                        <label><b>Nama Pengguna</b></label>
                                        <input class="au-input au-input--full" type="text" name="username" placeholder="Username ">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Kata Sandi</b></label>
                                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password ">
                                    </div>
                                    <br>
                                    <div>
                                        <span>
                                        <center>
                                        <button class="btn btn-md btn-outline-danger" type="reset">Reset&nbsp;&nbsp;</button>
                                    </span> &nbsp; &nbsp;
                                        <span>
                                        <button class="btn btn-md btn-outline-primary" type="submit">Masuk&nbsp;</button>
                                        </center>
                                    </span>
                                    </div>
                                </form>
                                <div class="register-link">
                                    <br>
                                    <p>Sistem Informasi Pengelolaan Kas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script src="alert/js/sweetalert.min.js"></script>
        <script src="alert/js/qunit-1.18.0.js"></script>

    </body>

    </html>
    <!-- end document-->