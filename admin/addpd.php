<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 01/04/2017
 * Time: 11:24
 */
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && isset($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 2:
            header('location:../user/index.php');//redirect to  page
            break;

    }
}
else
{

    header('Location:index.php');
}
include '../connection/db.php';
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $name= $res['Login_Username'];

}

?>

<?php
        
      require '../connection/db.php';

      if (isset($_POST['submit'])) {

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES["image"]["name"]);
                                
                                $location = "../upload/" . $_FILES["image"]["name"];
                $product_id_=$_POST['Product_Id'];
                $product_name_=$_POST['Product_Name'];
                $product_code_=$_POST['Product_Code'];
                //$product_price_=$_POST['product_price'];
                //$product_quantity_=$_POST['product_quantity'];
                                mysqli_query($con,"INSERT INTO Products_table(Product_Id,Product_Image,Product_Code,Product_Name)
      values ('$product_id_','$location','$product_code_','$product_name_')
      ") or die(mysqli_error($con));
         
       $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; New Product Added !
					</div>";
       echo '<meta content="4;addpd.php" http-equiv="refresh" />';

      }

                            
      ?>
<?php include 'sh.php'; ?>

            <!--********************Add content here *******************-->
            <form  method="POST" enctype="multipart/form-data" id="mytable">
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
        <div class="form-group has-feedback">
            <label>Product ID:</label>
            <input type="text" name="Product_Id"  id="in" required class="form-control"/>
        </div>
          <div class="form-group has-feedback">
              <label>Product Name:</label>
              <input type="text" name="Product_Name"  id="in" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <label>Product Code:</label>
              <input type="text" name="Product_Code"  id="in" required class="form-control"/>
          </div>

          <!--<div class="form-group has-feedback">
              <label>Product Quantity:</label>
              <input type="text" name="product_quantity"  id="in" required class="form-control"/>
          </div>-->
          <div class="form-group has-feedback">
              <input type="file" name="image"  id="in" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <input type="submit" name="submit" value="Upload" class="btn btn-primary" />
              <input type="reset" name="reset" value="Cancel Upload" class="btn btn-primary" />
          </div>

    </form>

        
<?php include 'sf.php';?>
            <!--********************Add content here *******************-->


