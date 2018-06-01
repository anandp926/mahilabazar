<?php
include '../include/connection.php';
if(isset($_POST['item_submit'])){
    $item_title=mysqli_real_escape_string($conn,strip_tags($_POST['item_title'])) ;
    $item_category=mysqli_real_escape_string($conn,strip_tags($_POST['item_category']));
    $item_qty=mysqli_real_escape_string($conn,strip_tags($_POST['item_qty']));
    $item_price=mysqli_real_escape_string($conn,strip_tags($_POST['item_price']));
    $item_discount=mysqli_real_escape_string($conn,strip_tags($_POST['item_discount']));
    $a=($item_price*$item_discount)/100;
    $item_cost=mysqli_real_escape_string($conn,$item_price-$a);
    $item_description=mysqli_real_escape_string($conn,strip_tags($_POST['item_description']));

    if(isset($_FILES['item_image']['name'])) {
        $file_name=$_FILES['item_image']['name'];
        $path_address="../images/$file_name";
        $path_address_db="images/$file_name";
        $img_confirm = 1;
        $file_type = pathinfo($_FILES['item_image']['name'],PATHINFO_EXTENSION);
        if (isset($_FILES['item_image']['size']) > 20000) {
            $img_confirm = 0;
            echo "size is very big";
        }
        if ($file_type != 'jpg' && $file_type != 'jpeg' && $file_type != 'png'){
            $img_confirm = 0;
            echo "type is not matching.";
    }
        if($img_confirm==0)
        {

        }else{
            if(move_uploaded_file($_FILES['item_image']['tmp_name'],'$path_address')){
                $item_ins_sql="insert into items (item_img,item_title,item_desc,item_cat,item_qty,item_cost,item_price,
                item_discount) VALUES ('$path_address_db','$item_title','$item_description','$item_category','$item_qty','$item_cost','$item_price','$item_discount');";
               $item_ins_run= mysqli_query($conn,$item_ins_sql);
            }
        }
    }else{
        echo "sorry!";
    }
}
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
    <script src="js/app.js"></script>
    <style>
        .form-control{
            border-radius: 0;
        }
    </style>
</head>
<body>
<?php include 'includes/header.php';?>
<div class="container" >
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="col-md-4">
            <div class="form-group">
                <label>Item Image</label>
                <input type="file" class="form-control" name="item_image" required>
            </div>
            <div class="form-group">
                <label>Item Title</label>
                <input type="text" class="form-control" name="item_title" required>
            </div>
            <div class="form-group">
                <label>Item Category</label>
                <select class="form-control" name="item_category" required>
                    <option>Select category</option>
                    <?php
                    $cat_sql="select * from item_cat";
                    $cat_run=mysqli_query($conn,$cat_sql);
                    while($rows=mysqli_fetch_assoc($cat_run)){
                        $cat_name=ucwords($rows['cat_name']);
                        if($rows['cat_slug']==" "){
                            $cat_slug=$rows['cat_name'];
                        }else{
                            $cat_slug=$rows['cat_slug'];
                        }
                        echo "
                        <option value='$cat_slug'>$cat_name</option>
                        ";
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <label>Item Qty</label>
                <input type="number" class="form-control" name="item_qty" required>
            </div>
       <!--     <div class="form-group">
                <label>Item Cost</label>
                <input type="number" class="form-control" name="item_cost" required>
            </div>  -->
            <div class="form-group">
                <label>Item Price</label>
                <input type="number" class="form-control" name="item_price" required>
            </div>
            <div class="form-group">
                <label>Item Discount in %</label>
                <input type="number" class="form-control" name="item_discount" required>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-6">
         <div class="form-group">
                <label>Item Description</label>
                <textarea class="form-control" id="txtEditor" name="item_description"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" name="item_submit" >Add Item</button>
            </div>
        </div>
    </form>
    <br><br>
</body>
</html>
