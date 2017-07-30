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
    $id=$res['Login_Id'];

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
    $Login_Username_=($_POST['Login_Username']);
    $Login_Password=($_POST['Login_Password']);
    $pss_=md5($Login_Password);
    //updating the table

    $result = mysqli_query($con, "UPDATE Login_table SET Login_Username='$Login_Username_',Login_Password='$pss_' WHERE Login_Id=$id");

    //redirectig to the display page. In our case, it is index.php
    $msg = "<div <div class='alert alert-danger'>
						<progress id='progressBar' value='0' max='10'></progress> &nbsp;  Successfully registered !  system about to log you out.
                                                
					</div>";

    header('refresh: 10; url=../logout.php?logout');
}
?>

    <!-- add content here -->
<?php
//add header
include ('header.php');
?>

    <form action="" method="post">
        <!--<div class="body bg-gray">-->
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <!-- --->
        <div class="form-group" hidden="">
            <input type="text" name="Login_Id" required class="form-control" value=<?php echo $id;?> >
        </div>
        <div class="form-group">
            <label for="">Username:</label>
            <input type="text" id="" name="Login_Username" value="<?php echo $name;?>" required class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="">New Password:</label>
            <input type="password" id="" name="Login_Password" value="" required class="form-control" placeholder="">
        </div>

        <!--</div>-->
        <div class="form-group">

            <button type="submit" name="update" class="btn btn-danger">Update Password</button>
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
<?php

//adding footer

include 'footer.php';
?>