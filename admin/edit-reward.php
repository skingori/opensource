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

$result1 = mysqli_query($con, "SELECT * FROM Employee_reward WHERE Employee_reward_id='$id'");

while($res = mysqli_fetch_array($result1))
{
    $Employee_reward_id= $res['Employee_reward_id'];
    $Employee_Reward_Empl_Id= $res['Employee_Reward_Empl_Id'];
    $Employee_reward_details= $res['Employee_reward_details'];

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


    $Employee_Reward_Empl_Id_= $_POST['Employee_Reward_Empl_Id'];
    $Employee_reward_date_= $_POST['Employee_reward_date'];
    //$Customer_flight_notification_message_status_= $_POST['Customer_flight_notification_message_status'];
    $Employee_reward_details_= $_POST['Employee_reward_details'];

//updating the table
    $result = mysqli_query($con, "UPDATE Employee_reward SET Employee_Reward_Empl_Id='$Employee_Reward_Empl_Id_', Employee_reward_date='$Employee_reward_date_'
  ,Employee_reward_details='$Employee_reward_details_' WHERE Employee_reward_id=$id");



    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Product Supply Updated !
					</div>";

    echo '<meta content="4;rewards.php" http-equiv="refresh" />';

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
            <input  type="text" name="Employee_Reward_Empl_Id" required class="form-control" placeholder="Optional" value="<?php echo $Employee_Reward_Empl_Id ?>" readonly>
        </div>

        <div class="form-group">
            <label for="api_secret">Reward Date</label>
            <input  type="date" id="" name="Employee_reward_date" required class="form-control" placeholder="Required">
        </div>


        <div class="form-group">
            <label for="">More Details</label>
            <textarea rows="6" type="" name="Employee_reward_details" required class="form-control" placeholder=""><?php echo $Employee_reward_details?></textarea>
        </div>


        <button type="submit" name="add" class="btn btn-info">Update</button>

    </form>


<?php include "footer.php";?>