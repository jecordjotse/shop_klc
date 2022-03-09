<?php

$products = $cust->getPro();


foreach ($products as $val){
	$pid = $val->getID();
	$photos = $val->getPhotos();
?>

<div class="portfolio-group">
<?php
	echo "<a class=\"portfolio-item\" href=\"./?pg=shop&pgv=view&PID=$pid\">";
				$loc = $photos[4]['loc'];
	echo "<img id=\"port-img\"   src=\"./$loc\" alt=\"\" >";
?>
						<div class="detail">
<?php 
							foreach ($photos as $photo) {
									$loc = $photo['loc'];
									if(!contains('main' ,$photo['loc']))
										echo "<img src=\"./$loc\" class=\"small-img\"/>";
							} 
?>
		</div>
<?php
	echo $val->getname()." ".$val->getdesc()." ".$val->getprice()." ".$val->getcolorDesc();
?>
						
				</a>				
</div>

<?
} 
?>