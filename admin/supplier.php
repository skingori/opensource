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

                $supplier_id_=$_POST['supplier_id'];
                $supplier_name_=$_POST['supplier_name'];
                $supplier_address_=$_POST['supplier_address'];
                $supplier_contact_=$_POST['supplier_contact'];
                
                                mysqli_query($con,"INSERT INTO Supplier_table(Supplier_Id,Supplier_Name,Supplier_Address,Supplier_Contact)
      values ('$supplier_id_','$supplier_name_','$supplier_address_','$supplier_contact_')
      ") or die(mysqli_error($con));
         
       $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Supplier Registered !
					</div>";
       echo '<meta content="4;supplier.php" http-equiv="refresh" />';

      }

                            
      ?>

<!-- including header -->
<?php
require 'sh.php';
?>
            <!--********************Add content here *******************-->
            <form  method="POST" enctype="multipart/form-data" id="mytable">
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
            <div class="form-group has-feedback">
                <label>Supplier ID:</label>
                <input type="text" name="supplier_id"  id="in" placeholder="Supplier ID" required class="form-control">
            </div>
            <div class="form-group has-feedback">
                <label>Supplier Name:</label>
                <input type="text" name="supplier_name"  id="in" placeholder="Supplier Name" required class="form-control">
            </div>
          <div class="form-group has-feedback">
              <label>Mobile Number:</label>
              <input type="text" name="supplier_contact" placeholder="0724090774" id="in" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <label>Supplier Address:</label>
              <input type="text" name="supplier_address"  id="in" placeholder="123-45678 NAIROBI" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <input type="submit" name="submit" value="Add Supplier" class="btn btn-primary" />
          </div>

    </form>

            <!--********************Add content here *******************-->
<?php
include 'sf.php';
?>
