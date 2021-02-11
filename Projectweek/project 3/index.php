<?php 
session_start();
require 'assets/config/config.php';
if(isset($_SESSION["User"])){
}
else{
	header("location:login");
}
$query = "SELECT * FROM `gebruikers`";
$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
?>

<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='description' content='Basic loginsystem'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta http-equiv='x-ua-compatible' content='ie=edge'>
	<title>Basic Login System</title>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-12 col-lg-offset-2'>
				<div class='col-lg-12 col-lg-offset-2'>
					<h3>User Data</h3>
					<hr>
					<div class='table-responsive'>
						<table class='table table-striped'>
							<thead>
								<tr>
									<th>E-mail</th>
									<th>Username</th>
									<th>Password</th>
								</tr>
							</thead>
							<tbody>
								<?php
									// Plaats hier de code voor het ophalen van de gebruikers uit de database. 
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class='row'>
			<div class='col-lg-8 col-lg-offset-2'>
				<div class='col-lg-6 col-lg-offset-3'>
					<h3>Signup</h3>
					<hr/>
					<form name='signup' id='signup' action='assets/config/actions.php' method='post'>
						<div class='form-group'>
							<label for='mail'>E-mail</label>
							<input name='mail' id='mail' type='text' class='form-control' placeholder='mail' required />
						</div>
						<div class='form-group'>
							<label for='username'>Username</label>
							<input name='username' id='username' type='text' class='form-control' placeholder='username' style='cursor:text; background-color:#fff;' onfocus='this.removeAttribute("readonly");' readonly required />
						</div>
						<div class='form-group'>
							<label for='password'>Password</label>
							<input name='password' id='password' type='password' class='form-control' placeholder='password' style='cursor:text; background-color:#fff;' onfocus='this.removeAttribute("readonly");' readonly required />
						</div>
						<div class='form-group'>
							<button name='submit' id='submit' class='btn btn-primary btn-block'>Sign Up</button>
							<a href="login/index.php">login</a>
							<a href="logout/logout.php">log out</a>
							<a href="factuur">factuur</a>
						</div>
						<?php
						echo $_SESSION["User"]
						?>
					</form>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>