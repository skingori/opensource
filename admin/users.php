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
}
else
{

    header('Location:index.php');
}
include '../connection/db.php';
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM login_table WHERE login_username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $name= $res['login_name'];

}

?>

<?php include 'sh.php'; ?>
        <!--********************Add content here *******************-->
        
          <?php
            //including the database connection file
            include_once("../connection/db.php");

            //fetching data in descending order (lastest entry first)
            //$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
            $result = mysqli_query($con, "SELECT * FROM login_table WHERE login_username <>'$username'"); // using mysqli_query instead
            ?>
        <span class="input-group-btn">
        <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-print"></i></button>&nbsp;
        <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-file"></i></button>
        </span>

            <table  border=0 cellpadding="1" cellspacing="1" id="table1" width="100%" class="table table-striped table-hover table-bordered table-condensed">

                <tr>
                    <td>User ID</td>
                    <td>User Username</td>
                    <td>Full Name</td>
                    <td></td>
                </tr>
                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=\"alert-info\">";
                    echo "<td class=''>".$res['login_id']."</td>";
                    echo "<td>".$res['login_username']."</td>";
                    echo "<td>".$res['login_name']."</td>";
                echo "<td> <a href=\"delete.php?usd=$res[login_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='fa fa-trash-o'></a></td>";
                }
            ?>
            </table>

        <!--********************Add content here *******************-->
<?php include 'sf.php'; ?>





