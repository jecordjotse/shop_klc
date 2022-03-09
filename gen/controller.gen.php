<?php $page = (isset($_GET['pg']))? $_GET['pg']: 'shop';

 switch ($page) {
 	case 'shop':
 			$view = './vws/shop.vws.php';
 			$page = (isset($_GET['pgv']))? $_GET['pgv']: 'list';

 			switch ($page){
 				case 'list':
 					$cview = './vws/products-list.vws.php';
 				break;
 
 				case 'view':
 					$cview = './vws/products-view.vws.php';
 				break;
 	
 				case 'cart':
 					$cview = './vws/cart.vws.php';
 				break;
 				default:
 					$cview = './vws/products-list.vws.php';
 				break;
 			}
 		break;
 	
 	case 'admin':
 			$view = './inc/admin.inc.php';
 			if(isset($_COOKIE["admin"])&&$_COOKIE["admin"]==1){
 			$admin = true;
 			$page = (isset($_GET['pgv']))? $_GET['pgv']: 'addView';
 			switch ($page){
 				case 'addView':
 					$cview = './vws/addProduct.vws.php';
 				break;
 	
 				case 'addAct':
 					$cview = './gen/addProduct.gen.php';
 				break;
 				case 'out':
 					$cview = './gen/reg.gen.php';
 				break;
 				default:
 					$cview = './vws/addProduct.vws.php';
 				break;
 			}
 			}else{
 			$page = (isset($_GET['pgv']))? $_GET['pgv']: 'log';
 			switch ($page){
 				case 'log':
 					$cview = './vws/login.vws.php';
 				break;
 	
 				case 'reg':
 					$cview = './gen/reg.gen.php';
 				break;
 				default:
 					$cview = './vws/login.vws.php';
 				break;
 			}
 			}
 		break;
 	default:
 		# code...
 		break;
 }
?>