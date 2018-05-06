<?php
session_start();
require_once('base.php');
?>
<html>
<?php head("Kontakt - Przesyłki 360", ["css/kontakt.css"]); ?>
<body>
<?php menu(); ?>
<div class="container">
    <div class="jumbotron" id="kontakt_jumbotron">
        <center>
            <h1>Kontakt</h1>
        </center>
        <p>Sekretariat - tel: 555 444 333</p>
    </div>
    <div class="well">
        <h2>Godziny pracy:</h2>
        <p>pn - pt: 8:00 - 16:00</p>
    </div>
    <div class="well">
        <h2>Nasze placówki:</h2>
        <p>Kraków - Mickiewicza 123</p>
        <p>Nowy Sącz - Lwowska 43</p>
        <p>Brzesko - Rynek 5</p>
        <p>Tarnów - Jagiellońska 16</p>
        <p>Rzeszów - Wąsowiczów 14a</p>
    </div>
  </div>
</div>
</body>
</html>
