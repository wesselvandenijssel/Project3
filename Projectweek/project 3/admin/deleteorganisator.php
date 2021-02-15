<?php 

include "../assets/config/config.php";

if (isset($_POST['idsorganisator'])){

$selection_id = $_POST['idsorganisator'];

$sql_statement = "DELETE FROM events WHERE nummer = $selection_id";

$result = mysqli_query($con, $sql_statement);

header ("Location: admin.php");

}
else
 {

 	echo "Er is iets fout gegaan.";

 }

?>