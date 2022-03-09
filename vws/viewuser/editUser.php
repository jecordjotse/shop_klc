<?php   
        include('con.php');
        $Id = $_GET['Id']; 
        $sql = "select `Products`.`PSN` , `Products`.`type` , `Products`.`color` , `Products`.`collection` , `Products`.`price` , `store_img`.`id`
                from `Products` , `store_img`
                where `Products`.`PSN` = `store_img`.`PSN`
                AND `Products`.`PSN` = '$Id' ";

        $result = mysqli_query($con,$sql);
      $data1 = mysqli_fetch_assoc($result);
?>
<form method="post" action="?page=add_user&pageContent=adduseraction&Id=<?php echo $data['ID'] ; ?>">
<input type="hidden" name="psn" value="<?php echo $Id; ?>">
<table width="600" align="center" cellspacing="5" cellpadding="5" id="add_tabl">
<tr>
    <td> TYPE</td>
    <td> <select name="type">
<?php    include('con.php');
        $sql = "select * from ProdInfo
                GROUP by Name";
        $result = mysqli_query($con,$sql);

   while($data = mysqli_fetch_assoc($result)){

?>
    <option value="<?php echo $data['Name']; ?>"  <?php echo ($data['Name']==$data1['type'])? 'selected':''; ?> > <?php echo $data['Name'] ?> </option>

        <?php 
    }
    ?>
        </select> 
    </td>
</tr>
<tr>
    <td> COLOR:</td>
    <td> <input type="text" name="color" placeholder='brown-black-...' value="<?php echo $data1['color']; ?>"> </td>
</tr>

<tr>
     <td>COLLECTION</td>
     <td> <input type="text" name="coll" value="<?php echo $data1['collection']; ?>"> </td>
</tr>
<tr>
     <td>PRICE</td>
     <td> <input type="text" name="price" value="<?php echo $data1['price']; ?>"> </td>
</tr>  
<tr class='add_view'> 
      <td> <img src='../img/<?php echo $data1['collection']."/".$data1['color']."/main"; ?>' class='img-thumbnail' width='30%' height='30%' id='output'/> </td> 
      <td> <span class='btn btn-default btn-file'> 
            MAIN IMAGE...  
            <input type='file'  name='fileToUpload[]' accept='image/*' value='Select Logo' onchange="openFile(event , 'output')" required='true'/>
            </span>
      </td>  
</tr> 

<?php
$sql = "SELECT * 
FROM `view_img` , `store_img`
WHERE `view_img`.`type` = `store_img`.`id`
AND `store_img`.`PSN` = $Id";
        $result = mysqli_query($con,$sql);
$i = 1;
   while($data = mysqli_fetch_assoc($result)){
?>
<tr class='add_view'> 
      <td> <img src='../img/<?php echo $data['style']."/".$data['color']."/".$data['view'] ?>' class='img-thumbnail' width='30%' height='30%' id='output1'/> </td> 
      <td> <span class='btn btn-default btn-file'> 
            PRODUCT VIEW <?php echo $i; ?>...  
            <input type='file'  name='fileToUpload[]' accept='image/*' value='' onchange="openFile(event , 'output1')" required='true'/>
            </span>
      </td>  
</tr> 
<?php
$i++;
}
?>  
<script>
var incr = (function () {
    var i = 0;

    return function () {
        return i++;
    }
})();

function addview() {
    var i = incr();
    var tr_container = document.createElement('tr');
    var td_1 = document.createElement('td');
    var td_2 = document.createElement('td');


     var td_1_content = "<img src='#' class='img-thumbnail' width='0' height='0' id='output" + i + "'/> ";
     var td_2_content = "<span class='btn btn-default btn-file'>  PRODUCT VIEW...  <input type='file'  name='fileToUpload[]' accept='image/*' value='Select Logo' onchange='openFile(event , \"output" + i + "\")' required='true'/></span> ";

    td_1.innerHTML = td_1_content;
    td_2.innerHTML = td_2_content;
    tr_container.appendChild(td_1);
    tr_container.appendChild(td_2);
    document.getElementById("add_tabl").appendChild(tr_container);
    return false;
};
</script>

<script>

  function openFile(event , val){
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById(val);
      output.src = dataURL;
      output.width = "100";
      output.height = "100";
    };
    reader.readAsDataURL(input.files[0]);
  };
</script>
</table>
<input type="submit" value="Edit" name="button">
</form>


