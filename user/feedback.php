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

        case 1:
            header('location:../admin/index.php');//redirect to  page
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
    $lid=$res['login_id'];

}

?>
<?php
        
      require '../connection/db.php';

      if (isset($_POST['update'])) {
                $feedback_product_id_=$_POST['feedback_product_id'];
                $feedback_ratings_=$_POST['group-1'];
                $feedback_user_id_=$lid;
                $feedback_user_contact_=$_POST['feedback_user_contact'];
                                mysqli_query($con,"INSERT INTO feedback_table (feedback_product_id,feedback_ratings,feedback_user_id,feedback_user_contact)
      VALUES ('$feedback_product_id_','$feedback_ratings_','$feedback_user_id_','$feedback_user_contact_')
      ") or die(mysql_error());
         
       $msg = "<div class='alert alert-info'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Thank you for your feedback !
					</div>";
       echo '<meta content="2;" http-equiv="refresh" />';

      }

                            
      ?>
<?php include "h.php";?>
            <!--********************Add content here *******************-->
            <form class="" method="POST">
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                
                <div class="form-group">
                    <label>Product code:</label>
                    <select name="feedback_product_id" required class="form-control">
                            <?php

                            include("../connection/db.php");
                            $query = "SELECT * FROM products_table";
                            $result = mysqli_query($con,$query);
                            echo "<option>Select Product ID</option>";
                            while($row = mysqli_fetch_array($result))
                            {
                                   
                                    $product_code = $row[product_code];
                                    echo "<option>$product_code</option>";
                            }

                            ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Rate user</label>
                    <div class="acidjs-rating-stars">
                    <input type="radio" name="group-1" id="group-1-0" value="5" /><label for="group-1-0"></label>
                    <input type="radio" name="group-1" id="group-1-1" value="4" /><label for="group-1-1"></label>
                    <input type="radio" name="group-1" id="group-1-2" value="3" /><label for="group-1-2"></label>
                    <input type="radio" name="group-1" id="group-1-3" value="2" /><label for="group-1-3"></label>
                    <input type="radio" name="group-1" id="group-1-4"  value="1" /><label for="group-1-4"></label>
                    
                    </div>
                </div>
                <div class="form-group">
                    <label>Mobile number</label>
                    <input type="text" class="form-control" name="feedback_user_contact" required="" placeholder="Enter your contact">
                    
                </div>
                
                
                
                <div class="footer">

                    <button type="submit" name="update" class="btn bg-olive" value="Delete">Send Feedback</button>
                </div>
            </form>
            <!--********************Add content here *******************-->
    <?php include "f.php";?>






