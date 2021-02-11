<?php 
session_start();
if(isset($_SESSION["User"])){
  header("location:../index.php");
}

require '../assets/config/config.php';
$query = "SELECT * FROM `gebruikers`";
$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regstyle.css">
    <title>Document</title>
</head>
<body>
    


<div class="login-page">
  <div class="form">
    <form class="login-form" name='signup' id='signup' action='../assets/config/actions.php' method='post'>
      <input type="text" placeholder="username" name='username' id='username' class='form-control'  onfocus='this.removeAttribute("readonly");' readonly required />
      <input type="email" placeholder="email" name='mail' id='mail' class='form-control' required/>
      <input type="password" placeholder="password" name='password' id='password' class='form-control' onfocus='this.removeAttribute("readonly");' readonly required/>
      <button name='submit' id='submit'>Register</button>
      <p class="message">Already registered? <a href="../login/index.php">Login</a></p>
    </form>
  </div>
</div>
</body> 
<html>