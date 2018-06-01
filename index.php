<?php
session_start();
include 'include/connection.php';
?>
<html>
<head>
    <title>mahilaBazar</title>
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
        .modal {
            text-align: center;
        }
        @media screen and (min-width: 768px) {
            .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }
        }
        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
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
            xmlhttp.send();
        }
        function my() {
            $('#myModal').modal('show');
        }
    </script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include 'include\header.php'; ?>
<div class="container">
    <div class="row">
        <?php
        $sql="select * from items ORDER BY rand()";
        $run=mysqli_query($conn,$sql);
        while($rows=mysqli_fetch_assoc($run)){
            $item_title=str_replace(' ','-',$rows['item_title']);
            echo " 
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=$item_title,&item_id=$rows[item_id]'><img  src='$rows[item_img]'></a></div>
                <div class='bottom'>
                <h3 class='item-title text-center'><a href='products.php?&item_title=$item_title,&item_id=$rows[item_id]' style='text-decoration: none' > $rows[item_title]</a></h3>
                <p class='text-center tb' style='padding-top: 4%'>&#8377<span>$rows[item_cost]</span>&nbsp&nbsp&#8377<del>$rows[item_price]</del>&nbsp<span style='color: red'>($rows[item_discount]% OFF)</span></p>
                <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                <tbody class='dec'>
                <tr>
            <td class='text-center'><a href='products.php?&item_title=$item_title,&item_id=$rows[item_id]' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                <td class='text-center'>
             ";?>   <a href='javscript:' <?php if(!isset($_SESSION['uid'])){?> onclick="my()" <?php }else {?> onclick="cart_ajax(<?php echo $rows['item_id'] ?> )"<?php }?>
                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
            <?php echo "  </tr>
                </tbody>
                    </table>
                </div>
            </div>
        </div> ";
        }
        ?>
    </div>
</div>
<br><br><br><br>
<div class="clearfix"></div>
<?php include'include\footer.php'; ?>
</body>
</html>