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
?>

<?php


// Create connection
include "../connection/db.php";
// Check connection
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $id= $res['Login_Id'];

}
//get farmer id
if(isset($_POST['add'])) {

    $Employee_Id_ =$_POST['Employee_Id'];
    $Employee_Firstname_ =$_POST['Employee_Firstname'];
    $Employee_Lastname_ =$_POST['Employee_Lastname'];
    $Employee_Payroll_Number_ =$_POST['Employee_Payroll_Number'];
    $Employee_Email_ =$_POST['Employee_Email'];
    $Employee_Employement_Date_ =$_POST['Employee_Employement_Date'];
    $employee_contact_ =$_POST['employee_contact'];



    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO Employee_profile(Employee_Id ,
Employee_Firstname,Employee_Lastname,Employee_Payroll_Number,Employee_Email ,Employee_Employement_Date,employee_contact)
VALUES ('$Employee_Id_', '$Employee_Firstname_' ,'$Employee_Lastname_','$Employee_Payroll_Number_','$Employee_Email_','$Employee_Employement_Date_','$employee_contact_')";

    if ($con->query($sql) === TRUE) {
        $msg = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
            </div>";
        ?>
        <p align="center">
            <meta content="2;index.php?action=home" http-equiv="refresh" />
        </p>
        <?php
    } else {

        $msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
            </div>" . $sql . "<br>" . $con->error;
    }

    $con->close();
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

        <div class="form-group label-floating" hidden>
            <label class="control-label">Id</label>
            <input type="text" class="form-control" value="<?php echo $id;?>" required name="Employee_Id" readonly>
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Firstname</label>
            <input type="text" class="form-control" required name="Employee_Firstname">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Lastname</label>
            <input type="text" class="form-control" required name="Employee_Lastname">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Payroll Number</label>
            <input type="text" class="form-control" required name="Employee_Payroll_Number">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Employee Email</label>
            <input type="email" class="form-control" required name="Employee_Email">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Employement Date</label>
            <input type="date" class="form-control" required name="Employee_Employement_Date">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Contact</label>
            <input type="text" class="form-control" required name="employee_contact">
        </div>
        <div class="form-group">

            <button type="submit" class="btn btn-primary" name="add" >Update profile</button>

        </div>


    </form>

    <!-- #END# add content -->

<?php include "footer.php";?>