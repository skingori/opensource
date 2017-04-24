<?php
$currency = 'Ksh '; //Currency Character or code

$db_username = 'root';
$db_password = 'root';
$db_name = 'shopping';
$db_host = 'localhost';
$db_port = '8889';

$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 19, 
                            'Service Tax' => 5
                            );						
//connect to iMySql
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name,$db_port);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>

