<?php
if(!isset($_SESSION['uid'])){
    header("Location: index.php");
}
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 7/22/2017
 * Time: 12:46 AM
 */
session_start();
include 'include/connection.php';
if(isset($_POST['ordered']))
{
    $name=mysqli_real_escape_string($conn,strip_tags($_POST['name'])) ;
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $contact=mysqli_real_escape_string($conn,strip_tags($_POST['contact']));
    $state=mysqli_real_escape_string($conn,strip_tags($_POST['state']));
    $city=mysqli_real_escape_string($conn,strip_tags($_POST['city']));
    $address=mysqli_real_escape_string($conn,$_POST['del_address']);
    $ins_ship_sql="insert into orders (buyer_name,buyer_email,buyer_contact,buyer_state,buyer_city,buyer_del_add,buyer_ref,order_payment) VALUES ('$name','$email','$contact','$state','$city','$address','$_SESSION[ref]','$_SESSION[grand_total]');";
    if(mysqli_query($conn,$ins_ship_sql)){
        echo "<script> window.location='thanku.php'</script> ";
    }
}

?>

<html>
<head>
    <title>Ship Detail | mahilaBazar</title>
    <link rel="stylesheet" href="css/style.css">
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
        #contact{

            font-family: "Arial Rounded MT Bold";
            width: 100%;
            width: 100vw;
            color : #fff;
        }
        .contact-section{
            padding-top: 40px;
        }
        .contact-section .col-md-6{
            width: 50%;
        }

        .form-line{
            border-right: 1px solid #B29999;
        }

        .form-group{
            margin-top: 10px;
        }
        label{
            font-size: 1.1em;
            line-height: 1em;
            font-weight: normal;
            color: black;
        }
        .form-control{
            font-size: 1.1em;
            color: #080808;
        }
        textarea.form-control {
            height: 135px;
        }
        .submit{
            font-size: 1.1em;
            float: right;
            width: 150px;
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
<section id="contact">
    <div class="contact-section">
        <div class="container">
            <form  method="post">
                <div class="col-md-5 form-line">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" required >
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email id">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Mobile No.</label>
                        <input type="tel" class="form-control" name="contact" id="telephone" placeholder=" Enter 10-digit mobile no.">
                    </div>
                    <div class="form-group">
                        <label for="state" >State</label>
                        <select name="state" class="form-control">
                            <option>select state</option>
                            <option>Uttar Pradesh</option>
                            <option>Punjab</option>
                            <option>New Delhi</option>
                            <option>Madhya Pradesh</option>
                            <option>Andhra Pradesh</option>
                            <option>Bihar</option>
                            <option>Rajsthan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select id="city" name="city" class="form-control">
                            <option>select city</option>
                            <option>Allahabad</option>
                            <option>Jalandhar</option>
                            <option>Dwarka</option>
                            <option>Rewan</option>
                            <option>Kukdumal</option>
                            <option>Samstipur</option>
                            <option>Shri GangaNagar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Delivery address</label>
                        <textarea class="form-control" name="del_address" placeholder="Enter your address" required></textarea>
                    </div>
                    <div>
                        <button class="btn btn-primary submit" name="ordered">Submit</button>
                    </div>
                </div>
                <div>
                    <h2 style="color: red; text-align: center; padding-top: 20% ">Payment Interface is comming soon......</h2>
                </div>
            </form>
        </div>
</section>
<br><br><br><br>
<div class="clearfix"></div>
<?php include'include/footer.php'; ?>
</body>
</html>
