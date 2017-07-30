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
}elseif(!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header('Location:../sessions.php');
}
else
{

    header('Location:index.php');
}
?>
<?php


// Create connection
include "../connection/db.php";
// Check connection

if(isset($_POST['add'])) {
    $Department_Name_ =$_POST['Department_Name'];
    $Department_Faculty_ =$_POST['Department_Faculty'];



    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO  Department_table(Department_Name,Department_Faculty)
VALUES ('$Department_Name_','$Department_Faculty_')";

    if ($con->query($sql) === TRUE) {
        $msg = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
            </div>";
    } else {

        $msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
            </div>" . $sql . "<br>" . $con->error;
    }

    $con->close();
}

?>

<?php include "header.php";?>

    <!-- Add content -->

    <form id="" method="POST">
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <div class="form-group label-floating">
            <label class="control-label">Department Name</label>
            <input type="text" class="form-control" required name="Department_Name">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Department Faculty</label>
            <input type="text" class="form-control" required name="Department_Faculty">
        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary" name="add" >Add Dep</button>

        </div>


    </form>

    <!-- #END# add content -->

<?php include "footer.php";?>