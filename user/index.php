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
    $username= $res['Login_Username'];
    $id= $res['Login_Id'];

}

//make user update profile

$query = "SELECT * FROM `Employee_profile` WHERE Employee_Id='$id'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$rows = mysqli_num_rows($result);

$rowCheck = mysqli_num_rows($result);
$row= mysqli_fetch_array($result);


if($row['Employee_Payroll_Number']=="" AND $row['Employee_Email']=="") {

    header('location:prof.php');//redirect to  page

}else{


}

//
?>

<?php include 'header.php';?>

                <!-- END OF WIDGETS -->

<?php

$result = mysqli_query($con, "SELECT * FROM `Employee_reward` WHERE Employee_Reward_Empl_Id='$id'");
?>

    <div class="card">
        <div class="header">
            <h4 class="title">Rewards</h4>
            <p class="category">List of all rewards awarded to me</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped table-condensed table-bordered">
                <thead class="alert-info">
                <th>ID</th>
                <th>Employee ID</th>
                <th>Reward Date</th>
                <th>Other Details</th>


                </thead>
                <tbody>

                <?php

                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class=''>".$res['Employee_reward_id']."</td>";
                    echo "<td>".$res['Employee_Reward_Empl_Id']."</td>";
                    echo "<td>".$res['Employee_reward_date']."</td>";
                    echo "<td>".$res['Employee_reward_details']."</td>";
                }
                ?>

                </tbody>
                <tfoot class="alert-warning">
                <tr>
                    <th>ID</th>
                    <th>Employee ID</th>
                    <th>Reward Date</th>
                    <th>Other Details</th>
                </tr>

                </tfoot>
            </table>
        </div>
    </div>

                <!-- END OF TABLE -->
 <?php include "footer.php";?>