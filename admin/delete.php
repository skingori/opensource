<?php

include '../connection/db.php';

if (isset($_GET['usd'])) {

    $con = mysqli_query($con, "DELETE FROM login_table WHERE login_id='".($_GET['usd'])."'");

    header("Location:users.php");
}


elseif (isset($_GET['cat'])){
    $con = mysqli_query($con, "DELETE FROM category_table WHERE category_id='".($_GET['cat'])."'");

    header("Location:categ.php");

}
elseif (isset($_GET['prod'])){
    $con = mysqli_query($con, "DELETE FROM products_table WHERE product_code='".($_GET['prod'])."'");

    header("Location:prod.php");

}
elseif (isset($_GET['sup'])){
    $con = mysqli_query($con, "DELETE FROM supplier_table WHERE supplier_id='".($_GET['sup'])."'");

    header("Location:suppl.php");

}
elseif (isset($_GET['sup1'])){
    $con = mysqli_query($con, "DELETE FROM supplier_product WHERE supplier_product_id='".($_GET['sup1'])."'");

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

