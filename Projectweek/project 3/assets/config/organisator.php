<?php
session_start();
//if(isset($_SESSION["User"])){
//}
//else{
	//header("location:../login");
//}
require 'config.php';
	// Plaats hier de code die zorgt voor een verbinding met de database

	// Get POST values
$Organisatornaam = mysqli_real_escape_string($con, trim($_POST['field16']));
$Events = mysqli_real_escape_string($con, trim($_POST['field1']));
$foto  = mysqli_real_escape_string($con, trim($_POST['field18']));
$Begindatum = mysqli_real_escape_string($con, trim($_POST['field3']));
$Einddatum = mysqli_real_escape_string($con, trim($_POST['field9']));
$Begintijd  = mysqli_real_escape_string($con, trim($_POST['field10']));
$Eindtijd = mysqli_real_escape_string($con, trim($_POST['field11']));
$Naam = mysqli_real_escape_string($con, trim($_POST['field16']));
$Plaatsen  = mysqli_real_escape_string($con, trim($_POST['field4']));
$Prijs  = mysqli_real_escape_string($con, trim($_POST['field14']));
$Beschrijving  = mysqli_real_escape_string($con, trim($_POST['field17']));
$EventStraat  = mysqli_real_escape_string($con, trim($_POST['field15']));
$EventHuisnummer  = mysqli_real_escape_string($con, trim($_POST['field6']));
$EventPlaats  = mysqli_real_escape_string($con, trim($_POST['field8']));
$EventPostcode  = mysqli_real_escape_string($con, trim($_POST['field7']));
$query = "INSERT INTO `events` (`Organisatornaam`, `Events`, `Begindatum`, `Einddatum`, `Begintijd`, `Eindtijd`, `Naam`, `Plaatsen`, `Prijs`, `Beschrijving`, `EventStraat`, `EventHuisnummer`, `EventPlaats`, `EventPostcode`) VALUES ('$Organisatornaam','$Events','$Begindatum','$Einddatum','$Begintijd','$Eindtijd','$Naam','$Plaatsen','$Prijs','$Beschrijving','$EventStraat','$EventHuisnummer','$EventPlaats','$EventPostcode')";
	$result = mysqli_query($con, $query) or die('Cannot insert data into database. '.mysqli_error($con));
	if($result) {
	  echo 'Data inserted into database.';
	  mysqli_free_result($result);
	  //header('Location:../index.php');
	}

?>