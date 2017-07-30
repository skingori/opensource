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
$id=$_GET['id'];

$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_id='$id'");

while($res = mysqli_fetch_array($result1))
{
    $uname= $res['Login_username'];
    $fname= $res['Login_fullname'];
    $contact= $res['Login_contact'];
    $email= $res['Login_email'];

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

    $Login_username_= $_POST['Login_username'];
    $Login_fullname_= $_POST['Login_fullname'];
    $Login_contact_= $_POST['Login_contact'];
    $Login_email_= $_POST['Login_email'];
    //updating the table

    $result = mysqli_query($con, "UPDATE login_table SET Login_username='$Login_username_',Login_fullname='$Login_fullname_'
 ,Login_contact='$Login_contact_',Login_email='$Login_email_' WHERE Login_id=$id");

    //redirectig to the display page. In our case, it is index.php
    $msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
        </div>";

    header('refresh: 2; url=edituser.php');
}
?>

    <!-- add content here -->
<?php
//add header
include ('h.php');
?>

    <form action="" method="post">
        <!--<div class="body bg-gray">-->
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <!-- --->
        <div class="form-group">
            <label>Login ID:</label>
            <input type="text" name="Login_id" required class="form-control" value="<?php echo $id;?>"  readonly="" placeholder="">
        </div>
        <div class="form-group">
            <label>Login username:</label>
            <input type="text" name="Login_username" value="<?php echo $uname;?>" required class="form-control" >
        </div>
        <div class="form-group">
            <label>Login fullname:</label>
            <input type="text" name="Login_fullname" value="<?php echo $fname;?>" required class="form-control" >
        </div>

        <div class="form-group">
            <label>Login contact:</label>
            <input type="number" name="Login_contact" value="<?php echo $contact;?>" required class="form-control" >
        </div>
        <div class="form-group">
            <label>Login email:</label>
            <input type="email" name="Login_email" value="<?php echo $email;?>" required class="form-control" >
        </div>
        <!--</div>-->

            <button type="submit" name="update" class="btn btn-danger">Update User</button>

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
<?php

//adding footer

include 'f.php';
?>