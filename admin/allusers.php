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
if (isset($_GET['msg'])){
          echo "<div class='alert alert-danger alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
          <span class='glyphicon glyphicon glyphicon-ok'></span> &nbsp; Deleted!
          </div>";
           ?>
          <meta http-equiv="refresh" content="1;url=allusers.php"> 
          <?php
      }

      
      
$result = mysqli_query($con, "SELECT * FROM `Login_table`");
?>

    <div class="card">
        <div class="header">
            <h4 class="title">Users</h4>
            <p class="category">All users registered</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <thead class="alert-success">
                <th>Id</th>
                <th>Username</th>
                <th>Rank</th>
                <th><i class="fa fa-trash-o"></i></th>


                </thead>
                <tbody>

                <?php

                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class=''>".$res['Login_Id']."</td>";
                    echo "<td>".$res['Login_Username']."</td>";
                    echo "<td>".$res['Login_Rank']."</td>";
                    echo "<td><a href=\"delete.php?aus=$res[Login_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='fa fa-trash lg-2'></a></td>";

                }
                ?>

                </tbody>
                <tfoot class="alert-warning">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Rank</th>
                    <th>Update</th>

                </tr>

                </tfoot>
            </table>
        </div>
    </div>


<?php include 'footer.php';?>