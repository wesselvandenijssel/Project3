<?php
session_start();
include "../assets/config/config.php";
if(isset($_SESSION["User"])){
	$sql = $con->query("SELECT * FROM gebruikers WHERE Admin >= 1 AND Username LIKE '%{$_SESSION['User']}%'");
  if ($sql->num_rows >= 1) {
  }
  else{
	//header("location:../login");
  echo("<script>location.href = '../index.php';</script>");
}
}
?>
<?php 



include "berichten.php";

?>

<form action="sendadmin.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT nummer FROM gebruikers";

$myresult = mysqli_query($con, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult))
{
	$nummer = $id_rows['nummer'];
	echo "<option value=$nummer>".$nummer."</option>";
}

?>
</select>

<button>DELETE</button>
</form>


<form action="sendupdate.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT nummer FROM gebruikers";

$myresult = mysqli_query($con, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult))
{
	$nummer = $id_rows['nummer'];
	echo "<option value=$nummer>".$nummer."</option>";
}

?>
</select>

<button>UPDATE</button>
</form>
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
  
  echo "<tr>" .  "<th>". $nummer . "</th>"."<th>". $Organisatornaam . "</th>". "<th>". $Events . "</th>". "<th>". $foto . "</th>". "<th>". $Begindatum . "</th>". "<th>". $Einddatum . "</th>". "<th>". $Begintijd . "</th>". "<th>". $Eindtijd . "</th>". "<th>". $Naam . "</th>". "<th>". $Plaatsen . "</th>". "<th>". $Prijs . "</th>". "<th>". $Beschrijving . "</th>". "<th>". $EventStraat . "</th>". "<th>". $EventHuisnummer . "</th>". "<th>". $EventPlaats . "</th>". "<th>". $EventPostcode . "</th>" . "</tr>";
}
?>
</table>
<form action="deleteorganisator.php" method="POST">
<select name="idsorganisator">

<?php

$sql_command = "SELECT nummer FROM events";

$myresult = mysqli_query($con, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult))
{
	$nummer = $id_rows['nummer'];
	echo "<option value=$nummer>".$nummer."</option>";
}

?>
</select>

<button>DELETE</button>
</form>


<form action="sendorganisator.php" method="POST">
<select name="idsorganisator">

<?php

$sql_command = "SELECT nummer FROM events";

$myresult = mysqli_query($con, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult))
{
	$nummer = $id_rows['nummer'];
	echo "<option value=$nummer>".$nummer."</option>";
}

?>
</select>

<button>UPDATE</button>
</form>

</div>
</body>
</html>