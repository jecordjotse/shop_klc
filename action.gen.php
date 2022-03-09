<?php
if(isset($_POST['reg'])){
switch ($_POST['reg']) {
	case 'LogIn':
		# code...

	$un_log = preg_replace('#[^A-Za-z0-9_]#i', '', $_POST["Uname_log"]);
	$pswd_log = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["pass_log"]);
		
	if ($pswd_log = '1234567890'){
        setcookie( "admin" , 1 , time() + (15*60) , "/" );
        header("location: ../admin");
       }else{
       	echo "Error Logging In";
       }
		break;
	
	default:
		# code...
		break;

}


}
?>
