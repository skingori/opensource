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
<?php require 'h.php'; ?>
            <!--********************Add content here *******************-->
            <ol>
                <li>FAQ</li>
                <ul >
                    <h4><b>Where Can I Find Out More About Problems I May Face as an Online Consumer?</b></h4>


                    <li>Does the federal government have any information about online shopping?</li>
                    <li>Are there any non-profit organizations offering consumer advice on the Web?</li>
                    <li>What can I do to avoid scams and fraud online?</li>
                    <li>What can I do if I am the victim of fraud?</li>

                </ul>

                <br>

                <ul>
                    <h4><b>What About Returning a Product?</b></h4>

                    <li>How can I return a </li>
                    <li>How can I discover a store's policy on returns?</li>
                    <li>What's the usual method of returning a product to an online store?</li>
                    <li>Why was my return rejected?</li>
                    <li>When do I get the credit?</li>
                </ul>

                <li><a href="">HELP?</a></li>

            </ol>
            <!--********************Add content here *******************-->
       <?php include 'f.php';?>






