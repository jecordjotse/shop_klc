<form method="post" action="?pg=admin&pgv=addAct" enctype="multipart/form-data">
<table width="600" align="center" cellspacing="5" cellpadding="5" id="add_tabl">

<tr>
    <td> NAME:</td>
    <td> <input type="text" name="name" placeholder=''> </td>
</tr>

<tr>
     <td> DESCRIPTION:</td>
     <td> <textarea name="desc"></textarea> </td>
</tr>
<tr>
     <td>COLOR DESCRIPTION</td>
     <td> <input type="text" name="color"> </td>
</tr>  
<tr>
     <td> PRICE:</td>
     <td> <input type="text" name="price"> </td>
</tr>  
<tr class='add_view'> 
      <td> <img src='#' class='img-thumbnail' width='0' height='0' id='output'/> </td> 
      <td> <span class='btn btn-default btn-file'> 
            MAIN IMAGE...  
            <input type='file'  name='fileToUpload[]' accept='image/*' value='Select Logo' onchange="openFile(event , 'output')" required='true'/>
            </span>
      </td>  
</tr> 
<tr class='add_view'> 
      <td> <img src='#' class='img-thumbnail' width='0' height='0' id='output1'/> </td> 
      <td> <span class='btn btn-default btn-file'> 
            PRODUCT VIEW 1...  
            <input type='file'  name='fileToUpload[]' accept='image/*' value='Select Logo' onchange="openFile(event , 'output1')" required='true'/>
            </span>
      </td>  
</tr>   
<tr class='add_view'> 
      <td> <img src='#' class='img-thumbnail' width='0' height='0' id='output2'/> </td> 
      <td> <span class='btn btn-default btn-file'> 
            PRODUCT VIEW 2...  
            <input type='file'  name='fileToUpload[]' accept='image/*' value='Select Logo' onchange="openFile(event , 'output2')" required='true'/>
            </span>
      </td>  
</tr>   
<tr class='add_view'> 
      <td> <img src='#' class='img-thumbnail' width='0' height='0' id='output3'/> </td> 
      <td> <span class='btn btn-default btn-file'> 
            PRODUCT VIEW 3...  
            <input type='file'  name='fileToUpload[]' accept='image/*' value='Select Logo' onchange="openFile(event , 'output3')" required='true'/>
            </span>
      </td>  
</tr>   
<tr class='add_view'> 
      <td> <img src='#' class='img-thumbnail' width='0' height='0' id='output4'/> </td> 
      <td> <span class='btn btn-default btn-file'> 
            PRODUCT VIEW 4...  
            <input type='file'  name='fileToUpload[]' accept='image/*' value='Select Logo' onchange="openFile(event , 'output4')" required='true'/>
            </span>
      </td>  
</tr>  
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
<a class='btn btn-default' onclick='addview()' >more views</a><input type="submit" value="Add" name="button">
</form>

<!--  <td><span class='btn btn-default btn-file'> Select Logo...<input type='file'  name='fileToUpload' accept='image/*' value='Select Logo' onchange='openFile(event , 'output"+i+"')'' required='true'/></span></td> 
*/

-->
