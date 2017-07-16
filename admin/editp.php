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

$id = $_GET['id'];
$result1 = mysqli_query($con, "SELECT * FROM Products_table WHERE Product_Id='$id'");

while($res = mysqli_fetch_array($result1))
{
    $product_id= $res['Product_Id'];
    $product_code= $res['Product_Code'];
    $product_name= $res['Product_Name'];
    $product_image= $res['Product_Image'];

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
                $product_name_=$_POST['product_name'];
                $product_code_=$_POST['product_code'];
                //$product_quantity_=$_POST['product_quantity'];

                $result = mysqli_query($con, "UPDATE Products_table SET Product_Name='$product_name_',Product_Image='$location',Product_Code='$product_code_' WHERE Product_Id='$id'");
         
       $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; New Product Added !
					</div>";
       echo '<meta content="4;prod.php" http-equiv="refresh" />';

      }

                            
      ?>
<?php include 'sh.php'; ?>
            <div class="form-group has-feedback" hidden>
            <label>Product Name:</label>
            <input type="text" name="" value="<?php echo $product_id;?>" id="in" required class="form-control"/>
            </div>

            <!--********************Add content here *******************-->
            <form  method="POST" enctype="multipart/form-data" id="mytable">
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
          <div class="form-group has-feedback">
              <label>Product Name:</label>
              <input type="text" name="product_name" value="<?php echo $product_name;?>" id="in" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <label>Product Code:</label>
              <input type="text" name="product_code" value="<?php echo $product_code;?>" id="in" required class="form-control"/>
          </div>
          <!--<div class="form-group has-feedback">
              <label>Product Quantity:</label>
              <input type="text" name="product_quantity"  id="in" required class="form-control"/>
          </div>-->
          <div class="form-group has-feedback">
              <input type="file" name="image" value="<?php echo $product_image;?>" id="in" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <input type="submit" name="submit" value="Update" class="btn btn-primary" />
              <input type="reset" name="reset" value="Cancel Upload" class="btn btn-primary" />
          </div>

    </form>

        
<?php include 'sf.php';?>
            <!--********************Add content here *******************-->


