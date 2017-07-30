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
}elseif(!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header('Location:../sessions.php');
}
else
{

    header('Location:index.php');
}
include '../connection/db.php';

$id=$_GET['edit'];

$result1 = mysqli_query($con, "SELECT * FROM Employee_disciplinary WHERE Emp_discip_id='$id'");

while($res = mysqli_fetch_array($result1))
{
    $Emp_discip_id= $res['Emp_discip_id'];
    $Emp_Discip_Employee_Id= $res['Emp_Discip_Employee_Id'];
    $Emp_discip_Comments= $res['Emp_discip_Comments'];

}


$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $usernam= $res['Login_Username'];

}

?>
<?php

if(isset($_POST['add'])) {


    $Emp_Discip_Employee_Id_= $_POST['Emp_Discip_Employee_Id'];
    $Emp_discip_Comments_= $_POST['Emp_discip_Comments'];
    //$Customer_flight_notification_message_status_= $_POST['Customer_flight_notification_message_status'];
    $Emp_discip_date_= $_POST['Emp_discip_date'];

//updating the table
    $result = mysqli_query($con, "UPDATE Employee_disciplinary SET Emp_Discip_Employee_Id='$Emp_Discip_Employee_Id_', 
Emp_discip_date='$Emp_discip_date_'
  ,Emp_discip_Comments='$Emp_discip_Comments_' WHERE Emp_discip_id=$id");



    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Product Supply Updated !
					</div>";

    echo '<meta content="4;discip.php" http-equiv="refresh" />';

}
?>

<?php include "header.php";?>

    <form action="" method="post">
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>


        <div class="form-group">
            <label for="Customer_flight_notification_message">Employee ID</label>
            <input  type="text" name="Emp_Discip_Employee_Id" required class="form-control" placeholder="Optional" value="<?php echo $Emp_Discip_Employee_Id ?>" readonly>
        </div>

        <div class="form-group">
            <label for="api_secret">Disciplinary Date</label>
            <input  type="date" id="" name="Emp_discip_date" required class="form-control" placeholder="Required">
        </div>


        <div class="form-group">
            <label for="">More Details</label>
            <textarea rows="6" type="" name="Emp_discip_Comments" required class="form-control" placeholder=""><?php echo $Emp_discip_Comments?></textarea>
        </div>


        <button type="submit" name="add" class="btn btn-info">Update</button>

    </form>


<?php include "footer.php";?>