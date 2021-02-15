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
							<label for='Organisatornaam'>Organisatornaam</label>
							<input value='<?php echo $user['Organisatornaam'] ?>' name='Organisatornaam' id='Organisatornaam' type='text' class='form-control' placeholder='Organisatornaam' />
						</div>
						<div class='form-group'>
							<label for='Events'>Events</label>
							<input value='<?php echo $user['Events'] ?>' name='Events' id='Events' type='text' class='form-control' placeholder='Events' />
						</div>
						<div class='form-group'>
							<label for='foto'>foto</label>
							<input value='<?php echo $user['foto'] ?>' name='foto' id='foto' type='text' class='form-control' placeholder='foto' />
						</div>
						<div class='form-group'>
							<label for='Begindatum'>Begindatum</label>
							<input value='<?php echo $user['Begindatum'] ?>' name='Begindatum' id='Begindatum' type='text' class='form-control' placeholder='Begindatum' />
						</div>
						<div class='form-group'>
							<label for='Einddatum'>Einddatum</label>
							<input value='<?php echo $user['Einddatum'] ?>' name='Einddatum' id='Einddatum' type='text' class='form-control' placeholder='Einddatum' />
						</div>
						<div class='form-group'>
							<label for='Voornaam'>Begintijd</label>
							<input value='<?php echo $user['Begintijd'] ?>' name='Begintijd' id='Begintijd' type='text' class='form-control' placeholder='Begintijd' />
						</div>
						<div class='form-group'>
							<label for='Eindtijd'>Eindtijd</label>
							<input value='<?php echo $user['Eindtijd'] ?>' name='Eindtijd' id='Eindtijd' type='text' class='form-control' placeholder='Eindtijd' />
						</div>
						<div class='form-group'>
							<label for='Naam'>Naam</label>
							<input value='<?php echo $user['Naam'] ?>' name='Naam' id='Naam' type='text' class='form-control' placeholder='Naam' />
						</div>
						<div class='form-group'>
							<label for='Plaatsen'>Plaatsen</label>
							<input value='<?php echo $user['Plaatsen'] ?>' name='Plaatsen' id='Plaatsen' type='text' class='form-control' placeholder='Plaatsen' />
						</div>
						<div class='form-group'>
							<label for='Prijs'>Prijs</label>
							<input value='<?php echo $user['Prijs'] ?>' name='Prijs' id='Prijs' type='text' class='form-control' placeholder='Prijs' />
						</div>
						<div class='form-group'>
							<label for='Beschrijving'>Beschrijving</label>
							<input value='<?php echo $user['Beschrijving'] ?>' name='Beschrijving' id='Beschrijving' type='text' class='form-control' placeholder='Beschrijving' />
						</div>
						<div class='form-group'>
							<label for='EventStraat'>EventStraat</label>
							<input value='<?php echo $user['EventStraat'] ?>' name='EventStraat' id='EventStraat' type='text' class='form-control' placeholder='EventStraat' />
						</div>
						<div class='form-group'>
							<label for='EventHuisnummer'>EventHuisnummer</label>
							<input value='<?php echo $user['EventHuisnummer'] ?>' name='EventHuisnummer' id='EventHuisnummer' type='text' class='form-control' placeholder='EventHuisnummer' />
						</div>
						<div class='form-group'>
							<label for='EventPlaats'>EventPlaats</label>
							<input value='<?php echo $user['EventPlaats'] ?>' name='EventPlaats' id='EventPlaats' type='text' class='form-control' placeholder='EventPlaats' />
						</div>
						<div class='form-group'>
							<label for='EventPostcode'>EventPostcode</label>
							<input value='<?php echo $user['EventPostcode'] ?>' name='EventPostcode' id='EventPostcode' type='text' class='form-control' placeholder='EventPostcode' />
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