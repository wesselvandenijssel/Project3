<?php
session_start();
include "../assets/config/config.php";
if(isset($_SESSION["User"])){
	$sql = $con->query("SELECT * FROM gebruikers WHERE organisator >= 1 AND Username LIKE '%{$_SESSION['User']}%'");
  if ($sql->num_rows >= 1) {
  }
  else{
	header("location:../login");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<form name='organisator' id='organisator' action='../assets/config/organisator.php' method='post' enctype=multipart/form-data>
<ul class="form-style-1">
<div class="box">
<h1> organisator paneel </h1>
    <li><label>titel  <span class="required">*</span></label><input type="text" name="field1" class="field-long" placeholder="titel van het event" required/> 
    <li>
        <label>begin datum & tijd <span class="required">*</span></label>
        <input type="date" name="field3" class="field-divided" required/>
        <input type="time" name="field10" class="field-divided" required/>
    </li>
    
    <li>
        <label>eind datum & tijd <span class="required">*</span></label>
        <input type="date" name="field9" class="field-divided" required/>
        <input type="time" name="field11" class="field-divided" required/>
    </li>
    <li>
        <label>aantal tickets/plaatsen <span class=""></span></label>
        <input type="number" name="field4" class="field-long" required/>
    </li>
    <li><label>straat <span class="required">*</span></label><input type="text" name="field15" class="field-divided" placeholder="straatnaam" required/> <input type="text" name="field6" class="field-divided" placeholder="huisnr. + toevoeging" required/></li>
    <li><label>postcode <span class="required">*</span></label><input type="text" name="field7" class="field-divided" placeholder="postcode" required/> <input type="text" name="field8" class="field-divided" placeholder="plaats" required/></li>
    <li><label>naam organisator<span class=""></span></label><input type="text" name="field16" class="field-long" placeholder="naam organisator/kopje" required/>
    <li><label>Omschrijving <span class="required">*</span></label><input type="text" name="field17" class="field-long" placeholder="Omschrijving over het event" required/>
    <li><label>Prijs <span class="required">*</span></label><input type="text" name="field14" class="field-long" placeholder="Prijs" required/>
    <li> <label for="IMG"> Voeg een Afbeelding toe</label><br>
         <input type="file" id="image" name="image" accept="image/jpeg, image/png" class="required" required>
</li>
    <li>
        <input type="submit" value="Submit" name="submit"/>
    </li>
</ul>
</form>
</div>
</body>
</html>