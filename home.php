<?php 
session_start();
require 'koneksi.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pengelolaan Kas</title>
        <link rel="shortcut icon" href="assets/img/icon.png">

        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><small>Pengelolaan Kas Ridatus</small></a>
                </div>
                <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">Date :
                    <?php date_default_timezone_set('Asia/Jakarta');
echo date('d-m-Y'); ?> &nbsp; &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust" title="Logout">Keluar</a> </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="assets/img/find_user2.png" class="user-image img-responsive" />
                        </li>

                        <li>
                            <a href="home.php"><i class="glyphicon glyphicon-home
"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="?page=masuk"><i class="glyphicon glyphicon-floppy-save
"></i> Kas Masuk</a>
                        </li>
                        <li>
                            <a href="?page=keluar"><i class="glyphicon glyphicon-floppy-open
"></i> Kas Keluar</a>
                        </li>
                        <li>
                            <a href="?page=rekap"><i class="glyphicon glyphicon-tasks
"></i> Rekapitulasi Kas</a>
                        </li>
                        <li>
                            <a href="?page=user"><i class="glyphicon glyphicon-user
"></i> Support</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">

                            <?php

                        $page = $_GET['page'];
                        $aksi = $_GET['aksi'];

                        if($page == "masuk") {
                            if($aksi =="") {
                                include 'page/kas_masuk/masuk.php';
                            } if($aksi =="hapus") {
                                include 'page/kas_masuk/hapus.php';
                            }
                        } elseif ($page == "keluar") {
                            if($aksi =="") {
                                include 'page/kas_keluar/keluar.php';
                            } if($aksi =="hapus") {
                               include 'page/kas_keluar/hapus.php';
                            }
                        } elseif ($page == "rekap") {
                            if($aksi =="") {
                                include 'page/rekap/rekap.php';
                            }
                        } elseif ($page == "user") {
                            if($aksi =="") {
                                include 'page/user/user.php';
                            }
                        } elseif ($page == "") {                           
                                include 'dashboard.php';
                            }                       
                     ?>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>

    </body>

    </html>