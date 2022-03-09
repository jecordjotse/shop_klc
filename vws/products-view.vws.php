<?php

$pid = $_GET['PID'];

$val = new product($pid);

	echo $val->getname();
	echo '<br>';
	echo $val->getdesc();
	echo '<br>';
	echo $val->getprice();
	echo '<br>';
	echo $val->getcolorDesc();
	echo '<br>';
	$photos = $val->getPhotos();
		foreach ($photos as $photo) {
			$loc = $photo['loc'];
			echo "<img src=\"./$loc\"/>";
		}
?>


	<form  action="./" method="GET">
		<input type="submit" value="Add To Cart">
		<input type="hidden" name="pgv" value="add">
		<input type="hidden" name="PID" value="<?php echo $pid ?>">
		<input type="number" name="qty" value="1">
	</form>