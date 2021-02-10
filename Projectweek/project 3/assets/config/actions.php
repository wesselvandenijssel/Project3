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
 if( strlen($username) >= 2 && strlen($username) <= 16 ) {
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
// Check if DELETE is requested
if( isset($_GET['del']) ) {
	$id = $_GET['del'];
	$query = "DELETE FROM `gebruikers` WHERE id=$id";
	$result = mysqli_query($con, $query) or die('Cannot delete data from database. '.mysqli_error($con));
	if($result) {
	  echo 'Data deleted from database.';
	  mysqli_free_result($result);
	  header('Location:../../index.php');
	}
   }
// Check if update-form is submitted
if( isset($_POST['btnupdate']) ) {
 $id = $_GET['id'];
 $mail     = $_POST['mail'];
 $username  = $_POST['username'];
 $password  = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost"=>6]);
 $query  = "UPDATE `gebruikers` SET mail='$mail', username='$username', password='$password' WHERE id=$id";
 $result = mysqli_query($con, $query) or die('Cannot update data in database. '.mysqli_error($con));
 $user   = mysqli_fetch_assoc($result);
 if($result) header('Location:../../index.php');
}
}
	// Plaats hier de code die checkt of het sign-up formulier verzonden werd (submit). Nieuwe gebruiker aanmaken dus!
	
	// Plaats hier de code die checkt of er een DELETE moet plaatsvinden (verwijdering van gebruiker in de database)

	// Plaats hier de code die checkt of het update formulier verzonden werd (submit). Bestaande gebruiker updaten dus!
?>