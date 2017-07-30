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
    $username= $res['Login_username'];
    $id= $res['Login_Id'];


}

?>

<?php include 'header.php';?>

<?php

$result = mysqli_query($con, "SELECT * FROM `Employee_disciplinary` WHERE Emp_Discip_Employee_Id='$id'");
?>

    <div class="card">
        <div class="header">
            <h4 class="title">Disciplinary</h4>
            <p class="category">The following table shows your disciplinary actions taken</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <thead class="alert-danger">
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