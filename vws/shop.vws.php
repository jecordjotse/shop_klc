<?php  
echo "Hello";
include './cls/lib.cls.php'; 
echo "Hello";
$cust = new customer(1);
echo "Hello";
$id = $cust->getID();
$cartprods = $cust->getProducts();
echo count($cartprods)."<br>";
echo "<a href=\"./?pg=shop&pgv=cart\">Go To Cart</a>"."<br>";
include($cview);

?>
