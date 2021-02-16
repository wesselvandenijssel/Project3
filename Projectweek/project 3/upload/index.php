<?php
require_once('config/connect.php');
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
    <?php
    $result = $conn->query("SELECT foto FROM events;");
    if ($result != false){
    while ($row = $result->fetch_assoc()){
        ?>
        <img src="assets/upload/<?php echo $row['foto'];?>" alt="" style="width:300px;"/>
        <?php
    }
    $result->free();
    }?>
</body>
</html>