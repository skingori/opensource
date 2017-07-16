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
          
                $supplier_product_supplier_id_=$_POST['supplier_product_supplier_id'];
                $supplier_product_product_id_=$_POST['supplier_product_product_id'];
                $supplier_product_price_=$_POST['supplier_product_price'];
                
                                mysqli_query($con,"INSERT INTO Supplier_products(Sup_Prod_Supplier_Id,Sup_Prod_Product_Id,Sup_Prod_Product_Price)
      values ('$supplier_product_supplier_id_','$supplier_product_product_id_','$supplier_product_price_')
      ") or die(mysqli_error($con));
         
       $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Product_Supply Registered !
					</div>";
       echo '<meta content="4;supplier.php" http-equiv="refresh" />';

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
              <label>Product Code:</label>
                      <select name="supplier_product_product_id" required class="form-control">
                           <option selected="">...Select Code...</option>
                            <?php
                            //include("../connection/db.php");
                            $query = "SELECT * FROM Products_table";
                            $result = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($result))
                            {
                                $product_id = $row[Product_Id];
                                $product_code=$row[Product_Code];
                                //$user_lastname = $row[user_lastname];
                                //$user_firstname= $row[user_firstname];
                                echo "<option>$product_code</option>";
                            }
                            ?>
                      </select>
              <a href="javascript:window.open('add.php','mypopuptitle','width=700,height=600')">Add New</a>
          </div>
          <div class="form-group has-feedback">
              <label>Supplier ID:</label>
                      <select name="supplier_product_supplier_id" required class="form-control">
                           <option selected="">...Select ID...</option>
                            <?php
                            //include("../connection/db.php");
                            $query = "SELECT * FROM Supplier_table";
                            $result = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($result))
                            {
                                $supplier_id = $row[Supplier_Id];
                                $supplier_contact=$row[Supplier_Contact];
                                //$user_lastname = $row[user_lastname];
                                //$user_firstname= $row[user_firstname];
                                echo "<option>$supplier_contact</option>";
                            }
                            ?>
                      </select>
              <a href="javascript:window.open('supplier.php','mypopuptitle','width=600,height=400')">Add ID</a>
          </div>
          <div class="form-group has-feedback">
              <label>Product Price:</label>
              <input class="form-control" type="text" name="supplier_product_price" placeholder="Price">
          </div>
          <div class="form-group has-feedback">
              <input type="submit" name="submit" value="Add Product/Supplier" class="btn btn-primary" />
          </div>

    </form>

        

            <!--********************Add content here *******************-->
<?php include 'sf.php'; ?>

