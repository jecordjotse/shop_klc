<?php 

include './cls/lib.cls.php'; 

include($cview);

if(isset($admin)){
	echo "<a href=\"?pg=admin&pgv=out\" >Sign OUT</a>";
} 
 ?>