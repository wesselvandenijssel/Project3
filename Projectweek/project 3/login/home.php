<?php require_once "controllerUserData.php"; ?>
<?php 
$mail = $_SESSION['mail'];
$password = $_SESSION['password'];
if($mail != false && $password != false){
    $sql = "SELECT * FROM gebruikers WHERE mail = '$mail'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title><?php echo $fetch_info['username'] ?> | Home</title> -->
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">Brand name</a>
    <button type="button" class="btn btn-light">
      <!-- <a href="logout-user.php">Logout</a> -->
      </button>
    </nav>
    <h2>Welcome <?php echo $fetch_info['username'] ?></h2>
</body>
</html>
