<?php

include '../connection/db.php';

if (isset($_GET['usd'])) {

    $con = mysqli_query($con, "DELETE FROM Login_table WHERE Login_Id='".($_GET['usd'])."'");

    header("Location:users.php");
}


elseif (isset($_GET['cat'])){
    $con = mysqli_query($con, "DELETE FROM Category_table WHERE Category_Id='".($_GET['cat'])."'");

    header("Location:categ.php");

}
elseif (isset($_GET['prod'])){
    $con = mysqli_query($con, "DELETE FROM Products_table WHERE Product_Code='".($_GET['prod'])."'");

    header("Location:prod.php");

}
elseif (isset($_GET['sup'])){
    $con = mysqli_query($con, "DELETE FROM Supplier_table WHERE Supplier_Id='".($_GET['sup'])."'");

    header("Location:suppl.php");

}
elseif (isset($_GET['sup1'])){
    $con = mysqli_query($con, "DELETE FROM Supplier_products WHERE Sup_Prod_Id='".($_GET['sup1'])."'");

    header("Location:sup_prd.php");

}
elseif (isset($_GET['pur'])){
    $con = mysqli_query($con, "DELETE FROM purchase_table WHERE purchase_id='".($_GET['pur'])."'");

    header("Location:purchases.php");

}
elseif (isset($_GET['fed'])){
    $con = mysqli_query($con, "DELETE FROM feedback_table WHERE feedback_id='".($_GET['fed'])."'");

    header("Location:feedback.php");

}

