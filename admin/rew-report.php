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
    $username= $res['Login_username'];

}

?>

<?php include 'header.php';?>

<?php

$result = mysqli_query($con, "SELECT * FROM `Employee_reward`");
?>

    <div class="card">
        <div class="header">
            <h4 class="title">Rewards</h4><button class="btn btn-circle"><i class="fa fa-print" href="" onclick="printData()"></i> </button>
            <p class="category">List of all the rewarded employees</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped" id="table1">
                <thead class="alert-success">
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


<?php include 'footer.php';?>