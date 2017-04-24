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
          
                $supplier_name_=$_POST['supplier_name'];
                $supplier_address_=$_POST['supplier_address'];
                $supplier_contact_=$_POST['supplier_contact'];
                
                                mysqli_query($con,"INSERT INTO supplier_table(supplier_name,supplier_address,supplier_contact)
      values ('$supplier_name_','$supplier_address_','$supplier_contact_')
      ") or die(mysql_error());
         
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
              <label>Supplier Name:</label>
                      <select name="supplier_name" required class="form-control">
                           <option selected="">...Select Name...</option>
                            <?php
                            //include("../connection/db.php");
                            $query = "SELECT * FROM login_table";
                            $result = mysqli_query($con,$query);
                            echo "<option></option>";
                            while($row = mysqli_fetch_array($result))
                            {
                                $id = $row[id];
                                $login_name=$row[login_name];
                                //$user_lastname = $row[user_lastname];
                                //$user_firstname= $row[user_firstname];
                                echo "<option>$login_name</option>";
                            }
                            ?>
                      </select>
              <a href="javascript:window.open('add.php','mypopuptitle','width=700,height=600')">Add New</a>
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
