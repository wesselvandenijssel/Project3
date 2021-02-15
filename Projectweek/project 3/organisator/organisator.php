<?php 



include "admin.php";

?>
<form action="sendadmin.php" method="POST">
<select name="ids">

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


<form action="sendupdate.php" method="POST">
<select name="ids">

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