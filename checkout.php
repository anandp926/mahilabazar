<?php session_start();
if(!isset($_SESSION['uid'])){
    header("Location: index.php");
}
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 6/17/2017
 * Time: 10:43 PM
 */
include 'include/connection.php';
if(isset($_GET['chk_item_id'])) {
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d h:i:sa',time());
    $rand_num = mt_rand();
    if(isset($_SESSION['ref']))
    {

    }else {
        $_SESSION['ref'] = $date . ' ' . $rand_num;
    }
    $chk_sql = "INSERT INTO checkout (chk_item,chk_ref,chk_timing) values('$_GET[chk_item_id]','$_SESSION[ref]','$date')";
    if(mysqli_query($conn, $chk_sql)){
        ?><script>window.location="checkout.php";</script><?php
    }
}
?>
<html>
<head>
    <title>Check out</title>
    <!-- Latest compiled and minified CSS
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- Optional theme
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/app.js"></script>
    <script>
        function ajax_func(){
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('get_processed_data').innerHTML=xmlhttp.responseText;
                }
            }

            xmlhttp.open('GET','checkout_process.php',true);
            xmlhttp.send();
        }
        function del_func(chk_id){
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('get_processed_data').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','checkout_process.php?chk_del_id='+chk_id,true);
            xmlhttp.send();
        }

        function up_chk_qty(chk_qty,chk_id) {
            xmlhttp.onreadystatechange=function () {
                if(xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById('get_processed_data').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','checkout_process.php?up_chk_qty='+chk_qty+'&up_chk_id='+chk_id,true)
            xmlhttp.send();
        }
    </script>
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
        .btn{
            border-radius: 0;
        }
        .panel{
            border-radius: 0;
        }
         .navbar a{
             color: white;
             background-color: transparent !important;
         }
        .form-control{
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
</head>
<body onload="ajax_func();" data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include'include/header.php'?>
<div class="container">
<div class="page-header">
    <h2 class="pull-left">Checkout</h2>
    <div class="pull-right">
        <button class="btn btn-success" onclick="window.location='ship_detail.php'">Proceed</button>
    </div>
    <div class="clearfix"></div>
</div>
    <div class="panel panel-default">
        <div class="panel-heading">Order Details</div>
    <div class="panel-body" id="get_processed_data">
        
            
        </table>
    </div>
    </div>
</div>
<br><br><br><br>
<div class="clearfix"></div>
<?php include'include/footer.php'; ?>
</body>
</html>
