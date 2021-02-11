<?php
require 'config.php';
	// Plaats hier de code die zorgt voor een verbinding met de database

	if( isset($_POST['submit']) ) {
	// Get POST values
$voornaam = mysqli_real_escape_string($con, trim($_POST['field1']));
$achternaam = mysqli_real_escape_string($con, trim($_POST['field2']));
$straat  = mysqli_real_escape_string($con, trim($_POST['field5']));
$huisnummer = mysqli_real_escape_string($con, trim($_POST['field6']));
$postcode = mysqli_real_escape_string($con, trim($_POST['field7']));
$plaats  = mysqli_real_escape_string($con, trim($_POST['field8']));
$land = mysqli_real_escape_string($con, trim($_POST['field9']));
$telefoonnummer = mysqli_real_escape_string($con, trim($_POST['field4']));
$mail  = mysqli_real_escape_string($con, trim($_POST['field3']));
$query = "INSERT INTO `gebruikers` (`voornaam`, `achternaam`, `plaats`,`straat`,`huisnummer`,`postcode`,`mail`,`telefoonnummer`,`land`) VALUES ('$voornaam','$achternaam','$plaats','$straat','$huisnummer','$postcode','$mail','$telefoonnummer','$land')";
	$result = mysqli_query($con, $query) or die('Cannot insert data into database. '.mysqli_error($con));
	if($result) {
	  echo 'Data inserted into database.';
	  mysqli_free_result($result);
	  header('Location:../../index.php');
	}
}
?>