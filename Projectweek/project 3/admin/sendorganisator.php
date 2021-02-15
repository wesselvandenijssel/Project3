<?php 

include "../assets/config/config.php";

if (isset($_POST['idsorganisator'])){

$selection_id = $_POST['idsorganisator'];

$result = mysqli_query($con, $sql_statement);

header ("Location: updateorganisator.php?upd=$selection_id");

}
else
 {

 	echo "Er is iets fout gegaan.";

 }

?>