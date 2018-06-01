<?php
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 8/14/2017
 * Time: 1:51 AM
 */
require_once 'app/init.php';
if(!empty($_POST)){
    if (isset($_POST['title'],$_POST['body'],$_POST['keywords'])){
       $title= $_POST['title'];
        $body=$_POST['body'];
        $keywords=explode(',',$_POST['keywords']);
    echo $title;
    }
}
?>

<html>
<head>

</head>
<body>
<form action="add.php" method="post" autocomplete="off">
    <input type="text" name="title" >
    <textarea name="body"></textarea>
    <input type="text" name="keywords">
    <button type="button" name="submit"></button>
</form>
</body>
</html>
