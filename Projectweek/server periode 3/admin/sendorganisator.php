<?php
session_start();
include "../assets/config/config.php";
if(isset($_SESSION["User"])){
	$sql = $con->query("SELECT * FROM gebruikers WHERE Admin >= 1 AND Username LIKE '%{$_SESSION['User']}%'");
  if ($sql->num_rows >= 1) {
  }
  else{
	header("location:../login");
  exit;
}
}
?>
<?php 

include "../assets/config/config.php";

if (isset($_POST['idsorganisator'])){

$selection_id = $_POST['idsorganisator'];

$result = mysqli_query($con, $sql_statement);

header ("Location: updateorganisator.php?upd=$selection_id");
exit;

}
else
 {

 	echo "Er is iets fout gegaan.";

 }

?>