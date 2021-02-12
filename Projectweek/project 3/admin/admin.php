<?php
session_start();
include "../assets/config/config.php";
if(isset($_SESSION["User"])){
	$sql = $con->query("SELECT * FROM gebruikers WHERE Admin >= 1 AND Username LIKE '%{$_SESSION['User']}%'");
  if ($sql->num_rows >= 1) {
  }
  else{
	header("location:../login");
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