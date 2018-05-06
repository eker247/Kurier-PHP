<?php
session_start();
use entity\UserRepository;
use entity\User;
require_once('base.php');
require_once('entity/User.php');
require_once('entity/UserRepository.php');

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 'yes') {
    // var_dump($_SESSION['isLoggedIn']);
    header("Location: /");
}
$user = null;
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = UserRepository::getUser($_POST['username'], $_POST['password']);
    // var_dump($user);
}
if ($user) {
    $_SESSION['isLoggedIn'] = "yes";
    $_SESSION['username'] = $user->getUserName();
}
?>
<html>
<?php head("Logowanie - Przesyłki 360", ["css/kontakt.css"]); ?>
<body>
<?php menu();?>
<div class="container">
  <h2>Logowanie</h2>
  <form class="form-inline" method="post" action="/php/logowanie.php">
    <div class="form-group">
      <label for="username">Użytkownik:</label>
      <input type="text" class="form-control" id="username" placeholder="Nazwa użytkownika"
      name="username" value=<?php print $_POST['username'] ?? ""; ?>>
    </div>
    <div class="form-group">
      <label for="password">Hasło:</label>
      <input type="password" class="form-control" id="password" placeholder="Hasło" name="password">
    </div>
    <!-- <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div> -->
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  <p>Nie masz konta? <a href="/php/rejestracja.php">Zarejestruj się!</a></p>
</div>
</body>
</html>
