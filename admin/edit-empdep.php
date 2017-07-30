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

    $result1 = mysqli_query($con, "SELECT * FROM Employee_Department WHERE Employee_Department_id='$id'");

    while($res = mysqli_fetch_array($result1))
    {
    $Employee_Department_id= $res['Employee_Department_id'];
    $Employee_Dep_Department_Id= $res['Employee_Dep_Department_Id'];
    $Employee_Dep_Employee_Id= $res['Employee_Dep_Employee_Id'];

    }


if(isset($_POST['add'])) {


    $Employee_Dep_Department_Id_= $_POST['Employee_Dep_Department_Id'];
    $Employee_Dep_Employee_Id_= $_POST['Employee_Dep_Employee_Id'];
    //$Customer_flight_notification_message_status_= $_POST['Customer_flight_notification_message_status'];


//updating the table
    $result = mysqli_query($con, "UPDATE Employee_Department SET Employee_Dep_Department_Id='$Employee_Dep_Department_Id_', 
Employee_Dep_Employee_Id='$Employee_Dep_Employee_Id_' WHERE Employee_Department_id=$id");



    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Product Supply Updated !
					</div>";

    echo '<meta content="4;empdep.php" http-equiv="refresh" />';

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
            <label class="control-label">Employee Id</label>
            <input type="text" class="form-control" required name="Employee_Dep_Employee_Id" value="<?php echo $Employee_Dep_Employee_Id;?>" readonly>
        </div>

        <div class="form-group">
            <label>Department Id:</label>
            <select name="Employee_Dep_Department_Id" required class="form-control">
                <option selected></option>
                <?php
                $result = mysqli_query($con,"SELECT Department_Id FROM Department_table");
                while($row = mysqli_fetch_array($result))
                {
                    echo '<option value="'.$row['Department_Id'].'">';
                    echo $row['Department_Id'];
                    echo '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-primary" name="add" >Assign Dep</button>

        </div>


    </form>

    <!-- #END# add content -->

<?php include "footer.php";?>