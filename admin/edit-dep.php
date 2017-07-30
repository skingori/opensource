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

$id=$_GET['edit'];

$result1 = mysqli_query($con, "SELECT * FROM Department_table WHERE Department_Id='$id'");

while($res = mysqli_fetch_array($result1))
{
    $Department_Name= $res['Department_Name'];
    $Department_Faculty= $res['Department_Faculty'];

}


if(isset($_POST['add'])) {


    $Department_Name_= $_POST['Department_Name'];
    $Department_Faculty_= $_POST['Department_Faculty'];
    //$Customer_flight_notification_message_status_= $_POST['Customer_flight_notification_message_status'];


//updating the table
    $result = mysqli_query($con, "UPDATE Department_table SET Department_Name='$Department_Name_', 
Department_Faculty='$Department_Faculty_' WHERE Department_Id=$id");



    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Product Supply Updated !
					</div>";

    echo '<meta content="4;departments.php" http-equiv="refresh" />';

}
?>

<?php include "header.php";?>

    <!-- Add content -->

    <form id="" method="POST">
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <div class="form-group label-floating">
            <label class="control-label">Department Name</label>
            <input type="text" class="form-control" required name="Department_Name" value="<?php echo $Department_Name?>">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Department Faculty</label>
            <input type="text" class="form-control" required name="Department_Faculty" value="<?php echo $Department_Faculty?>">
        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary" name="add" >Update Dep</button>

        </div>


    </form>

    <!-- #END# add content -->

<?php include "footer.php";?>