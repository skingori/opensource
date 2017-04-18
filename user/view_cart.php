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
<body class="skin-blue">
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
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>Shopping list</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!--********************Add content here *******************-->
            <?php
            include '../connection/config.php';
            ?>
            <form method="post" action="cart_update_1.php">
    <table  border=0 cellpadding="1" cellspacing="1" id="" width="100%" class="table table-hover table-striped"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
      <tbody>
            <?php
            if(isset($_SESSION["cart_products"])) //check session var
        {
                    $total = 0; //set initial total value
                    $b = 0; //var for zebra stripe table 
                    foreach ($_SESSION["cart_products"] as $cart_itm)
            {
                            //set variables to use in content below
                            $product_name = $cart_itm["product_name"];
                            $product_qty = $cart_itm["product_qty"];
                            $product_price = $cart_itm["product_price"];
                            $product_code = $cart_itm["product_code"];
                            $product_color = $cart_itm["product_color"];
                            $subtotal = ($product_price * $product_qty); //calculate Price x Qty

                            $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
                        echo '<tr class="'.$bg_color.'">';
                            echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
                            echo '<td>'.$product_name.'</td>';
                            echo '<td>'.$currency.$product_price.'</td>';
                            echo '<td>'.$currency.$subtotal.'</td>';
                            echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
                echo '</tr>';
                            $total = ($total + $subtotal); //add subtotal to total var
            }

                    $grand_total = $total + $shipping_cost; //grand total including shipping cost
                    foreach($taxes as $key => $value){ //list and calculate all taxes in array
                                    $tax_amount     = round($total * ($value / 100));
                                    $tax_item[$key] = $tax_amount;
                                    $grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
                    }

                    $list_tax       = '';
                    foreach($tax_item as $key => $value){ //List all taxes
                            $list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
                    }
                    $shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
            }
        ?>
        <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
        <tr><td colspan="5"><a href="index.php" class="button">Add More Items</a> <button class="btn-success" type="submit">Update</button></td></tr>
      </tbody>
    </table>
    <input type="hidden" name="return_url" value="<?php 
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo $current_url; ?>"/>
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








