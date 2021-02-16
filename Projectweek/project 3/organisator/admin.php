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
<html>
<head>
	<title>Berichten</title>

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

<div align="center">

	<table>

<tr> <th> Nummer </th><th>Organisatornaam</th><th>Events</th><th>foto</th><th>Begindatum</th><th>Einddatum</th><th>Begintijd</th><th>Eindtijd</th><th>Naam</th><th>Plaatsen</th><th>Prijs</th><th>Beschrijving</th><th>EventStraat</th><th>EventHuisnummer</th><th>EventPlaats</th><th>EventPostcode</th></tr>

<?php

include "../assets/config/config.php";

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

	echo "<tr>" . "<th>" . $nummer . "<th>". $Organisatornaam . "</th>". "<th>". $Events . "</th>". "<th>". $foto . "</th>". "<th>". $Begindatum . "</th>". "<th>". $Einddatum . "</th>". "<th>". $Begintijd . "</th>". "<th>". $Eindtijd . "</th>". "<th>". $Naam . "</th>". "<th>". $Plaatsen . "</th>". "<th>". $Prijs . "</th>". "<th>". $Beschrijving . "</th>". "<th>". $EventStraat . "</th>". "<th>". $EventHuisnummer . "</th>". "<th>". $EventPlaats . "</th>". "<th>". $EventPostcode . "</th>" . "</tr>";
}

?>

</table>
</div>

</body>
</html>