<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 02/04/2017
 * Time: 00:07
 */


//including the database connection file
include("../connection/db.php");


if (isset($_GET['aus'])){
   $aus =$_GET['aus']; //deleting feeds
   $result = mysqli_query($con, "DELETE FROM Login_table WHERE Login_Id=$aus ");
   
   header("Location:allusers.php?msg");
   
}

if (isset($_GET['perf'])){
   $perf =$_GET['perf']; //deleting feeds
   $result = mysqli_query($con, "DELETE FROM Performance_Table WHERE Performance_Id=$perf ");
   
   header("Location:performance.php");
   
}

if (isset($_GET['rew'])){
    $rew =$_GET['rew']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Employee_reward WHERE Employee_reward_id=$rew ");

    header("Location:rewards.php");

}

if (isset($_GET['dec'])){
    $dec =$_GET['dec']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Employee_disciplinary WHERE Emp_discip_id=$dec ");

    header("Location:discip.php");

}

if (isset($_GET['dep'])){
    $dep =$_GET['dep']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Employee_Department WHERE Employee_Department_id=$dep ");

    header("Location:empdep.php");

}

if (isset($_GET['depart'])){
    $dep =$_GET['depart']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Department_table WHERE Department_Id=$dep ");

    header("Location:departments.php");

}

?>