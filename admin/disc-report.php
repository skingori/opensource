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

$result = mysqli_query($con, "SELECT * FROM `Employee_disciplinary`");
?>
    <div class="card">
        <div class="header">
            <h4 class="title">Disciplinary</h4><button class="btn btn-circle"><i class="fa fa-print" href="" onclick="printData()"></i> </button>
            <p class="category">All the employees under disciplinary</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped" id="table1">
                <thead class="alert-success">
                <th>ID</th>
                <th>Employee Id</th>
                <th>Disciplinary Date</th>
                <th>Comments</th>


                </thead>
                <tbody>

                <?php

                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class=''>".$res['Emp_discip_id']."</td>";
                    echo "<td>".$res['Emp_Discip_Employee_Id']."</td>";
                    echo "<td>".$res['Emp_discip_date']."</td>";
                    echo "<td>".$res['Emp_discip_Comments']."</td>";
                }
                ?>

                </tbody>
                <tfoot class="alert-warning">
                <tr>
                    <th>ID</th>
                    <th>Employee Id</th>
                    <th>Disciplinary Date</th>
                    <th>Comments</th>
                </tr>

                </tfoot>
            </table>
        </div>
    </div>


<?php include 'footer.php';?>