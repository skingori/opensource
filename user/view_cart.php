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
else {

    header('Location:index.php');
}

if (isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])==0) {

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
            <form method="post" action="cart_update_1.php">
    <table  border=0 cellpadding="1" cellspacing="1" id="" width="100%" class="table table-hover table-striped table-condensed table-bordered"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
      <tbody>
            <?php
            if(isset($_SESSION["cart_products"])) //check session var
        {
                    global $b;
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
                            echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
                            echo '<td>'.$product_name.'</td>';
                            echo '<td>'.$currency.$product_price.'</td>';
                            echo '<td>'.$currency.$subtotal.'</td>';
                            echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
                echo '</tr>';
                            $total = ($total + $subtotal); //add subtotal to total var
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
        <tr><td colspan="5"><a href="index.php" class="button">Add More Items</a> <button class="btn-success" type="submit">Update</button> <a href="pay.php" class="button btn-success">Pay</a></td></tr>
      </tbody>
    </table>
    <input type="hidden" name="return_url" value="<?php
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo $current_url; ?>"/>
    </form>
            <!--********************Add content here *******************-->
        <?php include "f.php";?>






