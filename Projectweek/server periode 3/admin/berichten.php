<?php
include "../assets/config/config.php";
if(isset($_SESSION["User"])){
	$sql = $con->query("SELECT * FROM gebruikers WHERE Admin >= 1 AND Username LIKE '%{$_SESSION['User']}%'");
  if ($sql->num_rows >= 1) {
  }
  else{
	//header("location:../login");
  //exit;
  echo("<script>location.href = '../login/index.php';</script>");
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

<tr> <th> Nummer </th> <th> Username </th> <th>Password</th> <th>Voornaam</th> <th>Achternaam</th> <th>Straat</th> <th>Huisnummer</th> <th>Plaats</th> <th>Postcode</th> <th>Mail</th> <th>Land</th> <th>Telefoonnummer</th><th>Admin</th><th>Organisator</th><th>Code</th>

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
  $Organisator = $row['organisator'];
  $Code = $row['code'];

	echo "<tr>" . "<th>" . $nummer . "</th>" . "<th>" . $username . "</th>" . "<th>" . $password . "</th>" . "<th>". $Voornaam . "</th>" .  "<th>" . $Achternaam . "</th>" .  "<th>". $Straat . "</th>" . "<th>" . $Huisnummer . "</th>" . "<th>". $Plaats . "</th>" . "<th>". $Postcode . "</th>" . "<th>". $Mail . "</th>" . "<th>". $Land . "</th>" . "<th>". $Telefoonnummer . "</th>" . "<th>" . $Admin . "</th>". "<th>" . $Organisator . "</th>" . "<th>" . $Code . "</th>" . "</tr>";
}

?>
</table>
</div>
</body>
</html>