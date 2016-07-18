<table class="table-condensed">
	<tbody>
		<tr>
			<td>
				<form method="POST" action="">
					<input type="submit" name="button1" value="Admin">
					<?php
					include("inc/functions.php"); 
					if (isset($_POST['button1'])) { 
					 	return admin(); 
					}  
					?>
				</form>
			</td>
			<td>
				<input type="button" value="Not Admin">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Admin By Dept">
			</td>
			<td>
				<input type="button" value="Not Admin By Dept">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Admin By First Name">
			</td>
			<td>
				<input type="button" value="Not Admin By First Name">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Admin By Last Name">
			</td>
			<td>
				<input type="button" value="Not Admin By Last Name">
			</td>
		</tr>																
	</tbody>
</table>














<script> 
$('#resetform').click();
</script>



<?php
// include("inc/functions.php"); 
// if (isset($_POST['button1'])) { 
//  	return admin(); 
// }  
?>