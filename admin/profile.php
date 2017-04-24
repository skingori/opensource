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
    $name= $res['login_name'];

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

    $login_id_ = mysqli_real_escape_string($con, $_POST['lid']);
    $login_username_ = mysqli_real_escape_string($con, $_POST['lusername']);

    $login_password_ = mysqli_real_escape_string($con, $_POST['lpassword']);
    $repeat_password = mysqli_real_escape_string($con, $_POST['rpassword']);
    $enc = md5($login_password_);
    //$user_lastname = mysqli_real_escape_string($con, $_POST['lname']);
    //$user_payrollnumber = mysqli_real_escape_string($con, $_POST['pnumber']);
    //$user_email = mysqli_real_escape_string($con, $_POST['email']);
    //$user_phone = mysqli_real_escape_string($con, $_POST['phone']);

    // checking empty fields
    if(empty($login_username_) || empty($login_password_) || ($repeat_password !== $login_password_)) {

        if(empty($login_username_) || empty($login_password_) ) {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Username Required !
					</div>";
        }

        if(empty($login_password_)) {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Password Required !
					</div>";
        }
        if($repeat_password !== $login_password_) {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Password does not Match !
					</div>";
        }
        

    } else {
        //updating the table
        $result = mysqli_query($con, "UPDATE login_table SET login_username='$login_username_',login_password='$enc' WHERE login_id='$login_id_'");

        //redirectig to the display page. In our case, it is index.php
        
        //Javascript is on below of this file for progress bar
        
        $msg = "<div <div class='alert alert-info'>
						<progress id='progressBar' value='0' max='10'></progress> &nbsp;  Successfully registered !  system about to log you out.
                                                
					</div>";
        
        header('refresh: 10; url=../logout.php?logout');
        
    }
}
?>
<?php

//selecting data associated with this particular id
$result1 = mysqli_query($con, "SELECT * FROM login_table WHERE login_username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $login_id_= $res['login_id'];
    $login_username_= $res['login_username'];
    $login_password_= $res['login_password'];
    //$user_email = $res['user_email'];
    //$user_phone = $res['user_phone'];
}
?>

<?php include 'sh.php'; ?>
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
        <input type="text" name="lid" readonly="" required value="<?php echo $login_id_;?>" class="form-control" placeholder="lastname"/>
    </div>
    <div class="form-group" >
        
        <label>Username</label>
        <input type="text" name="lusername" readonly="" required value="<?php echo $login_username_;?>" class="form-control" placeholder="lastname"/>
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
</form>



<script>
    <!--<progress value="0" max="10" id="progressBar"></progress>-->
                var timeleft = 10;
            var downloadTimer = setInterval(function(){
              document.getElementById("progressBar").value = 10 - --timeleft;
              if(timeleft <= 0)
                clearInterval(downloadTimer);
            },1000);
</script>

<?php include 'sf.php'; ?>