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

?>

<?php
        
        require '../connection/db.php';

      if (isset($_POST['submit'])) {             
                $category_desc_=$_POST['category_desc'];
                $category_name_=$_POST['category_name'];
                                mysqli_query($con,"INSERT INTO category_table (category_desc,category_name)
      values ('$category_desc_','$category_name_')
      ") or die(mysql_error());
         
       $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Category Added !
					</div>";
       echo '<meta content="4;catego.php" http-equiv="refresh" />';

      }

                            
      ?>
<?php include 'header.php'; ?>
            <!--********************Add content here *******************-->
            <form  method="POST" enctype="multipart/form-data" id="mytable">
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
          
          <div class="form-group has-feedback">
              <label>Category Description:</label>
              <input type="text" name="category_desc"  id="in" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <label>Category Name:</label>
              <input type="text" name="category_name"  id="in" required class="form-control"/>
          </div>
          <div class="form-group has-feedback">
              <input type="submit" name="submit" value="Add Category" class="btn btn-primary" />
          </div>

    </form>
<?php include 'footer.php'; ?>




