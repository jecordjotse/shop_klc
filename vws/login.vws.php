
        	<form action="./?pg=admin&pgv=reg" method="POST" name="myform" onsubmit="return(validation());">
        		<table class="formTable" id="formTable">
        			
        			<tr>
        				<td>Username</td>
        				<td><input type="text" name="Uname_log" placeholder="Username" required/></td>
                                        <td id="UnAlert"></td>
        			</tr>
        			<tr>
        				<td>Password</td>
        				<td><input type="password" name="pass_log" placeholder="Password" required></td>
                                        <td id="passAlert"></td>
        			</tr>
        			
        		</table>
        		<input type="submit" name="reg" value="LogIn" class="sub btn btn-default btn-block">
        	</form>
