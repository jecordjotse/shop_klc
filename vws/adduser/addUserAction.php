<?php 
include('con.php');
$type = $_POST['type'];
$color = $_POST['color'];
$coll = $_POST['coll'];
$price = $_POST['price'];
$psn = -1;
$uploadOk = -1;
$filesToUp = array();
$file_ary = reArrayFiles($_FILES['fileToUpload']);

if($_POST['button']=="Add"){
$sql = " Insert into Products ( type , color , collection , price )
          values ( '$type' , '$color' , '$coll' , '$price')";

                  echo 'Products Insert';
if(mysqli_query($con,$sql)){

$sql = " SELECT LAST_INSERT_ID()";

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$psn = $row['LAST_INSERT_ID()'];

                  echo 'directory forming';
$target_dir = "../img/";
if(is_dir($target_dir.$coll)){
$target_dir = $target_dir.$coll."/";
}else{
 mkdir($target_dir.$coll);
$target_dir = $target_dir.$coll."/";
}


if(is_dir($target_dir.$color)){
$target_dir = $target_dir.$color."/";
}else{
 mkdir($target_dir.$color);
$target_dir = $target_dir.$color."/";
}



$uploadOk = 1;
$i = 0;
$len = count($file_ary);
$filesToUp = array();
$mainImgID = 0;
    foreach ($file_ary as $file) {
      $n = $coll."/".$color;
       // if(validateFile($file)){
        $sql = "Insert into `img`( `img_name`, `img_loc`) 
                VALUES ( '$n' , './img/')";

                  echo 'each file';
        if( mysqli_query( $con , $sql ) ){
                  $sql = "Select LAST_INSERT_ID()";
                  $result = mysqli_query($con,$sql);
                  $row = mysqli_fetch_assoc($result);
                  $imgID = $row['LAST_INSERT_ID()'];

          if ($i == 0) {      
                 $sql = "Insert into `store_img`(`id`, `color`, `style` , `PSN`)
                          VALUES ( '$imgID' , '$color' , '$coll' , '$psn')";
                      $mainImgID = $imgID;
            }else{
                  $sql = "Insert into `view_img`(`id`, `view`, `type`)
                          VALUES ( '$imgID' , '$i' , '$mainImgID' )";
            }

        }else{
                  $uploadOk = 0;
                  echo 'IMG insert failed';
                  break;
                }

        
                  if(mysqli_query($con,$sql)){
                    array_push( $filesToUp , array( "file"=>$file , "target"=>($i==0)? $target_dir."main":$target_dir.$i) );
                    if(move_uploaded_file($_FILES['fileToUpload']["tmp_name"][$i], ($i==0)? $target_dir."main":$target_dir.$i)){
                      echo 'succes';
                      $uploadOk = 1;
                    }else{
                      echo 'failed';
                    }

                    }else{
                      $uploadOk = 0;
                      echo 'image insert failed';
                      break;
                    }
      $i++;
//  }else{
 //        $uploadOk = 0;
 //        echo 'Image to large';
  //      break;
  //    }
  }
}else{
  echo 'Products Insert Failed';

}

if($uploadOk != 0){
  $uploadOk = 1;

    foreach ($filesToUp as $file) {
    }
}

if($uploadOk == 0){
  $sql = "Delete from Products Where PSN = '$psn'";
                     mysqli_query($con,$sql);
  $sql = " DELETE FROM `img`
           WHERE  `img`.`img_id` NOT  IN (SELECT `img`.`img_id` FROM  `store_img`
           WHERE `img`.`img_id` = `store_img`.`id`
           UNION (SELECT `img`.`img_id` FROM   `view_img`
           WHERE `img`.`img_id` = `view_img`.`id`)  
           ORDER BY `img_id` ASC)";
                     mysqli_query($con,$sql);
        echo 'failed'.$uploadOk;
        foreach ($filesToUp as $file) {
      unlink($file["target"]);
    }
}
}else if($_POST['button']=="Edit"){

$psn = $_POST['psn'];

$sql = " update users 
         set  username = '$user_name' , review = '$review' , course_id = '$course_taken' 
         where ID='$Id'";
          if(mysqli_query($con,$sql)){
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
 }
}



?> 

<?php

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

function deriveAttr($file){ 

  $file_name = basename($file["name"]);
  $imageFileType = pathinfo( "/".$file_name , PATHINFO_EXTENSION );


  return array("name"=>$file_name, "type"=>$imageFileType);
}


function validateFile($file){

  // Check if image file is a actual image or fake image

    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        $err =  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $err = "File is not an image.";
        $uploadOk = 0;
    }
// Allow certain file formats
if($file["type"] != "jpg" && $file["type"] != "png" && $file["type"] != "jpeg"
&& $file["type"] != "gif" ) {
    $err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
  return ($uploadOk==1)? true : false;
}

function upload(){

  

}
?>