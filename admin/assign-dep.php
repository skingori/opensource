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
//get employee id
$empid=$_GET['id'];

if(isset($_POST['add'])) {
    $Employee_Dep_Department_Id_ =$_POST['Employee_Dep_Department_Id'];
    $Employee_Dep_Employee_Id_ =$_POST['Employee_Dep_Employee_Id'];



    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO Employee_Department(Employee_Dep_Department_Id,Employee_Dep_Employee_Id)
VALUES ('$Employee_Dep_Department_Id_' ,'$Employee_Dep_Employee_Id_')";

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
            <label class="control-label">Employee Id</label>
            <input type="text" class="form-control" required name="Employee_Dep_Employee_Id" value="<?php echo $empid;?>" readonly>
        </div>

        <div class="form-group">
            <label>Department Id:</label>
            <select name="Employee_Dep_Department_Id" required class="form-control">
                <option selected></option>
                <?php
                $result = mysqli_query($con,"SELECT Department_Id FROM Department_table");
                while($row = mysqli_fetch_array($result))
                {
                    echo '<option value="'.$row['Department_Id'].'">';
                    echo $row['Department_Id'];
                    echo '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-primary" name="add" >Assign Dep</button>

        </div>


    </form>

    <!-- #END# add content -->

<?php include "footer.php";?>