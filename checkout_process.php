<?php session_start();
 /**
 * Created by PhpStorm.
 * User: rozer
 * Date: 7/2/2017
 * Time: 9:50 AM
 */

include 'include/connection.php';
     if(isset($_REQUEST['chk_del_id']))
            {
                $chk_del_sql="DELETE FROM checkout WHERE chk_id='$_REQUEST[chk_del_id]'";
                $chk_del_run=mysqli_query($conn,$chk_del_sql);
            }
            if(isset($_REQUEST['up_chk_qty'])){
             $up_chk_qty_sql="update checkout set chk_qty='$_REQUEST[up_chk_qty]' WHERE chk_id='$_REQUEST[up_chk_id]'";
                $up_chk_qty_run=mysqli_query($conn,$up_chk_qty_sql);
            }
            $c=1;
            $i=1;
            $sub_total=0;
            $delivery_charges=45;
            echo "
            <table class='table'>
            <thead>
            <tr>
                <th>S.no</th>
                <th>Item</th>
                <th>qty</th>
                <th width='5%'>Delete</th>
                <th class='text-right'>Price</th>
                <th class='text-right'>Total</th>
            </tr>
            </thead>
            <tbody>
            ";

            //$chk_sell_sql="select * from checkout WHERE chk_ref='$_SESSION[ref]'";
            $chk_sel_sql="select * from checkout c JOIN items i ON c.chk_item=i.item_id WHERE chk_ref='$_SESSION[ref]'";
            $chk_sel_run=mysqli_query($conn,$chk_sel_sql);
            while($chk_sel_rows=mysqli_fetch_assoc($chk_sel_run))
            {
                $item_price=$chk_sel_rows['item_price']*$chk_sel_rows['chk_qty'];
                $total=$chk_sel_rows['item_cost']*$chk_sel_rows['chk_qty'];
                $sub_total+=$total;
                echo"  <tr>
                    <td>$c</td>
                    <td>$chk_sel_rows[item_title]</td>
                    <td><input type='number' style='width: 45px' onblur=up_chk_qty(this.value,'$chk_sel_rows[chk_id]'); value='$chk_sel_rows[chk_qty]'></td> 
                       "; ?>
                    <td><button class='btn btn-danger btn-sm' onclick="del_func(<?php echo $chk_sel_rows['chk_id'] ;?>)">Delete</button></td>
                    <?php
                   echo "<td class='text-right'><b>$item_price</b></td>
                    <td class='text-right'><b>$total/=</b></td>
                </tr>
                ";
                $c++;
            }
           $_SESSION['grand_total']= $grand_total=$sub_total+$delivery_charges;
        echo "
        </tbody>
        </table>
        <table class='table'>
            <thead>
            <tr>
                <th class='text-center' colspan='2'>Order Summary</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Subtotal</td>
                <td class='text-right'><b>$sub_total/=</b></td>
            </tr>
            <tr>
                <td>Delivery Charges</td>
                <td class='text-right'><b>$delivery_charges/=</b></td>
            </tr>
            <tr>
                <td>Grand Total</td>
                <td class='text-right'><b>$_SESSION[grand_total]/=</b></td>
            </tr>
            </tbody>
        ";

?>