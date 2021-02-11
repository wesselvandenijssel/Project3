<?php
require_once('../config/connect.php');
if (isset($_FILES['image'])) {
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    
    $extensions= array("jpeg","jpg","png");
    
    if (in_array($file_ext,$extensions)=== false) {
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    // if($file_size > 2097152){
    //    $errors[]='File size must be excately 2 MB';
    // }
    
    if (empty($errors) == true) {
        //upload for the file.
        move_uploaded_file($file_tmp,$_SERVER['DOCUMENT_ROOT']."/project periode 3/upload/assets/upload/".$file_name);

        // Formuleer query
        $sql = "INSERT INTO `gebruikers` (`foto`) VALUES ('{$file_name}')";
        // Poging uitvoeren query
        if ($conn->query($sql) === TRUE) {
            // Uitvoeren query gelukt
            echo "Nieuwe profielfoto succesvol toegevoegd aan tabel 'foto'.";
        } else {
            // Uitvoeren query mislukt
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        // Afsluiten verbinding
        $conn->close();

    } else {
        print_r($errors);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="profielfoto">
        <input type="submit" value="Verzenden">
    </form>
</body>
</html>