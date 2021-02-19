<?php 
session_start();
require '../assets/config/config.php';
if(isset($_SESSION["User"])){
}
else{
    echo("<script>location.href = '../login/index.php';</script>");
}
$query = "SELECT * FROM `gebruikers`";
$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
$id = $_GET['upd'];
$sql_statement = "SELECT * FROM events WHERE nummer = $id";
$result = mysqli_query($con, $sql_statement);
while($row = mysqli_fetch_assoc($result)){
  $nummer = $row['nummer'];
  $Organisatornaam = $row['Organisatornaam'];
  $Events = $row['Events'];
  $foto = $row['foto'];
  $Begindatum = $row['Begindatum'];
  $Einddatum = $row['Einddatum'];
  $Begintijd = $row['Begintijd'];
  $Eindtijd = $row['Eindtijd'];
  $Naam = $row['Naam'];
  $Plaatsen = $row['Plaatsen'];
  $Prijs = $row['Prijs'];
  $Beschrijving = $row['Beschrijving'];
  $EventStraat = $row['EventStraat'];
  $EventHuisnummer = $row['EventHuisnummer'];
  $EventPlaats = $row['EventPlaats'];
  $EventPostcode = $row['EventPostcode'];
  //$query = "SELECT Plaatsen FROM `events` WHERE nummer = $id";
}
  ?>
    <div class="container">
        <div class="Detail">
            <h1>Detail view</h1>
        </div>
        <div class="title">
            <p><?php echo $Events;?></p>
        </div> 
        <div class="img">
        <img src='../upload/assets/upload/<?php echo $foto;?>' alt="" height='300px';/></a>
            <p></p>
        </div>
        <div class="row">
            <div class="column">
                <p>Van <?php echo $Begindatum . '<br>' .$Begintijd;?></p>
                <p>Tot <?php echo $Einddatum . '<br>' .$Eindtijd;?></p>
            </div>
            <div class="column">
                <p><?php echo $EventPostcode . " " . $EventPlaats;?></p>
                <p><?php echo $EventStraat . " " . $EventHuisnummer;?></p>
            </div>
            <div class="column">
                <p>Aantal plaatsen beschikbaar: <?php echo $Plaatsen?></p>
                <?php 
            if ($Plaatsen < 20){
            ?> <p style="color: red;">Wees er snel bij!</p>
            <?php
            }
            ?>
            </div>
        </div> <br>
        <div class="row2">
            <div class="column2">
                <p><?php echo $Naam;?></p>
            </div>
        </div>
        <div class="beschrijving">
            <p><?php echo $Beschrijving;?></p>
        </div> <br>
        <div id="googleMap" style="width: 600px; height:400px; text-align: center; border: 1px solid rgb(0, 0, 0); margin: auto;">
            <script>
                function myMap() {
                    var mapProp = {
                        center: new google.maps.LatLng(51.508742, -0.120850),
                        zoom: 15,
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                }
            </script>
        </div>
        <div class="row2">
            <div class="column2">
                <p><?php echo $Prijs;?> </p>
            </div>
            <div class="button">
            <?php 
            if ($Plaatsen <= 0){
            ?> <p style="color: red;"><a  href="../index.php" type="button" value="Bestellen" placeholder="Bestellen">Uitverkocht!</a></p>
            <?php 
            }
            else{
            ?> 
                <a  href="../factuur/index.php?upd=<?php echo $id?>" type="button" value="Bestellen" placeholder="Bestellen">Bestellen</a>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAH-HtU-bdeRzEZUh8hNiFYYZuvaO8GUGk&callback=myMap"></script>

</html>