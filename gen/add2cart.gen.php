<?php
$qty = $_GET['qty'];
$cust->add2Cart($pid , $qty);

header('location:./?pg=shop');

?>
