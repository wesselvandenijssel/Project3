<?php
session_start();
include "../assets/config/config.php";
if(isset($_SESSION["User"])){
	$sql = $con->query("SELECT * FROM gebruikers WHERE Admin >= 1 AND Username LIKE '%{$_SESSION['User']}%'");
  if ($sql->num_rows >= 1) {
  }
  else{
	//header("location:../login");
	//exit;
	echo("<script>location.href = '../login/index.php';</script>");
}
}
?>
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
							<label for='Straat'>Straat</label>
							<input value='<?php echo $user['Straat'] ?>' name='Straat' id='Straat' type='text' class='form-control' placeholder='Straat' />
						</div>
						<div class='form-group'>
							<label for='Huisnummer'>Huisnummer</label>
							<input value='<?php echo $user['Huisnummer'] ?>' name='Huisnummer' id='Huisnummer' type='text' class='form-control' placeholder='Huisnummer' />
						</div>
						<div class='form-group'>
							<label for='Plaats'>Plaats</label>
							<input value='<?php echo $user['Plaats'] ?>' name='Plaats' id='Plaats' type='text' class='form-control' placeholder='Plaats' />
						</div>
						<div class='form-group'>
							<label for='Postcode'>Postcode</label>
							<input value='<?php echo $user['Postcode'] ?>' name='Postcode' id='Postcode' type='text' class='form-control' placeholder='Postcode' />
						</div>
						<div class='form-group'>
							<label for='Telefoonnummer'>Telefoonnummer</label>
							<input value='<?php echo $user['Telefoonnummer'] ?>' name='Telefoonnummer' id='Telefoonnummer' type='text' class='form-control' placeholder='Telefoonnummer' />
						</div>
						<div class='form-group'>
							<label for='Land'>Land</label>
							<input value='<?php echo $user['Land'] ?>' name='Land' id='Land' type='text' class='form-control' placeholder='Land' />
						</div>
						<div class='form-group'>
							<label for='Admin'>Admin</label>
							<input value='<?php echo $user['Admin'] ?>' name='Admin' id='Admin' type='text' class='form-control' placeholder='Admin' />
						</div>
						<div class='form-group'>
							<label for='Organisator'>Organisator</label>
							<input value='<?php echo $user['organisator'] ?>' name='Organisator' id='Organisator' type='text' class='form-control' placeholder='Organisator' />
						</div>
						<div class='form-group'>
							<label for='Code'>Code</label>
							<input value='<?php echo $user['code'] ?>' name='Code' id='Code' type='text' class='form-control' placeholder='Code' />
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