<?php
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 7/20/2017
 * Time: 5:08 PM
 */
include'../include/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Item list | mahilaBazar | Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin_css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <script>
        function item_list_data(){
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('get_item_list_data').innerHTML=xmlhttp.responseText;
                }
            }

            xmlhttp.open('GET','item_id_process.php',true);
            xmlhttp.send();
        }
        function del_item(item_id) {
            xmlhttp.open('GET','item_id_process.php?del_item_id='+item_id,true);
            xmlhttp.send();
        }
    </script>
</head>
<body onload="item_list_data();">
    <?php include 'includes/header.php';?>
<div class="container" >
    <div id="get_item_list_data"></div>
</div>
 </body>
</html>
