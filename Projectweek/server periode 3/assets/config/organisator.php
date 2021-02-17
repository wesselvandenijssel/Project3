<?php
session_start();
//if(isset($_SESSION["User"])){
//}
//else{
	//header("location:../login");
//}

require_once('../../upload/config/connect.php');
if (isset($_FILES['image'])) {
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    
    $extensions= array("jpeg","jpg","png");
    
    if (in_array($file_ext,$extensions)=== false) {
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		echo 'Deze bestandstypes zijn niet toegestaan!';
    }
    
    // if($file_size > 2097152){
    //    $errors[]='File size must be excately 2 MB';
    // }
    
    if (empty($errors) == true) {
        //upload for the file.
        move_uploaded_file($file_tmp,$_SERVER['DOCUMENT_ROOT']."/upload/assets/upload/".$file_name);

        // Formuleer query
        //$sql = "INSERT INTO `events` (`foto`) VALUES ('{$file_name}')";
        // Poging uitvoeren query
        //if ($conn->query($sql) === TRUE) {
            // Uitvoeren query gelukt
           // echo "Nieuwe profielfoto succesvol toegevoegd aan tabel 'foto'.";
        //} else {
            // Uitvoeren query mislukt
            //echo "Error: " . $sql . "<br>" . $conn->error;
			require 'config.php';
			$Organisatornaam = mysqli_real_escape_string($con, trim($_POST['field16']));
	$Events = mysqli_real_escape_string($con, trim($_POST['field1']));
	//$foto  = mysqli_real_escape_string($con, trim($_POST['field18']));
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
	$query = "INSERT INTO `events` (`Organisatornaam`, `Events`, `foto`, `Begindatum`, `Einddatum`, `Begintijd`, `Eindtijd`, `Naam`, `Plaatsen`, `Prijs`, `Beschrijving`, `EventStraat`, `EventHuisnummer`, `EventPlaats`, `EventPostcode`) VALUES ('$Organisatornaam','$Events','{$file_name}','$Begindatum','$Einddatum','$Begintijd','$Eindtijd','$Naam','$Plaatsen','$Prijs','$Beschrijving','$EventStraat','$EventHuisnummer','$EventPlaats','$EventPostcode')";
	$result = mysqli_query($con, $query) or die('Cannot insert data into database. '.mysqli_error($con));
	if($result) {
	  echo 'Data inserted into database.';
	  mysqli_free_result($result);
	  //header('Location:../../index.php');
      echo("<script>location.href = '../../index.php';</script>");
	}
        }
        // Afsluiten verbinding
        $conn->close();

     //else {
        //print_r($errors);
    //}

	
	

}




?>