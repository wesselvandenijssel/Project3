<?php
session_start();
include "../assets/config/config.php";
if(isset($_SESSION["User"])){
	$sql = $con->query("SELECT * FROM gebruikers WHERE organisator >= 1 AND Username LIKE '%{$_SESSION['User']}%'");
  if ($sql->num_rows >= 1) {
  }
  else{
	//header("location:../login");
  echo("<script>location.href = '../login/index.php';</script>");
}
}
?>

<?php 

include "../assets/config/config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$result = mysqli_query($con, $sql_statement);

//header ("Location: updateorganisator.php?upd=$selection_id");
echo("<script>location.href = ' updateorganisator.php?upd=$selection_id';</script>");

}
else
 {

 	echo "Er is iets fout gegaan.";

 }

?>