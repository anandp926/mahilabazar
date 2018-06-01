<?php session_start();
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 6/17/2017
 * Time: 6:58 AM
 */
include 'include/connection.php';
?>
<html>
<head>
    <title>Product details</title>
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
            .single-item{
                margin-top: 10px;
                margin-bottom: 20px;
                height: 340px;
                width: 180px;
                border: 1px dotted #d4d5d9;
                display: block;
            }
            .top{
                background: red;
                height:240px;
            }
            .top img{
                height:100%;
                width:178px;
            }
            .bottom{
                height: 100px;
            }
            .item-title{
                font-size: 13px;
                margin: 0;
                margin-top: 0;
                margin-left: 10px;
                padding-top: 10px;
                color: maroon;
            }
            .tb{
                font-weight: 500;
                font-size: 11px;
            }
            .dec{
                font-weight: 500;
                font-size: 11px;
            }
            td a{
                display: inline-block;
                height: 100%;
                width: 100%;
                cursor: pointer;
            }
            .table-borderless > tbody > tr > td,
            .table-borderless > tbody > tr > th,
            .table-borderless > tfoot > tr > td,
            .table-borderless > tfoot > tr > th,
            .table-borderless > thead > tr > td,
            .table-borderless > thead > tr > th {
                border: none;
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
        function cart_ajax(item_id)
        {
            xmlhttp=new XMLHttpRequest();
            xmlhttp.open('GET','cart.php?cart_item_id='+item_id,true);
            xmlhttp.send();

        }
        function my() {
            $('#myModal').modal('show');
        }
    </script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include'include/header.php'?>
<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <?php
            if(isset($_GET['item_id'])) {
            $sql = "select * from items WHERE item_id=$_GET[item_id]";
            $run = mysqli_query($conn,$sql);
            while ($rows = mysqli_fetch_assoc($run)) {
            $item_cat=ucwords($rows['item_cat']);
            $item_id=$rows['item_id'];
            $item_desc=$rows['item_desc'];
                echo " 
            <li><a href='category.php?category=$item_cat'>$item_cat</a></li>
            <li class='active'>$rows[item_title]</a></li>
            ";
            ?>
        </ol>
    </div>
    <div class="row">
        <?php echo "
        <div class='col-sm-7'>
            <div>
                <div class='col-sm-2' style=' width: 100px;'>
                    <table class='table table-borderless'>
                        <tbody >
                        <tr >
                            <td><a href='#'><img class='img-responsive' src='images/kurta_sm_1.jpg' ></a></td>
                        </tr>
                        <tr >
                            <td><a href='#'> <img class='img-responsive' src='images/kurta_sm_2.jpg'></a></td>
                        </tr>
                        <tr >
                            <td><a href='#'> <img class='img-responsive' src='images/kurta_sm_3.jpg'> </a></td>
                        </tr>
                        <tr >
                            <td><a href='#'> <img class='img-responsive' src='images/kurta_sm_4.jpg'></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <img class='img-responsive' src='$rows[item_img]'>
                </div>
       
        
</div>
<aside class='col-sm-5'>
    <p><h2>$rows[item_title]</h2>
    <span style='font-size: 13px'>&#8377&nbsp;</span><span style='font-size: larger'><del>$rows[item_price]</del></span>&nbsp;&nbsp;<span style='font-size: larger; color: red'>($rows[item_discount]% OFF)</span><br/>
    <span style='font-size: larger'>&#8377&nbsp;</span><span style='font-size: x-large;'>$rows[item_cost]</span>
    </p>
      ";
         }}
    ?>
    <a href='javascript:;' <?php if(!isset($_SESSION['uid'])){?> onclick="my()" <?php }else {?> onclick="window.location='checkout.php?chk_item_id=<?php echo $item_id;?>'"<?php }?> class='btn btn-danger btn-lg'><div class='glyphicon glyphicon-briefcase'></div>&nbsp;&nbsp;&nbsp;Buy</a>&nbsp;&nbsp;
    <a href='javscript:' <?php if(!isset($_SESSION['uid'])){?> onclick="my()" <?php }else {?> onclick="cart_ajax(<?php echo $item_id; ?> )"<?php }?> class='btn btn-primary btn-lg '><div class='glyphicon glyphicon-shopping-cart'>&nbsp;</div>Add to Cart</a>
    <br><br>
    <h4 class='pp-desc-head'>Description</h4>
    <div class='pp.desc-details' style='text-justify: auto'>
       <?php echo $item_desc;?>
    </div>
    <br><br><br>
    <div class="row">
        <div class="col-md-1"><i class="fa fa-plane"></i></div>
        <div class="col-md-5">Fast delivery within 3 Days </div>
    </div><br/>
    <div class="row">
        <div class="col-md-1"><i class="fa fa-truck"></i></div>
        <div class="col-md-5">Easy return within 10 days</div>
    </div><br/>
    <div class="row">
        <div class="col-md-1"><div class="glyphicon glyphicon-phone-alt"></div> </div>
        <div class="col-md-5">Call at 9041259277</div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-1"><div class="glyphicon glyphicon-repeat normal-right-spinner"></div></div>
        <div class="col-md-5">24*7 customer care</div>
    </div>
</aside>
    </div>
    <div class="page-header">
        <h2>Related item</h2>
    </div>
    <section class="row">
        <?php
        $rel_sql="select * from items ORDER BY rand() limit 4";
        $rel_run=mysqli_query($conn,$rel_sql);
        while($rel_rows=mysqli_fetch_assoc($rel_run)){
            $item_title = str_replace(' ', '-', $rel_rows['item_title']);
         echo"
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=$item_title,&item_id=$rel_rows[item_id]'> <img  src='$rel_rows[item_img]'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=$item_title,&item_id=$rel_rows[item_id]' style='text-decoration: none'>$rel_rows[item_title]</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>$rel_rows[item_cost]</span>&nbsp&nbsp&#8377<del>$rel_rows[item_price]</del>&nbsp<span style='color: red'>($rel_rows[item_discount]% OFF)</span></p>
                <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                <tbody class='dec'>
                <tr>
                <td class='text-center'><a href='products.php?&item_title=$item_title,&item_id=$rel_rows[item_id]' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                <td class='text-center'>
                ";?>
            <a href='javscript:' <?php if(!isset($_SESSION['uid'])){?> onclick="my()" <?php }else {?> onclick="cart_ajax(<?php echo $rel_rows['item_id'] ?> )"<?php }?>
                   style='color: #526cd0; text-decoration: none;'>ADD TO CART</a></td>
              <?php echo"  </tr>
                </tbody>
                    </table>
                </div>
            </div>
        </div>
         ";
        }
        ?>
    </section>
    <br><br><br><br>
    <div class="clearfix"></div>
    <?php include'include/footer.php'; ?>
</body>
</html>
