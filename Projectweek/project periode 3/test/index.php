<?php 
session_start();
require 'assets/config/config.php';
if(isset($_SESSION["User"])){
}
else{
	header("location:login");
}
$query = "SELECT * FROM `gebruikers`";
$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
?>

<?php
require_once('upload/config/connect.php');
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='description' content='Basic loginsystem'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>
    <title>Basic Login System</title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: lightblue;
}
</style>
</head>

<body>

    <a href="login/index.php">login</a>
    <a href="logout/logout.php">log out</a>
    <a href="admin/admin.php">Admin</a>
    <a href="upload/admin/upload.php">Upload</a>
    <a href="upload/index.php">Foto's</a>
    <a href="organisator/organisator.php">Organisator admin</a>
    <a href="organisator/index.php">Organisator</a>
    <a href="factuur">factuur</a><br>

    
    <div>
<table>
<th>Nummer</th><th>Organisatornaam</th><th>Events</th><th>foto</th><th>Begindatum</th><th>Einddatum</th><th>Begintijd</th><th>Eindtijd</th><th>Naam</th><th>Plaatsen</th><th>Prijs</th><th>Beschrijving</th><th>EventStraat</th><th>EventHuisnummer</th><th>EventPlaats</th><th>EventPostcode</th></tr>

<?php
$sql_statement = "SELECT * FROM events";
$result = mysqli_query($con, $sql_statement);
while($row = mysqli_fetch_assoc($result)){
  $nummer = $row['nummer'];
  $Organisatornaam = $row['Organisatornaam'];
  $Events = $row['Events'];
  $foto = $row['foto'];
  $Begindatum = $row['Begindatum'];
  $Einddatum = $row['Einddatum'];
  $Begintijd = $row['Begintijd'];
  $Eindtijd = $row['Eindtijd'];
  $Naam = $row['Naam'];
  $Plaatsen = $row['Plaatsen'];
  $Prijs = $row['Prijs'];
  $Beschrijving = $row['Beschrijving'];
  $EventStraat = $row['EventStraat'];
  $EventHuisnummer = $row['EventHuisnummer'];
  $EventPlaats = $row['EventPlaats'];
  $EventPostcode = $row['EventPostcode'];
  
  echo "<tr>" .  "<th>". $nummer . "</th>"."<th>". $Organisatornaam . "</th>". "<th>". $Events . "</th>". "<th>"?><a href= "details/index.php?upd=<?php echo $nummer;?>"> <img src='upload/assets/upload/<?php echo $foto;?>' alt="" style="height:300px;"/></a> <?php echo "" . "</th>". "<th>". $Begindatum . "</th>". "<th>". $Einddatum . "</th>". "<th>". $Begintijd . "</th>". "<th>". $Eindtijd . "</th>". "<th>". $Naam . "</th>". "<th>". $Plaatsen . "</th>". "<th>". $Prijs . "</th>". "<th>". $Beschrijving . "</th>". "<th>". $EventStraat . "</th>". "<th>". $EventHuisnummer . "</th>". "<th>". $EventPlaats . "</th>". "<th>". $EventPostcode . "</th>" . "</tr>";
}
?>
</table>

    <?php
	echo "Hallo,".$_SESSION["User"]
	?>

</body>

</html>