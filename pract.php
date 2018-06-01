<?php
error_reporting(E_WARNING);
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 6/17/2017
 * Time: 8:43 AM
 */
include 'include/connection.php';
if(isset($_POST['signup'])){
    $emailErr="";
    $name=mysqli_real_escape_string($conn,strip_tags($_POST['name']));
    $mob=mysqli_real_escape_string($conn,strip_tags($_POST['mob']));
    $email=mysqli_real_escape_string($conn,strip_tags($_POST['email']));
    $pass=mysqli_real_escape_string($conn,$_POST['password']);

    $val_sql="select user_email as 'u_mail' from user_registration where user_email='$email';";
    $val_run=mysqli_query($conn,$val_sql);
    $val_rows=mysqli_fetch_assoc($val_run);
    if($val_rows['u_mail']==$email){
        $emailErr="Email already registered";
        echo"<script>";
        echo "alert('".$emailErr."');";
        echo "</script>";
    }
    if($emailErr==""){
        $signup_sql="insert into user_registration (user_name,user_contact,user_email,user_password) VALUES('$name','$mob','$email','$pass')";

        if(mysqli_query($conn,$signup_sql)){
            echo "<script>alert('Successfully Registered');";
            echo "</script>";
        }
    }

}
if(isset($_POST['login'])){
    $email=mysqli_real_escape_string($conn,$_POST['lemail']);
    $pass=mysqli_real_escape_string($conn,$_POST['lpassword']);
    $login_sql="select user_email from user_registration WHERE user_password='$pass'";
    $login_row=mysqli_query($conn,$login_sql);
    $login_rows=mysqli_fetch_assoc($login_row);
    if($login_rows['user_email']==$email){
        session_start();
        $_SESSION['email']=$email;
        $ses_sql="select * from user_registration WHERE user_email='$_SESSION[email]';";
        $ses_run=mysqli_query($conn,$ses_sql);
        $ses_fetch=mysqli_fetch_assoc($ses_run);
        $user_id=$ses_fetch['user_id'];
        $user_name=$ses_fetch['user_name'];
        $_SESSION['u_name']=$user_name;
        $_SESSION['uid']=$user_id;
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d h:i:sa',time());
        $_SESSION['cart_ref']=$_SESSION['email'].' '.$_SESSION['uid'];

    }   else{
        echo"
              <script>alert('wrong email or password')</script>";
    }
}

?>


<nav class="navbar navbar-fixed-top"  style="border-radius:0; background-color: #2874F0" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header ">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="nav navbar-brand" style="font-family:'Colonna MT'; font-size: 2.2em">mahilaBazar</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <div class="col-sm-3 col-md-3">
            <form class="navbar-form" role="search">
                <div class="form-group">
                    <div class="input-group input-append search" >
                        <input type="text" class="form-control input-lg" placeholder="Search here for products " style="border-radius: 0">
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-search"></span></span>
                    </div>
                </div>
            </form>
        </div>
        <ul class="nav navbar-nav " style="font-size: 12px; font-weight: 500">
            <li style='padding: 0em'><a href='about.php' >About us</a></li>
            <li style="padding: 0em"><a href="#myModal1" data-toggle="modal">Sign Up</a></li>
            <li style="padding: 0em">
                <?php if(!(isset($_SESSION['uid']))){
                    echo "
           <a href='#myModal' data-toggle='modal'>Login</a>
           ";
                }else{
                    echo
                    "<a>$_SESSION[u_name]</a>  ";
                    echo"  <li style='padding: 0em'><a href='logout.php' >Logout</a></li>";
                }
                ?>

            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li style="padding-top: 10%">
                <div class="col-sm-3 col-md3">
                    <button class="btn"  <?php if(!isset($_SESSION['uid'])){?> onclick="my()" <?php }else {?> onclick="window.location='cart.php'"<?php }?> style="background-color: #2469D9;border-radius: 0 ;width: 100px; color: white">
                        <div class="glyphicon glyphicon-shopping-cart">
                        </div> CART <span style="font-weight: 500; font-size: 15px; font-family: 'Verdana'"><?php
                        if(!(isset($_SESSION['uid']))){
                            echo "0";
                        }else {
                            $cart_sql = "select count(*) AS 'total' from cart WHERE cart_ref='$_SESSION[cart_ref]';";
                            $cart_run = mysqli_query($conn, $cart_sql);
                            $count = mysqli_fetch_assoc($cart_run);
                            if (!(isset($_SESSION['uid']))) {
                                echo "0";
                            } else {
                                echo $count['total'];

                            }
                        }?></button>
                </div>
            </li>

        </ul>

        <div class="container-fluid header1" style="padding-left: 20%; padding-right: 20%; padding-top: 100px; background-color:#2874F0 ">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <?php
                $cat_sql="select * from item_cat";
                $cat_run=mysqli_query($conn,$cat_sql);
                while($cat_rows=mysqli_fetch_assoc($cat_run)){
                    $cat_name=ucwords($cat_rows['cat_name']);
                    if($cat_rows['cat_slug']=='')
                    {
                        $cat_slug=$cat_rows['cat_name'];
                    }else{
                        $cat_slug=$cat_rows['cat_slug'];
                    }
                    echo "
                <li><a href='category.php?&category=$cat_slug'>$cat_name</a></li>
            ";
                }
                ?>
            </ul>
        </div>
    </div><!-- /.navbar-collapse -->
</nav>



<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog" ">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close mynewclassclose" data-dismiss="modal" aria-hidden="true">
                <img src="http://expediaholiday.d.seven2.net/_images/modal_close.png"/>
            </button>
            <h3>Login</h3>
        </div>
        <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input class="form-control" type="email" name="lemail" id="email" required>
                </div>
                <div class="form-group">
                    <label for="email">Password: </label>
                    <input class="form-control" type="password" name="lpassword" id="password" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" name="login">Login</button>
                </div>
                New User? <a href="#myModal1" data-toggle="modal" id="login" data-dismiss="modal" style="text-decoration: none">Sign Up</a>
            </form>
        </div>
    </div>
</div>
</div>
<div class="modal" id="myModal1" role="dialog">
    <div class="modal-dialog" ">
    <div class="modal-content">
        <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="mob">Mobile No.: </label>
                    <input type="number" class="form-control" id="mob" name="mob" maxlength="13" minlength="10" required>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input class="form-control" type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="email">Password: </label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger btn-block" name="signup">Sign Up</button>
                </div>
                Already Registered? <a href="#myModal" data-toggle="modal" data-dismiss="modal" style="text-decoration: none">Login</a>
            </form>
        </div>
    </div>
</div>
</div>