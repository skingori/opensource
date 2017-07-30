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


    $Employee_Reward_Empl_Id_= $_POST['Employee_Reward_Empl_Id'];
    $Employee_reward_date_= $_POST['Employee_reward_date'];
    //$Customer_flight_notification_message_status_= $_POST['Customer_flight_notification_message_status'];
    $Employee_reward_details_= $_POST['Employee_reward_details'];


 $query = "INSERT INTO Employee_reward(Employee_Reward_Empl_Id,Employee_reward_date ,Employee_reward_details ) VALUES('$Employee_Reward_Empl_Id_','$Employee_reward_date_','$Employee_reward_details_')";

//inserting in login table
//$query .= "INSERT INTO Login_table(Login_Username,login_rank,login_password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

        if ($con->query($query)) {
            $msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Employee rewarded !
    <meta content=\"2;index.php\" http-equiv=\"refresh\" />
</div>";

        }else {
            $msg = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while rewarding!
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
            <label for="Customer_flight_notification_message">Employee ID</label>
            <input  type="text" name="Employee_Reward_Empl_Id" required class="form-control" placeholder="Optional" value="<?php echo $emlid;?>" readonly>
        </div>

        <div class="form-group">
            <label for="api_secret">Reward Date</label>
            <input  type="date" id="" name="Employee_reward_date" required class="form-control" placeholder="Required">
        </div>


        <div class="form-group">
            <label for="">More Details</label>
            <textarea rows="6" type="" name="Employee_reward_details" required class="form-control" placeholder=""></textarea>
        </div>


        <button type="submit" name="add" class="btn btn-info">Reward Employee</button>

    </form>


<?php include "footer.php";?>