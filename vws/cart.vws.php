<?php

$cartprods = $cust->getProducts();


foreach ($cartprods as $val){
	$pid = $val['PID'];
	echo $val['PID']." ".$val['name']." ".$val['description']." ".$val['color_desc']." ".$val['price']." ".$val['qty'];
	echo "<a href=\"./?pg=shop&pgv=rem&PID=$pid\">remove</a>";
	echo '<br>';
} 


?>
