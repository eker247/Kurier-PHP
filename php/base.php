<?php
// use entity\Repository;
// require_once('entity/Repository.php');

function head($title, $styles)
{
 ?>
    <head>
        <meta charset="utf-8" />
        <title><?=$title?></title>
        <?php
        foreach ($styles as $item) {
            print "<link rel='stylesheet' href=$item />";
        }
         ?>
        <link rel="stylesheet" href="../css/base.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<?php
}

function menu()
{?>
    <div id="menu">
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="/">Przesyłki 360</a>
            </div>
            <ul class="nav navbar-nav">
              <!-- <li class="active"><a href="php/kontakt.php">Home</a></li> -->
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Przesyłki
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/php/nadawanie.php">Nadaj przesyłkę</a></li>
                  <li><a href="/php/sledzenie.php">Śledź przesyłkę</a></li>
                  <li><a href="/php/cennik.php">Cennik</a></li>
                </ul>
              </li>
              <li><a href="/php/kontakt.php">Kontakt</a></li>
              <li><a href="/php/onas.php">O nas</a></li>

              <?php
              $data = $_SESSION['datepicker'] ?? date('d-m-Y');
              ?>
              <li><a href="/php/data.php"><?php print $data; ?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 'yes') {
                    $username = $_SESSION['username'];
                    print "<li><a href='/php/wyloguj.php'>Wyloguj ($username)</a></li>";
                }
                else {
                    print '<li><a href="/php/logowanie.php">Zaloguj</a></li>';
                }?>
            </ul>
          </div>
        </nav>
    </div>
    <?php
}
