<?php session_start();
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 6/21/2017
 * Time: 11:11 AM
 */
include 'include/connection.php';


?>
<html>
<head>
    <title>mahilaBazar</title>
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
        .txt tr td{
            font-size: 13px;
            font-family: "Arial Rounded MT Bold";
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
        function cart_ajax(item_id) {
            xmlhttp=new XMLHttpRequest();
            xmlhttp.open('GET','cart.php?cart_item_id='+item_id,true);
            xmlhttp.send()
        }
        function my() {
            $('#myModal').modal('show');
        }
        function chkbox_ajax(val) {
            xmlhttp=new XMLHttpRequest();
            xmlhttp.open('POST','category.php?val='+val,true);
            xmlhttp.send();
        }
    </script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include'include/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-2 pull-left" style="padding-top: 10px">
            <table class="table" style="border: 1px solid silver">
                <thead>
                <tr>
                    <th class="text-center">Sort By </th>
                </tr>
                </thead>
                <tbody class="txt">
                <form method="post">
                <tr>
                <td><input type="checkbox" name="chkbox" onclick="chkbox_ajax(this.value)" value="chk1">&nbsp;&nbsp;&nbsp;&#8377<span>0</span> to &#8377<span>2000</span>
                </td></tr>
                <tr>   <td><input type="checkbox" name="chkbox" onclick="chkbox_ajax(this.value)" value="chk2">&nbsp;&nbsp;&nbsp;&#8377<span>2001</span> to &#8377<span>5000</span>
                   </td></tr>
                 <tr> <td><input type="checkbox" name="chkbox" onclick="chkbox_ajax(this.value)" value="chk3">&nbsp;&nbsp;&nbsp;&#8377<span>5001</span> to &#8377<span>1000</span>
                  </td></tr>
                 <tr>  <td><input type="checkbox" name="chkbox" onclick="chkbox_ajax(this.value)" value="chk4">&nbsp;&nbsp;&nbsp;above &#8377<span>10001</span>
                   </td></tr>
                </form>
                </tbody>
            </table>
        </div>
        <div class="col-md-10 pull-right" >
        <?php
        if(isset($_GET['category'])) {
            $sql = "select * from items WHERE item_cat='$_GET[category]'";
            $run = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($run)) {
                $item_title = str_replace(' ', '-', $rows['item_title']);
                echo " 
        <div class='col-sm-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=$item_title,&item_id=$rows[item_id]'><img  src='$rows[item_img]'></a></div>
                <div class='bottom'>
                <h3 class='item-title text-center'><a href='products.php?&item_title=$item_title,&item_id=$rows[item_id]' style='text-decoration: none'> $rows[item_title]</a></h3>
                <p class='text-center tb' style='padding-top: 4%'>&#8377<span>$rows[item_cost]</span>&nbsp&nbsp&#8377<del>$rows[item_price]</del>&nbsp<span style='color: red'>($rows[item_discount]% OFF)</span></p>
                <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                <tbody class='dec'>
                <tr>
                <td class='text-center'><a href='products.php?&item_title=$item_title,&item_id=$rows[item_id]' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                <td class='text-center'>
                ";?>
                <a href='javscript:' <?php if(!isset($_SESSION['uid'])){?> onclick="my()" <?php }else {?> onclick="cart_ajax(<?php echo $rows['item_id'] ?> )"<?php }?>
                   style='color: #526cd0; text-decoration: none;'>ADD TO CART</a></td>
                <?php echo "</tr>
                </tbody>
                    </table>
                </div>
            </div>
        </div> ";
            }
        }
        ?>
       </div>
    </div>
</div>
<br><br><br><br>
<div class="clearfix"></div>
<?php include'include/footer.php'; ?>
</body>
</html>
