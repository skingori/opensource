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


//add header
require ('sh.php');


//add body
//including the database connection file
include_once("../connection/db.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($con, "SELECT * FROM purchase_table ORDER BY purchase_id ASC"); // using mysqli_query instead
?>
    <span class="input-group-btn">
        <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-print"></i></button>&nbsp;
        <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-file"></i></button>
        </span>
    <table  border=0 cellpadding="1" cellspacing="1" id="table1" width="100%" class="table table-hover table-condensed table-bordered table-striped">

        <tr bgcolor=''>
            <td>Total Quantity</td>
            <td>Payment Mode</td>
            <td>Purchase Date</td>
            <td>Total Cost</td>
            <td>Customer Name</td>
            <td></td>

        </tr>
        <?php
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
        while($res = mysqli_fetch_array($result)) {
            echo "<tr class=\"alert-info\">";
            echo "<td class=''>".$res['purchase_product_quantity']."</td>";
            echo "<td>".$res['purchase_payment_method']."</td>";
            echo "<td hidden>".$res['purchase_id']."</td>";
            echo "<td>".$res['purchase_date']."</td>";
            echo "<td>".$res['purchase_total']."</td>";
            echo "<td>".$res['purchase_by']."</td>";
            echo "<td><a href=\"delete.php?pur=$res[purchase_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='fa fa-trash-o'></a></td>";
        }
        ?>
    </table>



<?php
//add footer
require('sf.php');

