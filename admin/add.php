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

$result1 = mysqli_query($con, "SELECT * FROM login_table WHERE login_username='$username'");

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
if (isset($_SESSION['userSession'])!="") {
    header("Location: login.php");
}
require_once '../connection/db.php';

if(isset($_POST['register'])) {

    
    $login_id_= strip_tags($_POST['login_id']);
    $login_username_= strip_tags($_POST['login_username']);
    $login_password_= strip_tags($_POST['login_password']);
    $login_rank_= strip_tags($_POST['login_rank']);
    $login_name_= strip_tags($_POST['login_name']);
    

    $login_id= $con->real_escape_string($login_id_ );
    $login_username= $con->real_escape_string($login_username_ );
    $login_password= $con->real_escape_string($login_password_);
    $login_rank= $con->real_escape_string($login_rank_ );
    $login_name= $con->real_escape_string($login_name_);
    $enc= md5($login_password);
    //$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

    $check_ = $con->query("SELECT login_username FROM login_table WHERE login_username='$login_username'");
    $count=$check_email->num_rows;

    if ($count==0) {

        $query = "INSERT INTO login_table(login_id,login_username,login_password,login_rank,login_name) VALUES('$login_id','$login_username','$enc','$login_rank','$login_name')";

        //inserting in login table
        //$query .= "INSERT INTO login_table(login_username,login_rank,login_password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

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
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
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
                        <input type="text" name="login_id" required class="form-control" placeholder="ID"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="login_name" required class="form-control" placeholder="Your Name"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="login_rank">
                            <option selected="" value="2"> User*</option>
                            <option value="1"> Administrator*</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="login_username" required class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="login_password" required class="form-control" placeholder="Password"/>
                    </div>
                <!--</div>-->
                <div class="footer">

                    <button type="submit" name="register" class="btn bg-olive btn-block">Register</button>
                </div>
            </form>
            <!--********************Add content here *******************-->
<?php include 'sf.php';?>