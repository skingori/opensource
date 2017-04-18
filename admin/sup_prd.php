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

$result1 = mysqli_query($con, "SELECT * FROM login_table WHERE login_username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $name= $res['login_name'];

}


//add header
require ('header.php');


//add body
echo 'Welcome to sams invention';


//add footer
require('footer.php');

