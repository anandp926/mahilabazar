<?php
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 8/3/2017
 * Time: 12:46 AM
 */?>

<html>
<head>
    <title>THANK YOU | mahilaBazar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            position: relative;
        }
        .navbar a{
            color: white;
            background-color: transparent !important;
        }
        .header1 a{
            color: white;
            background-color: transparent !important;
        }
        .navbar {
            margin-bottom: 0px;
        }
        #thanku{

            font-family: "Arial Rounded MT Bold";
            width: 100%;
            width: 100vw;
            color : black;
        }
        .thanku-section{
            padding-top: 40px;
        }
        .thanku-section .col-md-6{
            width: 50%;
        }
        .glyphicon.normal-right-spinner {
            -webkit-animation: glyphicon-spin-r 2s infinite linear;
            animation: glyphicon-spin-r 2s infinite linear;
        }
        @-webkit-keyframes glyphicon-spin-r {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg);
            }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include 'include/header.php'?>
<section id="thanku">
    <div class="thanku-section">
        <div class="container">
            <span class="text-center"><h1><span style='color: red'>THANK YOU</span></h1><h3>FOR</h3> <h1>SHOPPING</h1><h1>WITH US</h1> </span>
            <center><button class="btn btn-danger btn-lg " style="border-radius: 0; font-size: 35px" onclick="window.location='index.php'">SHOP NOW</button></center>

            </div>
        </div>
    </section>
<br><br><br><br>
<div class="clearfix"></div>
<?php include'include/footer.php'; ?>
</body>
</html>
