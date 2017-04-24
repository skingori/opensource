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
    $id=$res['id'];

}
/**
 * Created by PhpStorm.
 * User: king
 * Date: 03/04/2017
 * Time: 12:46
 */
// including the database connection file
include_once("../connection/db.php");

if(isset($_POST['update']))
{
    $xname_=($_POST['login_name']);
    //updating the table

    $result = mysqli_query($con, "UPDATE login_table SET login_name='$xname_' WHERE id=$id");

    //redirectig to the display page. In our case, it is index.php
    header("Location: index.php");
}
?>

<!-- add content here -->
<?php
//add header
include ('sh.php');
?>

<form action="" method="post">
    <!--<div class="body bg-gray">-->
    <?php
    if (isset($msg)) {
        echo $msg;
    }
    ?>
    <div class="form-group" hidden="">
        <input type="text" name="id" required class="form-control" value=<?php echo $id;?> />
    </div>
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="login_name" value="<?php echo $name;?>" required class="form-control" placeholder="firstname"/>
    </div>

    <!--</div>-->
    <div class="footer">

        <button type="submit" name="update" class="btn bg-olive">Update Employee</button>
    </div>
</form>


<?php
//adding footer

include 'sf.php';
?>