<?php 

include "../assets/config/config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$result = mysqli_query($con, $sql_statement);

header ("Location: update.php?upd=$selection_id");

}
else
 {

 	echo "Er is iets fout gegaan.";

 }

?>