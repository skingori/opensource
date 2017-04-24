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
require ('sh.php');

?>

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



<?php
//add footer
require('sf.php');
