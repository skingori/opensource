<?php
session_start();
if (isset($_SESSION['rank'])!="" && isset($_SESSION['logname'])!="") {
    header("Location: sessions.php");
    exit;
}

	require('connection/db.php');


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
$count=$check_->num_rows;

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
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry username already taken !
</div>";

}

$con->close();
}
?>
<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
    <div class="header">Register New Membership</div>
    <form action="" method="post">
        <div class="body bg-gray">
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
                    <!--<option value="1"> Administrator*</option>-->
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="login_username" required class="form-control" placeholder="Username"/>
            </div>
            <div class="form-group">
                <input type="password" name="login_password" required class="form-control" placeholder="Password"/>
            </div>

        </div>
        <div class="footer">

            <button type="submit" name="register" class="btn bg-olive btn-block">Sign me up</button>

            <a href="index.php" class="text-center">I already have a membership</a>
        </div>
    </form>

    <div class="margin text-center">
        <span>Register using social networks</span>
        <br/>
        <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
        <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
        <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

    </div>
</div>


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
