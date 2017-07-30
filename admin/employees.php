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

$result = mysqli_query($con, "SELECT * FROM Employee_profile ORDER BY Employee_Id ASC");
?>

    <div class="card">
    <div class="header">
        <h4 class="title">Employees</h4>
        <p class="category">Select each staff to rate him/her</p>
    </div>
    <div class="content table-responsive table-full-width">
    <table class="table table-striped">
            <thead class="alert-success">
            <th>Id</th>
            <th>Name</th>
            <th>Payroll Number</th>
            <th>contact</th>
            <th><i class="fa fa-user-plus"></i> </th>
            <th><i class="fa fa-user-plus"></i> </th>
            </thead>
            <tbody>

            <?php
            //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
            while($res = mysqli_fetch_array($result)) {
                echo "<tr class=''>";
                echo "<td class=''>".$res['Employee_Id']."</td>";
                echo "<td>".$res['Employee_Firstname']."&nbsp;".$res['Employee_Lastname']."</td>";
                echo "<td>".$res['Employee_Payroll_Number']."</td>";
                echo "<td>".$res['employee_contact']."</td>";
                echo "<td><a href=\"add-perf.php?id=$res[Employee_Id]\" onClick=\"return confirm('Are you sure you want range performance?')\" class='fa fa-sticky-note-o lg-2'></a></td>";
                echo "<td><a href=\"assign-dep.php?id=$res[Employee_Id]\" onClick=\"return confirm('Are you sure you want range performance?')\" class='fa fa-home lg-2'></a></td>";

            }
            ?>

            </tbody>
        <tfoot class="alert-warning">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Payroll Number</th>
            <th>contact</th>
            <th></th>
            <th></th>
        </tr>

        </tfoot>
    </table>
    </div>
    </div>


<?php include 'footer.php';?>