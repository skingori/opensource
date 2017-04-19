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

<?php include 'header.php'; ?>
        <!--********************Add content here *******************-->
        
          <?php
            //including the database connection file
            include_once("../connection/db.php");

            //fetching data in descending order (lastest entry first)
            //$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
            $result = mysqli_query($con, "SELECT * FROM supplier_table ORDER BY supplier_id ASC"); // using mysqli_query instead
            ?>

            <table  border=0 cellpadding="1" cellspacing="1" id="" width="100%" class="table table-hover table-striped table-condensed">

                <tr bgcolor=''>
                    <td>Supplier ID</td>
                    <td>Supplier Name</td>
                    <td>Supplier Address</td>
                    <td>Mobile Number</td>
                    <!--<td>Update</td>-->
                </tr>
                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=\"danger\">";
                    echo "<td class='active'>".$res['supplier_id']."</td>";
                    echo "<td>".$res['supplier_name']."</td>";
                    echo "<td>".$res['supplier_address']."</td>";
                    echo "<td>".$res['supplier_conatct']."</td>";
                    //echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                }
                ?>
            </table>

        <!--********************Add content here *******************-->
<?php include 'footer.php'; ?>











