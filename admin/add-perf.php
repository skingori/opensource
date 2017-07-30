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
?>
<?php


// Create connection
include "../connection/db.php";
// Check connection
//get the id
$empid = $_GET['id'];

if(isset($_POST['add'])) {
    $Performance_Employee_Id_ =$_POST['Performance_Employee_Id'];
    $Performance_Empl_Panctuality_ =$_POST['Performance_Empl_Panctuality'];
    $Performance_Empl_Skills_ =$_POST['Performance_Empl_Skills'];
    $Performance_Empl_Attendance_ =$_POST['Performance_Empl_Attendance'];
    $Performnce_Empl_Honesty_ =$_POST['Performnce_Empl_Honesty'];
    $Performnce_Empl_Communication_ =$_POST['Performnce_Empl_Communication'];
    $Perfomance_Empl_Integrity_ =$_POST['Perfomance_Empl_Integrity'];



    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO  Performance_Table(Performance_Employee_Id,Performance_Empl_Panctuality
,Performance_Empl_Skills,Performance_Empl_Attendance,Performnce_Empl_Honesty,Performnce_Empl_Communication,Perfomance_Empl_Integrity)
VALUES ('$Performance_Employee_Id_' ,'$Performance_Empl_Panctuality_',
'$Performance_Empl_Skills_','$Performance_Empl_Attendance_','$Performnce_Empl_Honesty_',
'$Performnce_Empl_Communication_','$Perfomance_Empl_Integrity_')";

    if ($con->query($sql) === TRUE) {
        $msg = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
            </div>";
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
            <label class="control-label">Employee Id</label>
            <input type="text" class="form-control" required name="Performance_Employee_Id" value="<?php echo $empid?>" >
        </div>
        <div class="form-group label-floating">
            <label class="control-label">In 1-5 rate employee panctuality</label>
            <select class="form-control" name="Performance_Empl_Panctuality">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

        </div>
        <div class="form-group label-floating">
            <label class="control-label">How is employee skilled?</label>
            <select class="form-control" name="Performance_Empl_Skills">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

        </div>
        <div class="form-group label-floating">
            <label class="control-label">How is the employee attendance? 1-5</label>
            <select class="form-control" name="Performance_Empl_Attendance">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

        </div>
        <div class="form-group label-floating">
            <label class="control-label">Rate the honesty of the employee</label>
            <select class="form-control" name="Performnce_Empl_Honesty">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

        </div>
        <div class="form-group label-floating">
            <label class="control-label">Does he/she has good communication skills?</label>
            <select class="form-control" name="Performnce_Empl_Communication">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

        </div>
        <div class="form-group label-floating">
            <label class="control-label">Rate the integrity of the employee</label>
            <select class="form-control" name="Perfomance_Empl_Integrity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary" name="add" >Add Performance</button>

        </div>


    </form>

    <!-- #END# add content -->

<?php include "footer.php";?>