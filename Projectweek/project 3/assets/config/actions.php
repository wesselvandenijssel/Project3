<?php
require 'config.php';
	// Plaats hier de code die zorgt voor een verbinding met de database

	if( isset($_POST['submit']) ) {
	// Get POST values
$mail = mysqli_real_escape_string($con, trim($_POST['mail']));
$username = mysqli_real_escape_string($con, trim($_POST['username']));
$password  = mysqli_real_escape_string($con, trim($_POST['password']));
// Get current datetime
$dt = new DateTime(null, new DateTimeZone('Europe/Amsterdam'));
$datetime = $dt->format('d-m-Y H:i:s');
// Keep track of validated values
$valid = array('mail'=>false, 'username'=>false, 'password'=>false);
// Validate mail
if( !empty($mail) ) {
 if( filter_var($mail, FILTER_VALIDATE_EMAIL) ) {
   $valid['mail'] = true;
   echo 'E-mail is OK!<br/>';
 }else{
   echo 'E-mail is invalid!<br/>';
 }
}else{
 echo 'E-mail cannot be blank!<br/>';
}
// Validate username
if( !empty($username) ) {
  $sql = $con->query("SELECT nummer, username FROM gebruikers WHERE Username='$username'");
  if ($sql->num_rows > 0) {
    echo "Er is een dubbele gebruikersnaam<br>";
  }
elseif( strlen($username) >= 2 && strlen($username) <= 16 ) {
   if( !preg_match('/[^a-zA-Z\d_.]/', $username) ) {
     $valid['username'] = true;
     
     echo 'Username is OK! <br/>';
   }else{
     echo 'Username can contain only letters!<br/>';
   }
 }else{
   echo 'Username must be between 2 and 16 characters long!<br/>';
 }
}else{
 echo 'Username cannot be blank!<br/>';
}
// Validate password
if( !empty($password) ) {
 if( strlen($password) >= 5 && strlen($password) <= 32 ) {
   $valid['password'] = true;
   $password = password_hash($password, PASSWORD_DEFAULT);
   echo 'Password is OK!<br/>';
 }else{
   echo 'Password must be between 5 and 32 characters!<br/>';
 }
}else{
 echo 'Password cannot be blank!<br/>';
}
if($valid['mail'] && $valid['username'] && $valid['password']) {
	$query = "INSERT INTO `gebruikers` (`username`, `password`, `mail`) VALUES ('$username','$password','$mail')";
	$result = mysqli_query($con, $query) or die('Cannot insert data into database. '.mysqli_error($con));
	if($result) {
	  echo 'Data inserted into database.';
	  mysqli_free_result($result);
	  header('Location:../../index.php');
	}
   }	 
}  
// Check if update-form is submitted
if( isset($_POST['upd']) ) {
	$nummer = $_POST['id'];
	$Voornaam = $_POST['Voornaam'];
	$Achternaam  = $_POST['Achternaam'];
	$Mail     = $_POST['Mail'];
	$Username  = $_POST['Username'];
  	$Straat = $_POST['Straat'];
  	$Huisnummer = $_POST['Huisnummer'];
  	$Plaats = $_POST['Plaats'];
  	$Postcode = $_POST['Postcode'];
    $Land = $_POST['Land'];
  	$Telefoonnummer = $_POST['Telefoonnummer'];
  	$Admin = $_POST['Admin'];
  	$Organisatornaam = $_POST['Organisatornaam'];
  	$Events = $_POST['Events'];
  	$foto = $_POST['foto'];
  	$Begindatum = $_POST['Begindatum'];
  	$Einddatum = $_POST['Einddatum'];
  	$Begintijd = $_POST['Begintijd'];
  	$Eindtijd = $_POST['Eindtijd'];
  	$Naam = $_POST['Naam'];
  	$Plaatsen = $_POST['Plaatsen'];
  	$Prijs = $_POST['Prijs'];
  	$Beschrijving = $_POST['Beschrijving'];
  	$EventStraat = $_POST['EventStraat'];
  	$EventHuisnummer = $_POST['EventHuisnummer'];
  	$EventPlaats = $_POST['EventPlaats'];
  	$EventPostcode = $_POST['EventPostcode'];

	$query = "UPDATE `gebruikers` SET voornaam='$Voornaam', achternaam='$Achternaam', straat='$Straat', huisnummer='$Huisnummer', postcode='$Postcode', plaats='$Plaats', land='$Land', telefoonnummer='$Telefoonnummer', mail='$Mail', admin='$Admin', Organisatornaam='$Organisatornaam', Events='$Events', foto='$foto', Begindatum='$Begindatum', Einddatum='$Einddatum', Begintijd='$Begintijd', Eindtijd='$Eindtijd', Naam='$Naam', Plaatsen='$Plaatsen', Prijs='$Prijs', Beschrijving='$Beschrijving', EventStraat='$EventStraat', EventHuisnummer='$EventHuisnummer', EventPlaats='$EventPlaats', EventPostcode='$EventPostcode', mail='$Mail', Username='$Username' WHERE Nummer='$nummer'";
	$result = mysqli_query($con, $query) or die('Cannot update data in database. '.mysqli_error($con));
	$user   = mysqli_fetch_assoc($result);
	if($result) header('Location:../../admin/admin.php');
}
   }
   if( isset($_POST['updorganisator']) ) {
	$nummer = $_POST['id'];
	$Voornaam = $_POST['Voornaam'];
	$Achternaam  = $_POST['Achternaam'];
	$Mail     = $_POST['Mail'];
	$Username  = $_POST['Username'];
  	$Straat = $_POST['Straat'];
  	$Huisnummer = $_POST['Huisnummer'];
  	$Plaats = $_POST['Plaats'];
  	$Postcode = $_POST['Postcode'];
    $Land = $_POST['Land'];
  	$Telefoonnummer = $_POST['Telefoonnummer'];
  	$Admin = $_POST['Admin'];
  	$Organisatornaam = $_POST['Organisatornaam'];
  	$Events = $_POST['Events'];
  	$foto = $_POST['foto'];
  	$Begindatum = $_POST['Begindatum'];
  	$Einddatum = $_POST['Einddatum'];
  	$Begintijd = $_POST['Begintijd'];
  	$Eindtijd = $_POST['Eindtijd'];
  	$Naam = $_POST['Naam'];
  	$Plaatsen = $_POST['Plaatsen'];
  	$Prijs = $_POST['Prijs'];
  	$Beschrijving = $_POST['Beschrijving'];
  	$EventStraat = $_POST['EventStraat'];
  	$EventHuisnummer = $_POST['EventHuisnummer'];
  	$EventPlaats = $_POST['EventPlaats'];
  	$EventPostcode = $_POST['EventPostcode'];

	$query = "UPDATE `events` SET Organisatornaam='$Organisatornaam', Events='$Events', foto='$foto', Begindatum='$Begindatum', Einddatum='$Einddatum', Begintijd='$Begintijd', Eindtijd='$Eindtijd', Naam='$Naam', Plaatsen='$Plaatsen', Prijs='$Prijs', Beschrijving='$Beschrijving', EventStraat='$EventStraat', EventHuisnummer='$EventHuisnummer', EventPlaats='$EventPlaats', EventPostcode='$EventPostcode', mail='$Mail', Username='$Username' WHERE Nummer='$nummer'";
	$result = mysqli_query($con, $query) or die('Cannot update data in database. '.mysqli_error($con));
	$user   = mysqli_fetch_assoc($result);
	if($result) header('Location:../../admin/admin.php');
	
   }

	// Plaats hier de code die checkt of het sign-up formulier verzonden werd (submit). Nieuwe gebruiker aanmaken dus!
	
	// Plaats hier de code die checkt of er een DELETE moet plaatsvinden (verwijdering van gebruiker in de database)

	// Plaats hier de code die checkt of het update formulier verzonden werd (submit). Bestaande gebruiker updaten dus!
?>