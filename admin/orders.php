<?php
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 7/25/2017
 * Time: 2:27 AM
 */?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin_css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function order() {
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function () {
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById('get_order_process').innerHTML=xmlhttp.responseText;
            }
            }
            xmlhttp.open('GET','orders_process.php',true);
            xmlhttp.send();
        }
        function order_status(order_status,order_id) {
        if(order_status==0){
                order_status=1;
            }else{
                order_status=0;
            }
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function () {
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('get_order_process').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','orders_process.php?order_status='+order_status+'&order_id='+order_id,true);
            xmlhttp.send();
        }
        function return_status(return_status,order_id) {
           if(return_status==0){
                return_status=1;
            }else{
                return_status=0;
            }
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function () {
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('get_order_process').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','orders_process.php?return_status='+return_status+'&order_id='+order_id,true);
            xmlhttp.send();
        }
    </script>
</head>
<body onload="order();">
    <?php include 'includes/header.php'?>
<div class="container">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="get_order_process"></div>
    </div>
</body>
</html>
