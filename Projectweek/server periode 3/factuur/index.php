<?php 
session_start();
require '../assets/config/config.php';
if(isset($_SESSION["User"])){
}
else{
	//header("location:login");
    //exit;
    echo("<script>location.href = '../login/index.php';</script>");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $id = $_GET['upd'];
    $sql_statement = "SELECT * FROM events WHERE nummer = $id";
    $result = mysqli_query($con, $sql_statement);
    //$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)){
    $Organisatornaam = $row['Organisatornaam'];
    $Events = $row['Events'];
    }
    //var_dump($result);
?>
    <form name='form' id='form' action='../assets/config/factuur.php?upd=<?php echo $id;?>' method='post'>
        <ul class="form-style-1">
            <div class="box">
            <h1> factuur pagina voor <?php echo $Events . ' van ' . $Organisatornaam;?></h1>
                <li><label>volledige naam <span class="required">*</span></label><input required type="text"
                        name="field1" class="field-divided" placeholder="voornaam" /> <input required type="text"
                        name="field2" class="field-divided" placeholder="achternaam" /></li>
                <li>
                    <label>Email <span class="required">*</span></label>
                    <input type="email" name="field3" class="field-long" required />
                </li>
                <li>
                    <label>Telefoonnummer <span class="required">*</span></label>
                    <input type="text" name="field4" class="field-long" required />
                </li>
                <li><label>straat <span class="required">*</span></label><input required type="text" name="field5"
                        class="field-divided" placeholder="straatnaam" /> <input type="text" required name="field6"
                        class="field-divided" placeholder="huisnr. + toevoeging" /></li>
                <li><label>postcode <span class="required">*</span></label><input type="text" name="field7" required
                        class="field-divided" placeholder="postcode" /> <input type="text" name="field8" required
                        class="field-divided" placeholder="plaats" /></li>
                <li>
                    <label>land <span class="required">*</span></label>
                    <select name="field9" class="field-select">
                        <option value="Nederland">Nederland</option>
                        <option value="België">Belgie</option>
                        <option value="Duitsland">Duitsland</option>
                    </select>
                </li>

                <li>
                    <input type="submit" value="Submit" id='submit' name="submit" />
                </li>
        </ul>
    </form>
    </div>
</body>

</html>