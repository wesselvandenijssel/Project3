<?php
	// Hier komt de code te staan die ervoor zorgt dat er een database-connectie is
	require '../assets/config/config.php';

	// Hier komt de code te staan die de gebruiker ophaalt uit de database die geupdate gaat worden 
	if( isset($_GET['upd']) ) {
		$id     = $_GET['upd'];
		$query  = "SELECT * FROM `gebruikers` WHERE nummer=$id";
		$result = mysqli_query($con, $query);
		$user   = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		mysqli_close($con);
		echo $id;
	   }
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
			<div class='col-lg-12'>
				<div class='col-lg-4 col-lg-offset-4'>
					<h3>Update Data</h3>
					<hr/>
					<form name='update' id='update' action='../assets/config/actions.php?id=<?php echo $user['Nummer'] ?>' method='POST'>
						<input type="hidden" name="id" value="<?php echo $user['Nummer'] ?>">
						<div class='form-group'>
							<label for='Voornaam'>Voornaam</label>
							<input value='<?php echo $user['Voornaam'] ?>' name='Voornaam' id='Voornaam' type='text' class='form-control' placeholder='firstname' />
						</div>
						<div class='form-group'>
							<label for='Achternaam'>Achternaam</label>
							<input value='<?php echo $user['Achternaam'] ?>' name='Achternaam' id='Achternaam' type='text' class='form-control' placeholder='lastname' />
						</div>
						<div class='form-group'>
							<label for='Mail'>E-mail</label>
							<input value='<?php echo $user['Mail'] ?>' name='Mail' id='Mail' type='text' class='form-control' placeholder='email' />
						</div>
						<div class='form-group'>
							<label for='Username'>Username</label>
							<input value='<?php echo $user['Username'] ?>' name='Username' id='Username' type='text' class='form-control' placeholder='username' />
						</div>
						<div class='form-group'>
							<label for='Password'>New Password</label>
							<input name='Password' id='Password' type='Password' class='form-control' placeholder='Enter new password' />
						</div>
						<div class='form-group'>
                            <button name='upd' id='upd' class='btn btn-primary btn-block'>Update</button>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>