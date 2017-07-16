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
}
else
{

    header('Location:index.php');
}

//getting id of the data from url
$pid = $_GET['x'];

include '../connection/db.php';
$username=$_SESSION['logname'];

//selecting data associated with this particular id
$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $name= $res['Login_Username'];
    $lid=$res['Login_Id'];

}

?>

<?php include "h.php";?>


            <!--********************Add content here *******************-->

            <?php
            //including the database connection file
            //include_once("../connection/db.php");

            //fetching data in descending order (lastest entry first)
            //$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
            $result = mysqli_query($con, "SELECT * FROM Supplier_products WHERE Sup_Prod_Product_Id='$pid' ORDER BY Sup_Prod_Id ASC"); // using mysqli_query instead
            ?>

            <table  border=0 cellpadding="1" cellspacing="1" id="" width="100%" class="table table-striped table-hover table-condensed">
            <thead>
            <tr class="alert-info">
                <td>ID</td>
                <td>Supplier ID</td>
                <td>Product Code</td>
                <td>Product Price</td>
            </tr>
            </thead>
                <tbody>
                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=\"danger\">";
                    echo "<td class='active'>".$res['Sup_Prod_Id']."</td>";
                    echo "<td>".$res['Sup_Prod_Supplier_Id']."</td>";
                    echo "<td>".$res['Sup_Prod_Product_Id']."</td>";
                    echo "<td>".$res['Sup_Prod_Product_Price']."</td>";
                    //echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                }
                ?>
                </tbody>

                <tfoot>
                <tr class="alert-success">
                    <td>ID</td>
                    <td>Supplier ID</td>
                    <td>Product ID</td>
                    <td>Product Price</td>
                </tr>
                </tfoot>

            </table>

            <!--********************Add content here *******************-->
        <?php include "f.php";?>