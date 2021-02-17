<?php 
session_start();
if(isset($_SESSION["User"])){
}
else{
	//header("location:login");
    echo("<script>location.href = 'login/index.php';</script>");
    //exit;
}
require 'assets/config/config.php';
$query = "SELECT * FROM `gebruikers`";
$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
?>

<?php
require_once('upload/config/connect.php');
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='description' content='Basic loginsystem'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>
    <title>Basic Login System</title>
</head>

<body>

    <a href="login/index.php">login</a>
    <a href="logout/logout.php">log out</a>
    <a href="admin/admin.php">Admin</a>
    <a href="upload/admin/upload.php">Upload</a>
    <a href="upload/index.php">Foto's</a>
    <a href="organisator/organisator.php">Organisator admin</a>
    <a href="organisator/index.php">Organisator</a>
    <a href="factuur">factuur</a><br>

    <?php
    $result = $conn->query("SELECT foto FROM events;");
    if ($result != false){
    while ($row = $result->fetch_assoc()){
        ?>
        <img src="upload/assets/upload/<?php echo $row['foto'];?>" alt="" style="width:200px;" />
    <?php
    }
    $result->free();
    }?>

    <?php
	echo "Hallo,".$_SESSION["User"]
	?>

</body>

</html>