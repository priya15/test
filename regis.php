<?php include("header.php");?>
<div class="container">
	<form action="regisdata.php" method="post">
	<div class="col-md-6">
		<label>Username:</label>
		<input type="text" name="username" class="form-control" required> 
	</div>
	<div class="col-md-6">
		<label>Password:</label>
		<input type="password" name="password" class="form-control" required> 
	</div>
	<div class="col-md-6">
		<input type="submit" value="Register" class="btn btn-danger"> 
	</div>
	</form>

</div>