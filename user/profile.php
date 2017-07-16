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
include '../connection/db.php';
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $name= $res['Login_Username'];
    $lid=$res['Login_Id'];

}


if(isset($_POST['update']))
{

    $Login_Id_ = mysqli_real_escape_string($con, $_POST['lid']);
    $Login_Username_ = mysqli_real_escape_string($con, $_POST['lusername']);

    $Login_Password_ = mysqli_real_escape_string($con, $_POST['lpassword']);
    $repeat_password = mysqli_real_escape_string($con, $_POST['rpassword']);
    $enc = md5($Login_Password_);
    //$user_lastname = mysqli_real_escape_string($con, $_POST['lname']);
    //$user_payrollnumber = mysqli_real_escape_string($con, $_POST['pnumber']);
    //$user_email = mysqli_real_escape_string($con, $_POST['email']);
    //$user_phone = mysqli_real_escape_string($con, $_POST['phone']);

    // checking empty fields
    if(empty($Login_Username_) || empty($Login_Password_) || ($repeat_password !== $Login_Password_)) {

        if(empty($Login_Username_) || empty($Login_Password_) ) {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Username Required !
					</div>";
        }

        if(empty($Login_Password_)) {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Password Required !
					</div>";
        }
        if($repeat_password !== $Login_Password_) {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Password does not Match !
					</div>";
        }


    } else {
        //updating the table
        $result = mysqli_query($con, "UPDATE Login_table SET Login_Username='$Login_Username_',Login_Password='$enc' WHERE Login_Id='$Login_Id_'");

        //redirectig to the display page. In our case, it is index.php

        //Javascript is on below of this file for progress bar

        $msg = "<div <div class='alert alert-warning'>
						<progress id='progressBar' value='0' max='10'></progress> &nbsp;  Successful !  system about to log you out.

					</div>";

        header('refresh: 10; url=../logout.php?logout');

    }
}
?>
<?php

//selecting data associated with this particular id
$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $Login_Id_= $res['Login_Id'];
    $Login_Username_= $res['Login_Username'];
    $Login_Password_= $res['Login_Password'];
    //$user_email = $res['user_email'];
    //$user_phone = $res['user_phone'];
}
?>

<?php include "h.php";?>
<!-- add content here -->


<form action="" method="post">
    <!--<div class="body bg-gray">-->
    <?php
    if (isset($msg)) {
        echo $msg;
    }
    ?>
    <div class="form-group" hidden="">
        <label>ID</label>
        <input type="text" name="lid" readonly="" required value="<?php echo $Login_Id_;?>" class="form-control" placeholder="lastname"/>
    </div>
    <div class="form-group" >

        <label>Username</label>
        <input type="text" name="lusername" readonly="" required value="<?php echo $Login_Username_;?>" class="form-control" placeholder="lastname"/>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="lpassword" required value="" class="form-control" placeholder="New Password"/>
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="rpassword" required value="" class="form-control" placeholder="Confirm Password"/>
    </div>
    <!--<div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirm-password" required value="" class="form-control" placeholder="Employee Number"/>
    </div>

    <!--</div>-->
    <div class="footer">

        <button type="submit" name="update" class="btn bg-olive" value="Delete">Update Password</button>
    </div>
    <br>
    <div>
        <a href="myprof.php">Change Other Details</a>
    </div>


</form>


<?php include "f.php";?>
