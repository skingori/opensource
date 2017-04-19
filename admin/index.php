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

<?php include 'header.php'; ?>

<!-- start of pannel one -->
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>
                                      <sup style="font-size: 20px">
                                          <i class="ion ion-ios7-people"></a></i>
                                      </sup>
                                    </h3>
                                    <p>
                                        All Users
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-people"></a></i>
                                </div>
                                <a href="users.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">
                                            <i class="ion ion-clock"></i>
                                        </sup>

                                    </h3>
                                    <p>
                                        Categories
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-clock"></i>
                                </div>
                                <a href="categ.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>
                                      <sup style="font-size: 20px">
                                          <i class="ion ion-bag"></i>
                                      </sup>
                                    </h3>
                                    <p>
                                        Products
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="prod.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>
                                      <sup style="font-size: 20px">
                                          <i class="ion ion-ios7-people"></a></i>
                                      </sup>
                                    </h3>
                                    <p>
                                        Suppliers
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-people"></a></i>
                                </div>
                                <a href="suppl.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">
                                            <i class="ion ion-ios7-ionic-outline"></a></i>
                                        </sup>
                                    </h3>
                                    <p>
                                        Supplier/Product
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-book"></a></i>
                                </div>
                                <a href="sup_prd.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">
                                            <i class="ion ion-ios7-bookmarks"></a></i>
                                        </sup>
                                    </h3>
                                    <p>
                                        Purchases
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-cart-outline"></i>
                                </div>
                                <a href="purchases.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">
                                            <i class="ion ion-android-mail"></a></i>
                                        </sup>
                                    </h3>
                                    <p>
                                        Feedback
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-mail"></a></i>
                                </div>
                                <a href="feedback.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">
                                            <i class="ion ion-help"></a></i>
                                        </sup>
                                    </h3>
                                    <p>
                                        Help
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-help"></a></i>
                                </div>
                                <a href="help.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
<!-- end of pannel one -->

                        <section class="content">
                            <!--********************Add content here *******************-->
                            

                            <!--********************Add content here *******************-->
                        </section>

<!-- end of pannel two -->

                    </div><!-- /.row -->

                    <!-- top row -->
<?php include 'footer.php'; ?>