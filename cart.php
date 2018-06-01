<?php 
session_start();
if(!isset($_SESSION['uid'])){
    header("Location: index.php");
}
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 7/26/2017
 * Time: 9:11 PM
 */
include 'include/connection.php';
if(isset($_REQUEST['cart_item_id'])){
    $cart_sql = "INSERT INTO cart (cart_item,cart_ref,cart_timing) values('$_GET[cart_item_id]','$_SESSION[cart_ref]','$date')";
    if(mysqli_query($conn, $cart_sql)){
        ?><script>window.location="cart.php";</script><?php
    }
}
?>
<html>
<head>
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
        
        .tb{
        font-weight: 500;
            font-size: 14px;
        }
        .row {
            text-align: center;
            float: none;
        }

        .col-md-2 {
            display:inline-block;
        }

        .table-borderless > tbody > tr > td,
        .table-borderless > tbody > tr > th,
        .table-borderless > tfoot > tr > td,
        .table-borderless > tfoot > tr > th,
        .table-borderless > thead > tr > td,
        .table-borderless > thead > tr > th {
            border: none;
        }
        .table-borderless> tbody > tr > td{
            vertical-align: middle;
        }
        .btn{
            border-radius: 0;
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
    <script>

        function cart_fun() {
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function () {
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('get_cart_process').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','cart_process.php',true);
            xmlhttp.send();
        }
        function cart_del_func(cart_item) {
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function () {
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('get_cart_process').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','cart_process.php?cart_item='+cart_item,true);
            xmlhttp.send();
        }
    </script>
</head>
<body onload="cart_fun();" data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include 'include/header.php';?>
<div class="container">
    <h1 class="text-center" style="padding-bottom: 10px; border-bottom: 1px solid darkgray">My CART</h1>
    <br>
          <div id="get_cart_process">

          </div>
</div>
<br><br><br><br>
<div class="clearfix"></div>
<?php include'include/footer.php'; ?>
</body>
</html>
