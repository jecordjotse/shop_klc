<?php

/*
 *FUNCTIONS
 */
function contains($needle, $haystack){
    return strpos($haystack, $needle) !== false;
}

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