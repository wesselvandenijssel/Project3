<?php 

include "../assets/config/config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$sql_statement = "DELETE FROM gebruikers WHERE nummer = $selection_id";

$result = mysqli_query($con, $sql_statement);

header ("Location: admin.php");

}
else
 {

 	echo "Er is iets fout gegaan.";

 }

?>