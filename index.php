<?php
session_start();
if (isset($_SESSION['rank'])!="" && isset($_SESSION['logname'])!="") {
    header("Location: sessions.php");
    exit;
}

	require('connection/db.php');
        session_start();
// If form submitted, insert values into the database.
    if (isset($_POST['sign'])){

		$username = stripslashes($_REQUEST['username']); // removes backslashes
        //$rank = stripslashes($_REQUEST['rank']); // removes backslashes
        $password = stripslashes($_REQUEST['password']);

		$username_ = mysqli_real_escape_string($con,$username); //escapes special characters in a string
        //$rank_ = mysqli_real_escape_string($con,$rank); //escapes special characters in a string
		$password_ = mysqli_real_escape_string($con,$password);

        $enc = md5($password_);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `Login_table` WHERE Login_Username='$username_' AND Login_Password='$enc'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        ?>

             <?php
             
                $rowCheck = mysqli_num_rows($result);
		$row= mysqli_fetch_array($result);
                
                
                if($row['Login_Rank']==1){
                    
                    $_SESSION['logname'] = $row['Login_Username'];
                    $_SESSION['rank'] = $row['Login_Rank'];

                    //below will be used as a welcome message
                    $username=$_SESSION['logname'];

                    $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Login Successful !! Welcome $username
                    </div>";


                    ?>
                    <p align="center">
                        <meta content="2;admin/index.php?action=home" http-equiv="refresh" />
                    </p>

                    <?php

                } elseif ($row['Login_Rank']==2){

                    $_SESSION['logname'] = $row['Login_Username'];
                    $_SESSION['rank'] = $row['Login_Rank'];

                    $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Login Successful !! Welcome
                    </div>";
                    ?>

                    <p align="center">
                        <meta content="2;user/index.php?action=home" http-equiv="refresh" />
                    </p>

                    <?php

                }
                else {
                    ?>
                <?php

                    $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Wrong username or Password !
                    </div>";

                }
    }?>


<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            
              <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
            <div class="header">Sign In</div>
            <form action="" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" required class="form-control" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" required class="form-control" placeholder="Password"/>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                    
                </div>
                <div class="footer">                                                               
                    <button type="submit" name="sign" class="btn bg-olive btn-block">Sign me in</button>
                    
                    
                    <!--<p><a href="#">I forgot my password</a></p>-->
                    
                    <a href="register.php" class="text-center">Register a new membership</a>
                </div>
            </form>

            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
            </div>
        </div>
        
        <!-- start of php -->

        
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>