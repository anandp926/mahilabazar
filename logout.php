<?php
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 7/29/2017
 * Time: 7:58 PM
 */


session_start();
session_unset();
echo "Logout Successfully ";
session_destroy();
header("Location: index.php");
?>