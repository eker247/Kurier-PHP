<?php
session_start();

use entity\Parcel;
use entity\UserRepository;
use entity\ParcelRepository;
require_once('base.php');
require_once('entity/Parcel.php');
require_once('entity/UserRepository.php');
require_once('entity/ParcelRepository.php');
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] != 'yes') {
    header('Location: /php/logowanie.php');
}

// var_dump(strtotime($_SESSION['datepicker']));
// var_dump(UserRepository::getAddress($_SESSION['username']));
// ParcelRepository::getUser();
if ( ($recipient = $_POST['recipient'] ?? null) && ($weight = $_POST['weight'] ?? null)) {
    $parcel = new Parcel(
        UserRepository::getAddress($_SESSION['username']),
        htmlspecialchars($_POST['recipient']),
        htmlspecialchars($_POST['weight']),
        $_SESSION['datepicker']);
    ParcelRepository::saveParcel($parcel);
}

?>
<html>
<?php head("Nadawanie - Przesyłki 360", ["css/kontakt.css"]); ?>
<body>
<?php menu(); ?>
<div class="container">
    <div class="jumbotron" id="kontakt_jumbotron">
        <center>
            <h1>Nadaj przesyłkę</h1>
        </center>
        <p>Przesyłka na koniec świata w 2 dni.</p>
    </div>
  </div>
</div>
<div class="container">
    <div class="form">
        <form method="post">
            <div class="form-group">
                <label for="recipient">Odbiorca:</label>
                <input style="width: 300px;"type="text" name="recipient" id="recipient" placeholder="Miasto, ulica, nr budynku..." />
            </div>
            <div class="form-group">
                <label for="weight">Masa[g]: </label>
                <input style="width: 300px;" type="number" name="weight" id="weight" min="0" max="30000" placeholder="Waga przesyłki w g..." />
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" name="send" value="Wyślij">
            </div>

        </form>
    </div>
</div>
</body>
</html>
