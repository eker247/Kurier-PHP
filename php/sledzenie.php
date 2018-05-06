<?php
session_start();

use entity\ParcelRepository;
use entity\UserRepository;
require_once('base.php');
require_once('entity/ParcelRepository.php');
require_once('entity/UserRepository.php');

if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] != 'yes') {
    header('Location: /php/logowanie.php');
}

if ( $id = $_POST['id'] ?? null ) {
    ParcelRepository::deleteParcel($id);
}
?>
<html>
<?php head("Śledzenie - Przesyłki 360", ["css/kontakt.css"]); ?>
<body>
<?php menu(); ?>
<div class="container">
    <div class="jumbotron" id="kontakt_jumbotron">
        <center>
            <h1>Śledź swoją przesyłkę</h1>
        </center>
        <p>Dowiedz się, gdzie w tym momencie znajduje się twoja przesyłka.</p>
    </div>
  </div>
  <div class="">
      <?php
      $rows = ParcelRepository::getParcels($_SESSION['username']);
      if (is_array($rows)) { ?>
        <table class="table table-stripped table-hover">
            <tr>
                <th>ID</th><th>Odbiorca</th><th>Masa [g]</th><th>Data nadania</th>
                <th>Doręczenie</th><th></th>
            </tr>
      <?php
      print "<form method='post'>";
      foreach ($rows as $row) {
          print "<tr><td>".$row['id']."</td>";
          print "<td>".$row['recipient']."</td>";
          print "<td>".$row['weight']."</td>";
          print "<td>".$row['date']."</td>";
          // date of delivery = date of sending + 2*24*60*60
          $delivery = strtotime($row['date']) + 172800;
          $actualDate = strtotime($_SESSION['datepicker']);
          $toRecive = ($delivery - $actualDate)/86400;
          print "<td>".reciveDate($toRecive)."</td>";
          // print "<input type='hidden' name='sender' value='".$row['sender']."'";
          // print "<input type='hidden' name='id' value='".$row['id']."'";
          print "<td><button type='submit' class='btn btn-info' name='id' value='".$row['id']."'/>Usuń</button></td></tr>";
      }
      print "</form>";
      }?>
  </table>
  </div>
</div>
</body>
</html>

<?php
function reciveDate(int $days) {
    if ( -1 > $days ) {
        return -$days. " dni temu";
    }
    else if ( -1 == $days) {
        return "wczoraj";
    }
    else if ( 0 == $days) {
        return "dzisiaj";
    }
    else if ( 1 == $days) {
        return "jutro";
    }
    return "za $days dni";
}
