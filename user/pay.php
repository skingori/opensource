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

        case 1:
            header('location:../admin/index.php');//redirect to  page
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

<?php include "h.php";?>

            <!--********************Add content here *******************-->
            <?php
            include '../connection/config.php';
            ?>
            <form method="post" action="">
                <table  border=0 cellpadding="1" cellspacing="1" id="" width="100%" class="table table-hover table-striped table-condensed table-bordered"><thead><tr><th>Name</th><th>Price</th><th>Total</th></tr></thead>
                    <tbody>
                    <?php
                    if(isset($_SESSION["cart_products"])) //check session var
                    {
                        $total = 0; //set initial total value
                        $b = 0; //var for zebra stripe table
                        foreach ($_SESSION["cart_products"] as $cart_itm)
                        {
                            //set variables to use in content below
                            $product_name = $cart_itm["product_name"];
                            $product_qty = $cart_itm["product_qty"];
                            $product_price = $cart_itm["product_price"];
                            $product_code = $cart_itm["product_code"];
                            $product_color = $cart_itm["product_color"];
                            $subtotal = ($product_price * $product_qty); //calculate Price x Qty

                            $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe
                            echo '<tr class="alert-info">';
                            //echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
                            echo '<td>'.$product_name.'</td>';
                            echo '<td>'.$currency.$product_price.'</td>';
                            echo '<td>'.$currency.$subtotal.'</td>';
                            //echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
                            echo '</tr>';
                            $total = ($total + $subtotal); //add subtotal to total var

                            $quantity_=($b * $product_qty);//by sam for calcuating total
                        }

                        $grand_total = $total + $shipping_cost; //grand total including shipping cost
                        foreach($taxes as $key => $value){ //list and calculate all taxes in array
                            $tax_amount     = round($total * ($value / 100));
                            $tax_item[$key] = $tax_amount;
                            $grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
                        }

                        $list_tax       = '';
                        foreach($tax_item as $key => $value){ //List all taxes
                            $list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
                        }
                        $shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';

                    }
                    ?>
                    <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>

                </table>


                <?php

                require '../connection/db.php';

                if (isset($_POST['submit'])) {
                    $payment_type=$_POST['payment'];
                    mysqli_query($con,"INSERT INTO purchase_table (purchase_product_quantity,purchase_payment_method,purchase_date,purchase_total,purchase_by)
      VALUES ('$quantity_','$payment_type',now(),'$grand_total','$name')
      ") or die(mysql_error());

                    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Thank you ,payment successful !
					</div>";
                    echo '<meta content="2;index.php" http-equiv="refresh" />';
                    unset($_SESSION["cart_products"]);

                }


                ?>
            </form>

            <form class="" id="xx" method="POST">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <div class="form-group">


                    <fieldset>

                        <!--<img src="../img/LipaNaMPESA.png" width="85" height="70">-->
                        <input type="radio" checked name="payment"  value="M-PESA" /> <a href="javascript:window.open('mpesa.html','till number','width=600,height=400')">M-Pesa</a>
                        <!--<img src="../img/Airtel-Money.png" width="85" height="70">-->
                        <input type="radio" name="payment" value="AIRTEL_MONEY" /> <a href="javascript:window.open('mpesa.html','till number','width=600,height=400')">Airtel Money</a>
                        <i> <small>(*click to get till number) </small></i>
                    </fieldset>

                </div>

                <div class="form-group">
                <button type="submit" name="submit" class="btn bg-red">Complete Payment</button>
                </div>
            </form>

<?php include 'f.php'; ?>






