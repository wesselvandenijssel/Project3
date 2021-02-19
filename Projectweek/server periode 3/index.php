<?php 
session_start();
require 'assets/config/config.php';
if(isset($_SESSION["User"])){
}
else{
  echo("<script>location.href = 'login/index.php';</script>");
}
$query = "SELECT * FROM `gebruikers`";
$result = mysqli_query($con, $query) or die('Cannot fetch data from database. '.mysqli_error($con));
?>
<!DOCTYPE HTML>
<html>
<head>
<title>event manager </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
<link rel="stylesheet" type="text/css" href="assets/css/style.css" >
</head>
<body>
<div id="doc" class="yui-t1">
  <div id="hd">
    <div id="header">
       <h1 class="name">naam bedrijf<h1>
       <a href="login/index.php" class="button">login</a>
       <a href="register/register.php" class="regbutton">register</a>
    </div>
  </div>
  <div id="bd">
    <div id="">
      <div class="yui-b">
        <div class="content">       <div class="grid-container">
        <?php
require_once('upload/config/connect.php');
$sql_statement = "SELECT * FROM events";
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
?>
  <div class="card">
  <?php if ($Plaatsen >= 1){ ?>
  <a class="link" href= "details/index.php?upd=<?php echo $nummer;?>">
  <div class="card-image"><img src='upload/assets/upload/<?php echo $foto;?>' alt="" style="height:200px; border-radius: 25px; margin: 10px;"/></a></div>
  <div class="card-text">
  <a class="link" href= "details/index.php?upd=<?php echo $nummer;?>">
    <span class="date"><?php echo $Begindatum;?> - </span>   <span class="enddate"><?php echo $Einddatum;?></span>
    <h2 class="title"><?php echo $Naam;?></h2>
    <h3 clas="naam orginasator"><?php echo $Events;?></h3>
     <h3 clas="naam orginasator"><?php echo $EventPlaats;?></h3>
     <?php 
            if ($Plaatsen <= 0){
            ?> <div class="sold-out"> uitverkocht! </div>
            <?php
            }
            else{
            ?>
                <div class="card-text"> beschikbaar! </div>
                <a class="order" href= "details/index.php?upd=<?php echo $nummer;?>"> bestel een ticket </a>
                <?php
            }
            ?>
    <!--<div class="sold-out"> uit verkocht </div>
    <a class="order"> bestel een ticket </a>-->
    </a>
  </div>
</div>
</a>
<?php
}
else{ ?>
  <div class="card-image"><img src='upload/assets/upload/<?php echo $foto;?>' alt="" style="height:200px; border-radius: 25px; margin: 10px;"/></div>
  <div class="card-text">
  <span class="date"><?php echo $Begindatum;?> - </span>   <span class="enddate"><?php echo $Einddatum;?></span>
    <h2 class="title"><?php echo $Naam;?></h2>
    <h3 clas="naam orginasator"><?php echo $Events;?></h3>
     <h3 clas="naam orginasator"><?php echo $EventPlaats;?></h3>
     <?php 
            if ($Plaatsen <= 0){
            ?> <div class="sold-out"> uitverkocht! </div>
            <?php
            }
            else{
            ?>
                <div class="card-text"> beschikbaar! </div>
                <a class="order" href= "details/index.php?upd=<?php echo $nummer;?>"> bestel een ticket </a>
                <?php
            }
            ?>
    <!--<div class="sold-out"> uit verkocht </div>
    <a class="order"> bestel een ticket </a>-->
    </a>
  </div>
</div>
<?php
}}
?>
</body>
</html>
