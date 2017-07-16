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

$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $name= $res['Login_Username'];
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
if (isset($_SESSION['userSession'])!="") {
    header("Location: login.php");
}
require_once '../connection/db.php';

if(isset($_POST['register'])) {

    
    $Login_Id_= strip_tags($_POST['Login_Id']);
    $Login_Username_= strip_tags($_POST['Login_Username']);
    $Login_Password_= strip_tags($_POST['Login_Password']);
    $login_rank_= strip_tags($_POST['login_rank']);

    $Login_Id= $con->real_escape_string($Login_Id_ );
    $Login_Username= $con->real_escape_string($Login_Username_ );
    $Login_Password= $con->real_escape_string($Login_Password_);
    $login_rank= $con->real_escape_string($login_rank_ );

    $enc= md5($Login_Password);
    //$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

    $check_ = $con->query("SELECT Login_Username FROM Login_table WHERE Login_Username='$Login_Username'");
    $count=$check_->num_rows;

    if ($count==0) {

        $query = "INSERT INTO Login_table(Login_Id,Login_Username,Login_Password,login_rank) VALUES('$Login_Id','$Login_Username','$enc','$login_rank')";

        //inserting in login table
        //$query .= "INSERT INTO Login_table(Login_Username,login_rank,Login_Password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

        if ($con->query($query)) {
            $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
        }else {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
        }

    } else {


        $msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry id already taken !
				</div>";

    }

    $con->close();
}
?>

<?php include 'sh.php'; ?>
            <!--********************Add content here *******************-->
            <form action="" method="post">
                <!--<div class="body bg-gray">-->
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                    <div class="form-group">
                        <input type="text" name="Login_Id" required class="form-control" placeholder="ID"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="login_rank">
                            <option selected="" value="2"> User*</option>
                            <option value="1"> Administrator*</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Login_Username" required class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="Login_Password" required class="form-control" placeholder="Password"/>
                    </div>
                <!--</div>-->
                <div class="footer">

                    <button type="submit" name="register" class="btn bg-olive btn-block">Register</button>
                </div>
            </form>
            <!--********************Add content here *******************-->
<?php include 'sf.php';?>