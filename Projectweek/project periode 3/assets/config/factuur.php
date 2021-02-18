<?php
session_start();
if(isset($_SESSION["User"])){
}
else{
	header("location:../login");
}
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
$query = "UPDATE `gebruikers` SET voornaam='$voornaam', achternaam='$achternaam', straat='$straat', huisnummer='$huisnummer', postcode='$postcode', plaats='$plaats', land='$land', telefoonnummer='$telefoonnummer', mail='$mail' WHERE username='{$_SESSION['User']}'";
	$result = mysqli_query($con, $query) or die('Cannot insert data into database. '.mysqli_error($con));
	if($result) {
	  echo 'Data inserted into database.';
	  mysqli_free_result($result);
	  //header('Location:../../index.php');
	}
	if( isset($_GET['upd']) ) {
	$id=$_GET['upd'];
	$query = "UPDATE `events` SET Plaatsen = Plaatsen -1  WHERE nummer='$id'";
	$result = mysqli_query($con, $query) or die('Cannot insert data into database. '.mysqli_error($con));
	 if($result) {
	   echo 'Data inserted into database.';
	   mysqli_free_result($result);
		header('Location:../../index.php');
	 }
	   }
}
?>