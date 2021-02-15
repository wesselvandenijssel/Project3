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
    

<form name='organisator' id='organisator' action='../assets/config/organisator.php' method='post'>
<ul class="form-style-1">
<div class="box">
<h1> organisator paneel </h1>
    <li><label>titel  <span class="required">*</span></label><input type="text" name="field1" class="field-long" placeholder="titel van het event" /> 
    <li>
        <label>begin datum & tijd <span class="required">*</span></label>
        <input type="date" name="field3" class="field-divided" />
        <input type="time" name="field10" class="field-divided" />
    </li>
    
    <li>
        <label>eind datum & tijd <span class="required">*</span></label>
        <input type="date" name="field9" class="field-divided" />
        <input type="time" name="field11" class="field-divided" />
    </li>
    <li>
        <label>aantal tickets/plaatsen <span class=""></span></label>
        <input type="number" name="field4" class="field-long" />
    </li>
    <li><label>straat <span class="required">*</span></label><input type="text" name="field15" class="field-divided" placeholder="straatnaam" /> <input type="text" name="field6" class="field-divided" placeholder="huisnr. + toevoeging" /></li>
    <li><label>postcode <span class="required">*</span></label><input type="text" name="field7" class="field-divided" placeholder="postcode" /> <input type="text" name="field8" class="field-divided" placeholder="plaats" /></li>
    <li><label>naam organisator<span class=""></span></label><input type="text" name="field16" class="field-long" placeholder="naam organisator/kopje" />
    <li><label>Omschrijving <span class="required">*</span></label><input type="text" name="field17" class="field-long" placeholder="Omschrijving over het event" />
    <li><label>Prijs <span class="required">*</span></label><input type="text" name="field14" class="field-long" placeholder="Prijs" />
    <li> <label for="IMG"> Voeg een Afbeelding toe</label><br>
                <input type="file" id="IMG" accept=".png/.pdf" name="field18" class="required">
</li>
    <li>
        <input type="submit" value="Submit" name="submit"/>
    </li>
</ul>
</form>
</div>
</body>
</html>