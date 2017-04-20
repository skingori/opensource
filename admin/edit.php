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
    $user_first= $res['user_firstname'];
    $user_last= $res['user_lastname'];

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

    $id = mysqli_real_escape_string($con, $_POST['id']);

    $user_firstname = mysqli_real_escape_string($con, $_POST['fname']);
    $user_lastname = mysqli_real_escape_string($con, $_POST['lname']);
    $user_payrollnumber = mysqli_real_escape_string($con, $_POST['pnumber']);
    $user_email = mysqli_real_escape_string($con, $_POST['email']);
    $user_phone = mysqli_real_escape_string($con, $_POST['phone']);

    // checking empty fields
    if(empty($user_firstname) || empty($user_payrollnumber ) || empty($user_email)) {

        if(empty($user_firstname)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if(empty($user_payrollnumber)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }

        if(empty($user_email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($con, "UPDATE user_details SET user_firstname='$user_firstname',user_lastname='$user_lastname',user_payrollnumber='$user_payrollnumber' ,user_email='$user_email',user_phone='$user_phone' WHERE id=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM user_details WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $user_firstname = $res['user_firstname'];
    $user_lastname= $res['user_lastname'];
    $user_payrollnumber = $res['user_payrollnumber'];
    $user_email = $res['user_email'];
    $user_phone = $res['user_phone'];
}
?>
<!-- add content here -->

<?php include 'header.php'; ?>
<!-- add content here -->


<form action="" method="post">
    <!--<div class="body bg-gray">-->
    <?php
    if (isset($msg)) {
        echo $msg;
    }
    ?>
    <div class="form-group" hidden>
        <input type="text" name="id" required class="form-control" value=<?php echo $_GET['id'];?>  placeholder=""/>
    </div>
    <div class="form-group">
        <input type="text" name="fname" value="<?php echo $user_firstname;?>" required class="form-control" placeholder="firstname"/>
    </div>
    <div class="form-group">
        <input type="text" name="lname" required value="<?php echo $user_lastname;?>" class="form-control" placeholder="lastname"/>
    </div>
    <div class="form-group">
        <input type="text" name="pnumber" required value="<?php echo $user_payrollnumber;?>" class="form-control" placeholder="Employee Number"/>
    </div>
    <div class="form-group">
        <input type="email" name="email" required value="<?php echo $user_email;?>" class="form-control" placeholder="Email"/>
    </div>
    <div class="form-group">
        <input type="text" name="phone" required value="<?php echo $user_phone;?>" class="form-control" placeholder="Mobile Number"/>
    </div>

    <!--</div>-->
    <div class="footer">

        <button type="submit" name="update" class="btn bg-olive">Update Employee</button>
    </div>
</form>

<?php include 'footer.php'; ?>