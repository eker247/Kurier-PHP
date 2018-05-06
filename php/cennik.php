<?php
session_start();
require_once('base.php');
?>
<html>
<?php head("Cennik - Przesyłki 360", ["css/kontakt.css"]); ?>
<body>
<?php menu(); ?>
<div class="container">
    <div class="jumbotron" id="kontakt_jumbotron">
        <center>
            <h1>Cennik</h1>
        </center>
        <p>Każda przesyłka ma swoją cenę w zależności od masy.</p>
    </div>
  </div>
  <div class="well">
      <table class="table table-hover">
          <tr><th>Waga [kg]</th><th>Cena [PLN]</th></tr>
          <tr><th>do 0,1</th><th>5</th></tr>
          <tr><th>do 0,5</th><th>7</th></tr>
          <tr><th>do 2</th><th>9</th></tr>
          <tr><th>do 10</th><th>15</th></tr>
          <tr><th>powyżej 10</th><th>25</th></tr>
      </table>

  </div>
</div>
</body>
</html>
