<?php
/**
 * Created by PhpStorm.
 * User: rozer
 * Date: 7/22/2017
 * Time: 4:33 PM
 */
include '../include/connection.php';
if(isset($_REQUEST['del_item_id']))
{
    $del_sql="delete from items where item_id='$_REQUEST[del_item_id]'";
    $del_run=mysqli_query($conn,$del_sql);
}
;?>
<table class='table table-bordered table-striped'>
    <thead class='item-head'>
    <tr>
        <th>S.no</th>
        <th>Image</th>
        <th>Item Title</th>
        <th>Item Description</th>
        <th>Item Category</th>
        <th>Item Qty</th>
        <th>Item Cost</th>
        <th>Item Price</th>
        <th>Item Discount</th>
        <th>Item Delivered</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $c=1;
    $sel_sql="select *from items";
    $sel_run=mysqli_query($conn,$sel_sql);
    while($rows=mysqli_fetch_assoc($sel_run)){
        echo "
        <tr>
            <td>$c</td>
            <td><img src='../$rows[item_img]'></td>
            <td>$rows[item_title]</td>
            <td>";echo strip_tags($rows['item_desc']);echo "</td>
            <td>$rows[item_cat]</td>
            <td>$rows[item_qty]</td>
            <td>$rows[item_cost]</td>
            <td>$rows[item_price]</td>
            <td>$rows[item_discount]</td>
            <td>30</td>
            <td>
            <div class='dropdown'>
        <button class='btn btn-danger dropdown-toggle ' type='button' data-toggle='dropdown' style='background-color: red'>Actions
        <span class='caret'></span></button>
        <ul class='dropdown-menu dropdown-menu-right'>
        <li><a href='#edit_item' data-toggel='modal'>Edit</a>
        </li>"; ?>
        <li><a href='javascript:;' onclick="del_item(<?php echo $rows['item_id']; ?>);">Delete</a></li>
<?php echo" </ul>
  <div class='modal' id='edit_item'>
        <div class='modal-content'>
        <div class='modal-header'>header</div>
        <div class='modal-body'>body</div>
        <div class='modal-footer'>footer</div>
</div>
</div>
</td>
        </tr>
        ";
        $c++;
    }
    ?>
    </tbody>
</table>

