<?php 
session_start();
require_once "controlleruserdata.php"; ?>
<?php 
$Mail = $_SESSION['Mail'];
$password = $_SESSION['password'];
if($Mail != false && $password != false){
    $sql = "SELECT * FROM gebruikers WHERE Mail = '$Mail'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                //header('Location: reset-code.php');
                //exit;
                echo("<script>location.href = 'reset-code.php';</script>");
            }
        }else{
            //header('Location: user-otp.php');
            //exit;
            echo("<script>location.href = 'user-otp.php';</script>");
        }
    }
}else{
    //header('Location: login-user.php');
    //exit;
    //echo("<script>location.href = 'login-user.php';</script>");
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
