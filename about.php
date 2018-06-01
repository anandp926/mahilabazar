<?php
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 8/3/2017
 * Time: 1:26 AM
 */
session_start();
include 'include/connection.php';
?>

<html>
<head>
    <title>mahilaBazar</title>
    <link rel="stylesheet" href="image.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/app.js"></script>
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
        #about{

            font-family: "Arial Rounded MT Bold";
            width: 100%;
            width: 100vw;
            color : black;
        }
        .about-section{
            padding-top: 40px;
        }
        .about-section .col-md-6{
            width: 50%;
        }
        .section-content{
            text-align: center;

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
<body>
<?php include "include/header.php"; ?>
<section id="about">
    <div class="section-content">
        <h1 class="section-header" style="color: red">Know about <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> us</span></h1>
        <h3>Our Mission, Vision and Values</h3>
        <h2 style="color: #1a4a72"><b>FOUNDED IN AUGUST 2017</b></h2>
    </div>
    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="ih-item circle colored effect3 left_to_right"><a href="">
                            <div class="img"><img src="anand.png" alt="img"></div>
                            <div class="info">
                                <img src="anand.png" class="img-circle" alt="img">
                            </div></a></div>
                        <span class="text-center"><h4>Anand Singh Parihar</h4></span>
                    <span class="text-center"><h4><b>Founder of mahilaBazar</b></h4></span>
                    <span class="text-center"><h5>Web & Mobile Application Developer</h5></span>
                    <span class="text-center"><h3><a href="https://www.facebook.com/anandp926"><i class="fa fa-facebook-official" style="color: darkblue" aria-hidden="true">
                                </i></a>&nbsp;&nbsp;<a href="https://www.instagram.com/imanandsingh9"><i class="fa fa-instagram" style="color: #E23F5F" aria-hidden="true"></i></a>
                    &nbsp;&nbsp;<a href="https://www.linkedin.com/in/anand-singh-parihar-16140010a/"><i class="fa fa-linkedin" style="color: #0077B5" aria-hidden="true"></i></a>
                            &nbsp;&nbsp;<a href="https://plus.google.com/+Anandsinghparihar"><i class="fa fa-google-plus-official" style="color: #DB4437" aria-hidden="true"></i></a>
                   </h3> </span>
                </div>
                <div class="col-md-8">
                    <p style="text-justify-trim: auto">
                        With over 10k clothing, accessories and souvenirs on mahilaBazar .
                        It gets its name from the huge amount of clothing and accessories on sale for women of all ages; however, with watches,
                        cosmetics, bags, home furnishings, CDs and trinkets also up for grabs,
                        you don’t need to be just in the market for a pair of nylon stockings to find something within crowded aisles.
                        </br></br>
                        We are a business inspired by Vision, driven by Mission and underpinned by Values. We have put our Vision, Mission and Values here for you to see,
                        along with what they mean to our customer, candidates and partners so that you can decide whether we are a company built of things which matter to you.
                            <span>
                            <h3>Vision</h3>
                            Leading the Talent Agenda in Emerging Markets as the partner of choice for customer, employees and employers.
                        </span>
                        <span>
                            <h3>What Our Values Mean to Costumer, Candidates and Partners</h3>
                            We see our Values not only as the way we do business, but also the reason we do business and what makes our business strong.
                            As the key stakeholders in mahilaBazar, our customer, candidates and partners join with our team in creating an environment for
                            business excellence. We call this the mahilaBazar market and we believe that our Values actively drive the creation and engagement of
                            this market. Partners, we will share and work towards objectives with you. Customer, we will bring you the best, most-trending things in the market.
                            Candidates, we will celebrate your diversity, build lasting relationships with you, represent you credibly as an agent and share our
                            knowledge to develop you. This is the promise of our Values to you all.
                        </span>
                    </p>
                </div>
            </div>
        </div>
        </div>
    </section>
<br><br><br><br>
<div class="clearfix"></div>
<?php include'include/footer.php'; ?>
</body>
</html>