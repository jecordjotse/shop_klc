<?php 
$name = $_POST['name'];
$desc = $_POST['desc'];
$color = $_POST['color'];
$price = $_POST['price'];
$psn = -1;
$uploadOk = -1;
$filesToUp = array();
$file_ary = reArrayFiles($_FILES['fileToUpload']);

if($_POST['button']=="Add"){

$prod = new product(0);
$prod->setname($name);
$prod->setdesc($desc);
$prod->setprice($price);
$prod->setcolorDesc($color);

$psn = $prod->getID();

echo 'directory forming';
$target_dir = "med/img/";
$target_dir = $target_dir.$psn."/";


if(!is_dir("./".$target_dir)){
 mkdir("./".$target_dir);
}



$uploadOk = 1;
$i = 0;
$len = count($file_ary);
$filesToUp = array();
$mainImgID = 0;
    foreach ($file_ary as $file) {
      $n = ($i==0)? 'main':$i;

      $prod->Photo($target_dir.$n);
      
                    array_push( $filesToUp , array( "file"=>$file , "target"=>$target_dir.$n) );
                    if(move_uploaded_file($_FILES['fileToUpload']["tmp_name"][$i],  $target_dir.$n)){
                      echo 'succes';
                      $uploadOk = 1;
                    }else{
                      echo 'failed';
                      $uploadOk = 0;
                    }

      $i++;
  }

if($uploadOk == 0){
   $prod->rem();
        foreach ($filesToUp as $file) {
      unlink($file["target"]);
    }
}


}else if($_POST['button']=="Edit"){
?>
  <form method=post action="?page=view_menus">
   <table>
     <tr>
       <td>
        <?php echo "Updated Succesfully"; ?> </td>
       </tr>
       <tr>
         <td><input type="submit" value="View List"></td>
       </tr>
   </table>
   </form>
   <?php
   }else{
   echo "Error in Add, Check DB connection";
}


header('location:./?pg=admin');


?>