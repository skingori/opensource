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

$result1 = mysqli_query($con, "SELECT * FROM login_table WHERE login_username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $name= $res['login_name'];
    $lid=$res['login_id'];

}

?>
<?php
        
      require '../connection/db.php';

      if (isset($_POST['update'])) {
                $feedback_product_id_=$_POST['feedback_product_id'];
                $feedback_ratings_=$_POST['group-1'];
                $feedback_user_id_=$lid;
                $feedback_user_contact_=$_POST['feedback_user_contact'];
                                mysqli_query($con,"INSERT INTO feedback_table (feedback_product_id,feedback_ratings,feedback_user_id,feedback_user_contact)
      VALUES ('$feedback_product_id_','$feedback_ratings_','$feedback_user_id_','$feedback_user_contact_')
      ") or die(mysql_error());
         
       $msg = "<div class='alert alert-info'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Thank you for your feedback !
					</div>";
       echo '<meta content="2;" http-equiv="refresh" />';

      }

                            
      ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>company || home</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <link href="../css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
    
    <link href="../css/products.css" rel="stylesheet" type="text/css"/>
    <link href="../css/ratingstar.css" rel="stylesheet" type="text/css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="index.php" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <img src="../img/shop.png" height="45" width="45">
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="active">
                    <a href="../logout.php?logout" class="active">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>Logout <?php echo "$name";?><i class="active"></i></span>
                    </a>
                  
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../img/user.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hello, <?php echo "$username"; ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>Home</span>
                    </a>
                </li>
                <li class="active">
                    <a href="profile.php"><i class="fa fa-pencil-square"></i> Change Password</a>
                        <!--<li><a href="mylogs.php"><i class="fa fa-angle-double-right"></i> My logs</a></li>-->
                    
                </li>

                <li class="active">
                    <a href="feedback.php">
                        <i class="fa fa-question"></i> <span>Feedback</span>
                    </a>
                </li>
                <li class="active">
                    <!--<li><a href="mylogs.php"><i class="fa fa-angle-double-right"></i> My logs</a></li>-->
                    <a href="../logout.php?logout"><i class="fa fa-lock"></i> Logout</a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header)
        <section class="content-header">
            <h1>
                <small>Shopping list</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>-->

        <!-- Main content -->
        <section class="content">
            <!--********************Add content here *******************-->
            <form class="" method="POST">
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                
                <div class="form-group">
                    <label>Product code:</label>
                    <select name="feedback_product_id" required class="form-control">
                            <?php

                            include("../connection/db.php");
                            $query = "SELECT * FROM products_table";
                            $result = mysqli_query($con,$query);
                            echo "<option>Select Product ID</option>";
                            while($row = mysqli_fetch_array($result))
                            {
                                   
                                    $product_code = $row[product_code];
                                    echo "<option>$product_code</option>";
                            }

                            ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Rate user</label>
                    <div class="acidjs-rating-stars">
                    <input type="radio" name="group-1" id="group-1-0" value="5" /><label for="group-1-0"></label>
                    <input type="radio" name="group-1" id="group-1-1" value="4" /><label for="group-1-1"></label>
                    <input type="radio" name="group-1" id="group-1-2" value="3" /><label for="group-1-2"></label>
                    <input type="radio" name="group-1" id="group-1-3" value="2" /><label for="group-1-3"></label>
                    <input type="radio" name="group-1" id="group-1-4"  value="1" /><label for="group-1-4"></label>
                    
                    </div>
                </div>
                <div class="form-group">
                    <label>Mobile number</label>
                    <input type="text" class="form-control" name="feedback_user_contact" required="" placeholder="Enter your contact">
                    
                </div>
                
                
                
                <div class="footer">

                    <button type="submit" name="update" class="btn bg-olive" value="Delete">Send Feedback</button>
                </div>
            </form>
            <!--********************Add content here *******************-->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3
<script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="../js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="../js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>

</body>
</html>






