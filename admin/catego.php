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

$result1 = mysqli_query($con, "SELECT * FROM Login_table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $name= $res['Login_Username'];

}

?>



<?php
    $isEditDisabled = true;
    $isAddDisabled= true;

    if (isset($_GET['edit'])) {
        $isEditDisabled = false;

        $edit = $_GET['edit'];
        //selecting data associated with this particular id
        $result = mysqli_query($con, "SELECT * FROM Category_table WHERE Category_Id=$edit");

        while($res = mysqli_fetch_array($result))
        {

            $category_desc_= $res['category_desc'];
            $category_name_= $res['category_name'];
        }

    }

    if (isset($_GET['add'])){
        $isAddDisabled= false;
    }

    require '../connection/db.php';



    if (isset($_POST['add'])) {
            $category_desc_=$_POST['category_desc'];
            $category_name_=$_POST['category_name'];
                            mysqli_query($con,"INSERT INTO Category_table (Category_Desc,Category_Name)
    values ('$category_desc_','$category_name_')
    ") or die(mysqli_error($con));

    $msg = "<div class='alert alert-success'>
                    <span class='glyphicon glyphicon-align-justify'></span> &nbsp; Category Added !
                </div>";
    echo '<meta content="4;catego.php?add" http-equiv="refresh" />';




    }elseif (isset($_POST['edit'])){

        $category_desc_=$_POST['category_desc'];
        $category_name_=$_POST['category_name'];

        $result = mysqli_query($con, "UPDATE Category_table SET Category_Desc='$category_desc_',Category_Name='$category_name_' WHERE Category_Id=$edit");

        $msg = "<div class='alert alert-info'>
                    <span class='glyphicon glyphicon-edit'></span> &nbsp; Category Updated !
                </div>";
        echo '<meta content="4;categ.php" http-equiv="refresh" />';


      }

                            
      ?>
<?php include 'sh.php'; ?>
            <!--********************Add content here *******************-->
            <form  method="POST" enctype="multipart/form-data" id="mytable">
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
            <div class="form-group has-feedback">
            <label>Category Name:</label>
            <input type="text" name="category_name" value="<?php echo $category_name_;?>" id="in" required class="form-control"/>
            </div>
            <div class="form-group has-feedback">
            <label>Category Description:</label>
            <input type="text" name="category_desc" value="<?php echo $category_desc_;?>" id="in" required class="form-control"/>
            </div>

            <div class="inline">
            <button type="submit" name="add" value="" <?php echo $isAddDisabled?'disabled':'';?> class="btn btn-circle" ><i class="fa fa-plus"></i></button>
            <button type="submit" name="edit" value="" <?php echo $isEditDisabled?'disabled':''; ?> class="btn bg-red btn-circle" ><i class="fa fa-edit"></i></button>
            </div>

            </form>
<?php include 'sf.php'; ?>




