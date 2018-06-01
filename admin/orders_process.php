<?php
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 7/25/2017
 * Time: 2:36 PM
 */
include '../include/connection.php';
if(isset($_REQUEST['order_status'])){
    $up_sql="UPDATE orders SET status='$_REQUEST[order_status]' WHERE order_id='$_REQUEST[order_id]';";
    mysqli_query($conn,$up_sql);
}
if(isset($_REQUEST['return_status'])){
    $re_sql="UPDATE orders SET return_status='$_REQUEST[return_status]' WHERE order_id='$_REQUEST[order_id]';";
    mysqli_query($conn,$re_sql);
}
?>
<table class="table table-bordered table-striped">
    <thead class="item-head">
    <tr>
        <th>S.no</th>
        <th>Buyer Name</th>
        <th>Buyer Email</th>
        <th>Buyer Contact</th>
        <th>Buyer State</th>
        <th>Buyer Delivery Address</th>
        <th>Order ref</th>
        <th class="text-right">Total Paymnent</th>
        <th>Status</th>
        <th>Return Status</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $c=1;
    $order_sql="select * from orders";
    $order_run=mysqli_query($conn,$order_sql);
    while($rows=mysqli_fetch_assoc($order_run))
    {
        if($rows['status']==0){
            $btn_class='btn-warning';
            $btn_value='Pending';
        }else{
            $btn_class='btn-success';
            $btn_value='Sent';
        }
        if($rows['return_status']==0){
            $btn1_class='btn-danger';
            $btn1_value='Returned';
        }else{
            $btn1_class='btn-primary';
            $btn1_value='No Return';
        }
        echo " 
        <tr>
        <td>$c</td>
        <td>$rows[buyer_name]</td>
        <td>$rows[buyer_email]</td>
        <td>$rows[buyer_contact]</td>
        <td>$rows[buyer_state]</td>
        <td>$rows[buyer_del_add]</td>
        <td>
      <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal1$rows[order_id]'>$rows[buyer_ref]</button>
       <div id='myModal1$rows[order_id]' class='modal fade' role='dialog'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'>Modal Header</h4>
            </div>
            <div class='modal-body'>
                <table class='table'>
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Item</th>
                                <th>qty</th>
                                <th>Price</th>
                                <th class='text-right'>Sub-Total</th>
                            </tr>
                            </thead>
                            <tbody>";
                            $c=1;
                          // $chk_sql="select * from checkout WHERE chk_ref='$rows[buyer_ref]'";
                           $chk_sql="select * from checkout c join items i ON c.chk_item=i.item_id WHERE c.chk_ref='$rows[buyer_ref]'";
                             $chk_run=mysqli_query($conn,$chk_sql);
                                while($chk_rows=mysqli_fetch_assoc($chk_run)){
                                    if($chk_rows['item_title']==' '){
                                        $item_title='Sorry Data Deleted';
                                    }else{
                                        $item_title=$chk_rows['item_title'];
                                    }
                                    echo "
                                        <tr>
                                            <td>$c</td>
                                            <td>$item_title</td>
                                            <td>$chk_rows[chk_qty]</td>
                                            <td>$chk_rows[item_price]</td>
                                            <td class='text-right'>$chk_rows[item_cost]</td>
                                        </tr>
                                    ";
                                    $c++;
                                }

        echo"
                    </tbody>
                        </table>
                     <table class='table'>
                     <thead>
                        <tr>
                        <th colspan='2' class='text-center'>Order Summary</th>
                        </tr>
                        </thead>
                            <tbody>
                            <tr>
                            <td>Total</td>
                            <td class='text-right'>$rows[order_payment]/</td>
</tr>
</tbody>
                            </table>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>
        </div>
        </td>
        <td class='text-right'>$rows[order_payment]</td>;"?>
        <td class='col-md-1'>
        <button class='btn  <?php echo $btn_class ?> btn-block' onclick="order_status(<?php echo $rows['status'].','.$rows['order_id'] ?>)"><?php echo $btn_value ?></button></td>
        <td class="col-md-1">
            <button class="btn btn-block <?php echo $btn1_class?>" onclick="return_status(<?php echo $rows['return_status'].','.$rows['order_id']?>)" ><?php echo $btn1_value ?></button>
        </td>
    </tr>
       <?php
    }
    ?>
    </tbody>
</table>
