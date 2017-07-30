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

$result = mysqli_query($con, "SELECT * FROM `Department_table`");
?>

    <div class="card">
        <div class="header">
            <h4 class="title">Departments</h4>
            <p class="category">All the departments available</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <thead class="alert-success">
                <th>Department Id</th>
                <th>Department Name</th>
                <th>Department Faculty</th>
                <th></th>


                </thead>
                <tbody>

                <?php

                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class=''>".$res['Department_Id']."</td>";
                    echo "<td>".$res['Department_Name']."</td>";
                    echo "<td>".$res['Department_Faculty']."</td>";
                    echo "<td><a href=\"edit-dep.php?edit=$res[Department_Id]\" style='color: #3DA0DB' class='fa fa-pencil'></a> &nbsp;<a href=\"delete.php?depart=$res[Department_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" style='color: red' class='fa fa-trash-o'></a></td>";

                }
                ?>

                </tbody>
                <tfoot class="alert-warning">
                <tr>
                    <th>Department Id</th>
                    <th>Department Name</th>
                    <th>Department Faculty</th>
                    <th></th>
                </tr>

                </tfoot>
            </table>
        </div>
    </div>


<?php include 'footer.php';?>