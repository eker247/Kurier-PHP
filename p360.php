<?php
session_start();
require_once('php/base.php');
if (!isset($_SESSION['datepicker'])) {
    $_SESSION['datepicker'] = date('d-m-Y');
}
?>
<html>
<?php head("Przesyłki 360", ["css/homepage.css"]); ?>
<body>
<?php menu(); ?>
<div class="container">
    <div class="jumbotron" id="homepage_jumbotron">
        <center>
            <img id="homepage_img_package1" src="img/paczka_1000x395.png" alt="Paczki" />
            <h1>Przesyłki 360</h1>
        </center>
        <p>Witamy w serwisie Przesyłki 360. Znajdziesz tu informacje na temat
            lokalizacji Twojej paczki, znajdziesz najbliższy punkt firmy,
            a także sprawdzisz nasz cennik.</p>
    </div>
  </div>
</div>
</body>
</html>
