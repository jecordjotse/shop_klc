<?php
if(isset($_GET['pgv'])){
switch ($_GET['pgv']) {
	case 'reg':
	$un_log = preg_replace('#[^A-Za-z0-9_]#i', '', $_POST["Uname_log"]);
	$pswd_log = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["pass_log"]);
		
    $admin = false;
	if ($pswd_log == "1234567890"){
        setcookie( "admin" , 1 , time() + (15*60) , "/" );
        $admin = true;
    echo "in";
       }
    echo "try";
		break;
	case 'out':
  setcookie("admin" , "" ,time()-3600 , "/");
    $admin = false;
    echo "out";
		break;
}
	header("location: ./?pg=admin");
}
?>