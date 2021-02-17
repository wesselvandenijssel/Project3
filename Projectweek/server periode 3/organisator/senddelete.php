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

<?php 

include "../assets/config/config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$sql_statement = "DELETE FROM events WHERE nummer = $selection_id";

$result = mysqli_query($con, $sql_statement);

header ("Location: organisator.php");

}
else
 {

 	echo "Er is iets fout gegaan.";

 }

?>