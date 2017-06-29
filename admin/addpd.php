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

$result1 = mysqli_query($con, "SELECT * FROM login_table WHERE login_username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $name= $res['login_name'];

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
                $product_price_=$_POST['product_price'];
                //$product_quantity_=$_POST['product_quantity'];
                $product_category_id_=$_POST['product_category_id'];
                $product_desc_=$_POST['product_desc'];
                                mysqli_query($con,"INSERT INTO products_table (product_name,product_image,product_code,product_price,product_category_id,product_desc)
      values ('$product_name_','$location','$product_code_','$product_price_','$product_category_id_','$product_desc_')
      ") or die(mysql_error());
         
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
              <label>Product Name:</label>
              <input type="text" name="product_name"  id="in" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <label>Product Code:</label>
              <input type="text" name="product_code"  id="in" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <label>Product Price:</label>
              <input type="text" name="product_price"  id="in" required class="form-control"/>
          </div>
          <!--<div class="form-group has-feedback">
              <label>Product Quantity:</label>
              <input type="text" name="product_quantity"  id="in" required class="form-control"/>
          </div>-->
          <div class="form-group has-feedback">
              <label>Product Description:</label>
              <input type="text" name="product_desc"  id="in" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <label>Product Category:</label>
                      <select name="product_category_id" required class="form-control">
                           <option>
                                <?php
                          $result = mysqli_query($con,"SELECT category_name FROM category_table");
                          while($row = mysqli_fetch_array($result))
                            {
                              echo '<option value="'.$row['category_name'].'">';
                              echo $row['category_name'];
                              echo '</option>';
                            }
                          ?>
                      </select>
              <a href="javascript:window.open('catego.php','mypopuptitle','width=600,height=400')">Add Category</a>
          </div>
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


