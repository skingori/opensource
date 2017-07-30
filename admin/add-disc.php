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
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $usernam= $res['Login_Username'];

}

?>
<?php

require_once '../connection/db.php';
//-- GET LOGIN ID FROM LINK -->
$emlid = $_GET['id'];


if(isset($_POST['add'])) {


    $Emp_Discip_Employee_Id_= $_POST['Emp_Discip_Employee_Id'];
    $Emp_discip_date_= $_POST['Emp_discip_date'];
    //$Customer_flight_notification_message_status_= $_POST['Customer_flight_notification_message_status'];
    $Emp_discip_Comments_= $_POST['Emp_discip_Comments'];


    $query = "INSERT INTO Employee_disciplinary(Emp_Discip_Employee_Id,Emp_discip_date ,Emp_discip_Comments ) VALUES('$Emp_Discip_Employee_Id_','$Emp_discip_date_','$Emp_discip_Comments_')";

//inserting in login table
//$query .= "INSERT INTO Login_table(Login_Username,login_rank,login_password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

    if ($con->query($query)) {
        $msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Employee recorded !
    <meta content=\"2;index.php\" http-equiv=\"refresh\" />
</div>";

    }else {
        $msg = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while recording!
</div>";
    }


    $con->close();
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
            <label for="">Employee ID</label>
            <input  type="text" name="Emp_Discip_Employee_Id" required class="form-control" placeholder="Optional" value="<?php echo $emlid;?>" readonly>
        </div>

        <div class="form-group">
            <label for="api_secret">Disciplinary Date</label>
            <input  type="date" id="" name="Emp_discip_date" required class="form-control" placeholder="Required">
        </div>


        <div class="form-group">
            <label for="">Comments</label>
            <textarea rows="6" type="" name="Emp_discip_Comments" required class="form-control" placeholder=""></textarea>
        </div>


        <button type="submit" name="add" class="btn btn-danger">Take Action</button>

    </form>


<?php include "footer.php";?>