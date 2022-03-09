<form method="post" action="?page=add_user">
<table width="700" align="center" cellspacing="5" cellpadding="5" >
<tr style="text-align:center;color:white;background:#cccccc">
    <th> PSN</th>
    <th> type </th>
    <th> Color </th>
    <th> Collection </th>
    <th> Price </th>
</tr>

<?php 
   include('con.php');

   $sql = "SELECT * 
           FROM Products";
   $result =mysqli_query($con,$sql);
   while($data = mysqli_fetch_assoc($result)){
?>
<tr style="text-align:center;">
  <td><a class="norm" href="?page=view_menus&pageContent=edituser&Id=<?php echo $data['PSN'] ; ?>"><?php echo $data['PSN'] ; ?></a></td>
  <td><?php echo $data['type'] ; ?></td>
  <td> <?php echo $data['color'] ; ?> </td>
  <td> <?php echo $data['collection'] ; ?> </td>
  <td> <?php echo $data['price'] ; ?> </td>

</tr>


<?php } ?>

<tr>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><input type="submit" value="Add User"></td>
</tr>
</table>
</form>
