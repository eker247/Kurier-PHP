<?php
session_start();
require_once('base.php');
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] != 'yes') {
    header('Location: /php/logowanie.php');
}

if (($date = $_POST['datepicker'] ?? null) && strlen($date) > 7) {
    $_SESSION['datepicker'] = $date;
}

?>
<html>
<?php head("Data - Przesyłki 360", ["css/kontakt.css"]); ?>
<body>
<?php menu(); ?>
<div class="container">
    <div class="jumbotron" id="kontakt_jumbotron">
        <center>
            <h1>Ustaw bieżącą datę.</h1>
        </center>
        <p>Dzięki temu symulatorowi można dowiedzieć się jaki był lub będzie stan przesyłki w danym dniu.</p>
    </div>
    <form method="post">
        <p>Date: <input type="text" id="datepicker" name="datepicker"></p>
        <input type="submit" value="Ustaw datę" />
    </form>
  </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  $( "#datepicker" ).datepicker({ dateFormat:'dd-mm-yy' });
} );
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
</html>
