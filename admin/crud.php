<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 01/04/2017
 * Time: 11:24
 */
// Inialize session
session_start();
include '../connection/db.php';
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM user_details WHERE user_username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $user_firstname= $res['user_firstname'];
    $user_lastname= $res['user_lastname'];

}
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
$username=$_SESSION['logname'];
?>
<?php include 'header.php'; ?>
                    <!--********************Add content here *******************-->
                    <?php
                    //including the database connection file
                    include_once("../connection/db.php");

                    //fetching data in descending order (lastest entry first)
                    //$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
                    $result = mysqli_query($con, "SELECT * FROM user_details ORDER BY id DESC"); // using mysqli_query instead
                    ?>

                    <table  border=0 cellpadding="1" cellspacing="1" id="" width="100%" class="table table-hover table-striped">

                        <tr bgcolor=''>
                            <td>Firt Name</td>
                            <td>Last Name</td>
                            <td>Payroll Number</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Update</td>
                        </tr>
                        <?php
                        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                        while($res = mysqli_fetch_array($result)) {
                            echo "<tr class=\"success\">";
                            echo "<td class='active'>".$res['user_firstname']."</td>";
                            echo "<td>".$res['user_lastname']."</td>";
                            echo "<td>".$res['user_payrollnumber']."</td>";
                            echo "<td>".$res['user_email']."</td>";
                            echo "<td>".$res['user_phone']."</td>";
                            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                        }
                        ?>
                    </table>

<?php include 'footer.php'; ?>