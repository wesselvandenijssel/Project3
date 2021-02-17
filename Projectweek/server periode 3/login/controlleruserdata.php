<?php 
session_start();
require "../assets/config/config.php";
$Mail = "";
$username = "";
$errors = array();

ini_set("SMTP","smtp.gmail.com");
ini_set("sendmail_from","<wesselvandenijsselxampp@gmail.com>@gmail.com>");
//if user signup button
if(isset($_POST['signup'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $Mail = mysqli_real_escape_string($con, $_POST['Mail']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM gebruikers WHERE Mail = '$Mail'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['Mail'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO gebruikers (username, Mail password, code, status)
                        values('$username', '$Mail', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: wesselvandenijsselxampp@gmail.com";
            if(Mail($Mail, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $Mail";
                $_SESSION['info'] = $info;
                $_SESSION['Mail'] = $Mail;
                $_SESSION['password'] = $password;
               // header('location: user-otp.php');
                echo("<script>location.href = 'user-otp.php';</script>");
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM gebruikers WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $Mail = $fetch_data['Mail'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE gebruikers SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['username'] = $username;
                $_SESSION['Mail'] = $Mail;
                //header('location: home.php');
                echo("<script>location.href = 'home.php';</script>");
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $Mail = mysqli_real_escape_string($con, $_POST['Mail']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM gebruikers WHERE Mail = '$Mail'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['Mail'] = $Mail;
                $_SESSION['password'] = $password;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['Mail'] = $Mail;
                    //header('location: home.php');
                    echo("<script>location.href = 'home.php';</script>");
                }else{
                    $info = "It's look like you haven't still verify your email - $Mail";
                    $_SESSION['info'] = $info;
                    //header('location: user-otp.php');
                    echo("<script>location.href = 'user-otp.php';</script>");
                }
            }else{
                $errors['Mail'] = "Incorrect email or password!";
            }
        }else{
            $errors['Mail'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $Mail = mysqli_real_escape_string($con, $_POST['Mail']);
        $check_email = "SELECT * FROM gebruikers WHERE Mail='$Mail'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE gebruikers SET code = $code WHERE Mail = '$Mail'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: wesselvandenijsselxampp@gmail.com";
                if(Mail($Mail, $subject, $message, $sender)){
                    $info = "We've sent a password reset to your Mail - $Mail";
                    $_SESSION['info'] = $info;
                    $_SESSION['Mail'] = $email;
                    //header('location: reset-code.php');
                    echo("<script>location.href = 'reset-code.php';</script>");
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['Mail'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM gebruikers WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $Mail = $fetch_data['Mail'];
            $_SESSION['Mail'] = $Mail;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            //header('location: new-password.php');
            echo("<script>location.href = 'new-password.php';</script>");
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $Mail = $_SESSION['Mail']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE gebruikers SET code = $code, password = '$encpass' WHERE Mail = '$Mail'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                //header('Location: password-changed.php');
                echo("<script>location.href = 'password-changed.php';</script>");
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        //header('Location: login-user.php');
        echo("<script>location.href = 'index.php';</script>");
    }
?>
