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

$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $name= $res['Login_Username'];

}

?>

<?php include 'sh.php'; ?>
        <!--********************Add content here *******************-->
        
          <?php
            //including the database connection file
            include_once("../connection/db.php");

            //fetching data in descending order (lastest entry first)
            //$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
            $result = mysqli_query($con, "SELECT * FROM Supplier_table ORDER BY Supplier_Id ASC"); // using mysqli_query instead
            ?>
<span class="input-group-btn">
        <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-print"></i></button>&nbsp;
        <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-file"></i></button>
        </span>

            <table  border=0 cellpadding="1" cellspacing="1" id="table1" width="100%" class="table table-hover table-striped table-condensed table-bordered">

                <tr bgcolor=''>
                    <td>Supplier ID</td>
                    <td>Supplier Name</td>
                    <td>Supplier Address</td>
                    <td>Mobile Number</td>
                    <td></td>
                </tr>
                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=\"alert-info\">";
                    echo "<td class=''>".$res['Supplier_Id']."</td>";
                    echo "<td>".$res['Supplier_Name']."</td>";
                    echo "<td>".$res['Supplier_Address']."</td>";
                    echo "<td>".$res['Supplier_Contact']."</td>";
                    echo "<td><a href=\"editsu.php?id=$res[Supplier_Id]\" class='fa fa-edit'></a>&nbsp; <a href=\"delete.php?sup=$res[Supplier_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='fa fa-trash-o'></a></td>";
                }
                ?>
            </table>

        <!--********************Add content here *******************-->
<?php include 'sf.php'; ?>











