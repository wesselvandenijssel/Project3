<?php
session_start();
require '../assets/config/config.php';
$query = "SELECT * FROM `gebruikers`";
$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
?>

<?php
	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'u200514_project3', 'gt1uWKGR', 'u200514_project3');

		$username = $con->real_escape_string($_POST['username']);
		$password = $con->real_escape_string($_POST['password']);

		$sql = $con->query("SELECT nummer, Password FROM gebruikers WHERE Username='$username' LIMIT 1;");
		if ($sql->num_rows > 0) {
		    $data = $sql->fetch_array();
		    if (password_verify($password, $data['Password'])) {           
                $_SESSION['User'] = $_POST['username'];
		      header("location:../index.php");  
          //$msg = "You have been logged IN!";
          exit;
          }
         else {
			      $msg = "Er staat een fout in de inlog!";
        }
    } else {
        $msg = "er geen goede gebruikersnaam ingevoerd!";
    }
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>



    <div class="login-page">

        <div class="form">
            <?php if ($msg != "") echo $msg . "<br><br>"; ?>
            <form class="login-form" method="post" action="index.php">
                <input type="text" class="form-control" name="username" placeholder="username" />
                <input type="password" class="form-control" name="password" placeholder="password" />
                <button name="submit" type="submit">login</button>
                <a href="forgot-password.php">Forgot password?</a>
                <p class="message">Not registered? <a href="../register/register.php">Create an account</a></p>
            </form>
        </div>
    </div>
</body>
<html>