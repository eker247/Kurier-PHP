<?php
session_start();
use entity\UserRepository;
use entity\User;
require_once('base.php');
require_once('entity/UserRepository.php');
require_once('entity/User.php');
$err = null;
if (isset($_POST['username'])) {
    $user = new User();
    $user->setUserName($_POST['username']);
    $user->setEmail($_POST['email'] ?? "");
    $user->setPassword($_POST['password'] ?? "");
    $user->setAddress($_POST['address'] ?? "");
    $err = UserRepository::saveUser($user);
    if (!$err) {
        $_SESSION['isLoggedIn'] = 'yes';
        $_SESSION['username'] = $user->getUserName();
        header("Location: /");
    }
}
?>
<html>
<?php head("Rejestracja - Przesyłki 360", ["css/kontakt.css"]); ?>
<body>
<?php menu();
if ($err) {
    print $err;
}
$user = null;
if (isset($_POST['username']) && isset($_POST['username'])) {
    $user = UserRepository::getUser($_POST['username'], $_POST['password']);
}
if ($user) {
    $_SESSION['isLoggedIn'] = 'yes';
    $_SESSION['user'] = $user;
}
?>
<div class="container">
  <h2>Rejestracja</h2>
  <form class="" method="post" action="/php/rejestracja.php">
    <div class="form-group">
      <label for="username">Użytkownik:</label>
      <input type="text" class="form-control" id="username" placeholder="Nazwa użytkownika"
      name="username" value=<?php print $_POST['username'] ?? "" ?>>
    </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Email"
        name="email" value=<?php print $_POST['email'] ?? "" ?>>
      </div>
    <div class="form-group">
      <label for="password">Hasło:</label>
      <input type="password" class="form-control" id="password" placeholder="Hasło" name="password">
    </div>
      <div class="form-group">
        <label for="address">Adres:</label>
        <input type="text" class="form-control" id="address" placeholder="Adres"
        name="address" value="<?php print $_POST['address'] ?? "" ; ?>">
      </div>
    <button type="submit" class="btn btn-default">Wyślij</button>
  </form>
</div>
</body>
</html>
