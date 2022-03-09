
<?php 
include('DBcon.php');
$user_id = $_GET['Id'];

$sql = " DELETE 
         FROM users 
         WHERE ID = '$user_id'";
if(mysqli_query($con,$sql)){
?>
 <form method=post action="?page=view_menus">
   <table>
     <tr>
         <td>
             <?php echo "Deleted Succesfully"; ?> 
         </td>
         <td>
              <input type="submit" value="View User">
         </td>
       </tr>
   </table>
</form>
   <?php
}else{
   echo "Error in Add, Check DB connection";
}

?>
