<?php
namespace entity;
require_once("User.php");
use entity\User;

class UserRepository
{
    static protected function getConnection()
    {
        $db = mysqli_connect("127.0.0.1", "root", "", "kurierphp");
        if (!$db) {
            throw new Exception("Connection trouble...", 1);
            exit;
        }
        return $db;
    }

    static public function getUser($username, $password)
    {
        $db = self::getConnection();
        $result = $db->query("SELECT * FROM users WHERE username = '$username'");
        $row = $result->fetch_assoc();
        $user = new User();
        $user->setUserName($row['username']);
        $user->setEmail($row['email']);
        $user->setPassword($row['password']);
        $user->setAddress($row['address']);
        if ($user->verifyPassword($password)) {
            return $user;
        }
        return null;
    }

    static public function saveUser(User $user)
    {
        $db = self::getConnection();
        $username = mysqli_real_escape_string($db, $user->getUserName());
        $email = mysqli_real_escape_string($db, $user->getEmail());
        $password = mysqli_real_escape_string($db, $user->getPassword());
        $address = mysqli_real_escape_string($db, $user->getAddress());

        $err = "";
        if (!$username) {
            $err .= '<div class="alert alert-danger">Błędna nazwa użytkownika.</div>';
        }
        else if (!$email) {
            $err .= '<div class="alert alert-danger">Błędny adres email.</div>';
        }
        else if (!$password || strlen($password) < 4) {
            $err .= '<div class="alert alert-danger">Hasło musi być dłuższe niż 3 znaki.</div>';
        }
        else if (!$address) {
            $err .= '<div class="alert alert-danger">Niepoprawny adres.</div>';
        }

        // is unque username
        $result = $db->query("SELECT COUNT(*) FROM users WHERE username = '$username'");
        $row = $result->fetch_assoc();
        if ($row['COUNT(*)'] > 0) {
            $err .= '<div class="alert alert-danger">Nazwa użytkownika zarezerwowana. Podaj inną nazwę.</div>';
        }

        // is unique email
        $result = $db->query("SELECT COUNT(*) FROM users WHERE email = '$email'");
        $row = $result->fetch_assoc();
        if ($row['COUNT(*)'] > 0) {
            $err .= '<div class="alert alert-danger">Email zarejestrowany. Podaj inny adres email.</div>';
        }
        if (strlen($err) > 0) {
            return $err;
        }
        $db->query("INSERT INTO users VALUE('$username', '$email', '$password', '$address');");
        return false;
    }

    static public function getAddress(string $username)
    {
        $db = self::getConnection();
        $result = $db->query("SELECT address FROM users WHERE username = '$username'");
        $row = $result->fetch_assoc();
        return $row['address'];
    }
}
