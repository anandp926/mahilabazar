<?php session_start();
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 7/26/2017
 * Time: 10:54 PM
 */
include 'include/connection.php';
if(isset($_REQUEST['cart_item'])){
    $cart_del_sql="delete from cart where cart_id='$_REQUEST[cart_item]';";
    $cart_dql_run=mysqli_query($conn,$cart_del_sql);
}

$cart_sql="select count(*) AS 'total' from cart WHERE cart_ref='$_SESSION[cart_ref]';";
$cart_run=mysqli_query($conn,$cart_sql);
$count=mysqli_fetch_assoc($cart_run);
if($count['total']==0){
    echo "
    <h2 class='text-center'><span style='color: red'>SORRY!</span>&nbsp;Your cart is empty.</h2>
    ";
}else{

    $cart_sql="select * from cart c JOIN items i ON c.cart_item=i.item_id WHERE cart_ref='$_SESSION[cart_ref]'";
    $cart_run=mysqli_query($conn,$cart_sql);
    while($cart_rows=mysqli_fetch_assoc($cart_run)) {
        echo "
 <div class='row' style='border: 1px dotted silver' >
        <div class='col-md-10' >
            <table class='table table-borderless' style='margin-top: 1.6%'>
                <tbody>
                <tr >
                    <td class='text-center'><img src='$cart_rows[item_img]'></td>
                    <td class='text-center'><h4>$cart_rows[item_title]</h4></td>
                    <td class='text-center'>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>$cart_rows[item_cost]</span>&nbsp&nbsp&#8377<del>$cart_rows[item_price]</del>&nbsp<span style='color: red'>($cart_rows[item_discount]% OFF)</span></p></td>
                    ";?><td class='col-md-2 text-center'>
                    <button class='btn btn-danger ' onclick='cart_del_func(<?php echo $cart_rows['cart_id'] ;?>)' >Remove</button></td>
                   <td class='text-center'><a href="products.php?&item_title=<?php echo $cart_rows['item_title'];?>,&item_id=<?php echo $cart_rows['item_id']?>"><button class='btn btn-primary ' style='width: 78.14px ; height: 34px;'>BUY</button></a></td>
            <?php echo "    </tr>
                </tbody>
            </table>
        </div>
    </div>
<br>
";
    }
}

?>