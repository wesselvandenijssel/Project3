<?php
	// Hier komt de code te staan die ervoor zorgt dat er een database-connectie is
	require 'config/config.php';

	// Hier komt de code te staan die de gebruiker ophaalt uit de database die geupdate gaat worden 
	if( isset($_GET['upd']) ) {
		$id     = $_GET['upd'];
		$query  = "SELECT * FROM `tbl_users` WHERE id=$id";
		$result = mysqli_query($con, $query);
		$user   = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		mysqli_close($con);
	   }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='description' content='Basic loginsystem'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta http-equiv='x-ua-compatible' content='ie=edge'>
	<link href='css/bootstrap.min.css' rel='stylesheet'>
	<title>Basic Login System</title>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-12'>
				<div class='col-lg-4 col-lg-offset-4'>
					<h3>Update Data</h3>
					<hr/>
					<form name='update' id='update' action='config/actions.php?id=<?php echo $user['id'] ?>' method='post'>
						<div class='form-group'>
							<label for='voornaam'>voornaam</label>
							<input value='<?php echo $user['voornaam'] ?>' name='voornaam' id='voornaam' type='text' class='form-control' placeholder='voornaam' />
						</div>
						<div class='form-group'>
							<label for='voornaam'>voornaam</label>
							<input value='<?php echo $user['voornaam'] ?>' name='voornaam' id='voornaam' type='text' class='form-control' placeholder='voornaam' />
						</div>
						<div class='form-group'>
							<label for='mail'>E-mail</label>
							<input value='<?php echo $user['mail'] ?>' name='mail' id='mail' type='text' class='form-control' placeholder='mail' />
						</div>
						<div class='form-group'>
							<label for='username'>Username</label>
							<input value='<?php echo $user['username'] ?>' name='username' id='username' type='text' class='form-control' placeholder='username' />
						</div>
						<div class='form-group'>
							<label for='password'>New Password</label>
							<input name='password' id='password' type='password' class='form-control' placeholder='Enter new password' />
						</div>
						<div class='form-group'>
							<button name='btnupdate' id='update' class='btn btn-primary btn-block'>Update</button>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>