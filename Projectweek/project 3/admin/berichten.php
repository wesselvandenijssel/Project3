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

<tr> <th> Nummer </th> <th> Username </th> <th>Password</th> <th>Voornaam</th> <th>Achternaam</th> <th>Straat</th> <th>Huisnummer</th> <th>Plaats</th> <th>Postcode</th> <th>Mail</th> <th>Land</th> <th>Telefoonnummer</th><th>Admin</th><th>Organisatornaam</th><th>Events</th><th>foto</th><th>Begindatum</th><th>Einddatum</th><th>Begintijd</th><th>Eindtijd</th><th>Naam</th><th>Plaatsen</th><th>Prijs</th><th>Beschrijving</th><th>EventStraat</th><th>EventHuisnummer</th><th>EventPlaats</th><th>EventPostcode</th></tr>

<?php

include "../assets/config/config.php";

$sql_statement = "SELECT * FROM gebruikers";

$result = mysqli_query($con, $sql_statement);

while($row = mysqli_fetch_assoc($result)){
  $nummer = $row['Nummer'];
  $username = $row['Username'];
  $password = $row['Password'];
  $Voornaam = $row['Voornaam'];
  $Achternaam = $row['Achternaam'];
  $Straat = $row['Straat'];
  $Huisnummer = $row['Huisnummer'];
  $Plaats = $row['Plaats'];
  $Postcode = $row['Postcode'];
  $Mail = $row['Mail'];
  $Land = $row['Land'];
  $Telefoonnummer = $row['Telefoonnummer'];
  $Admin = $row['Admin'];
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

	echo "<tr>" . "<th>" . $nummer . "</th>" . "<th>" . $username . "</th>" . "<th>" . $password . "</th>" . "<th>". $Voornaam . "</th>" .  "<th>" . $Achternaam . "</th>" .  "<th>". $Straat . "</th>" . "<th>" . $Huisnummer . "</th>" . "<th>". $Plaats . "</th>" . "<th>". $Postcode . "</th>" . "<th>". $Mail . "</th>" . "<th>". $Land . "</th>" . "<th>". $Telefoonnummer. "<th>". $Admin . "</th>". "<th>". $Organisatornaam . "</th>". "<th>". $Events . "</th>". "<th>". $foto . "</th>". "<th>". $Begindatum . "</th>". "<th>". $Einddatum . "</th>". "<th>". $Begintijd . "</th>". "<th>". $Eindtijd . "</th>". "<th>". $Naam . "</th>". "<th>". $Plaatsen . "</th>". "<th>". $Prijs . "</th>". "<th>". $Beschrijving . "</th>". "<th>". $EventStraat . "</th>". "<th>". $EventHuisnummer . "</th>". "<th>". $EventPlaats . "</th>". "<th>". $EventPostcode . "</th>" . "</tr>";
}

?>

</table>
</div>

</body>
</html>