<?php
// to jest w tej samej przestrzenii nazw więc nazwy klas nie mogą być identyczne
namespace entity;

// klasa komunikująca się z bazą danych
class ParcelRepository
{
    // ta funkcja wywoływana jest za każdym razem gdy chcemy coś pobrać lub
    // wysłać do bazy danych
    static public function getConnection()
    {
        // $db to nasze połączenie z bazą
        $db = mysqli_connect("127.0.0.1", "root", "", "kurierphp");
        // to poniżej zapewnia nam, że jeśli wystąpił problem z połączeniem
        // program zostanie poinformowany o wystąpieniu błędu
        if (!$db) {
            // rzuć błąd z informacją "brak połączenia"
            throw new Exception("Connection trouble...", 1);
            // wyjdź z metody i nie zwracaj niczego
            exit;
        }
        // jeśli nie było problemu zwróć zmienną umożliwiającją komunikację
        // z bazą danych
        return $db;
    }

    // metoda umożliwiającja pobranie użytkownika z bazy danych 
    static public function getUser()//$username, $password)
    {
        $db = self::getConnection();
        $result = $db->query("SELECT * FROM users WHERE username = 'Drugi'");
        $row = $result->fetch_assoc();
        var_dump($row);
        // $user = new User();
        // $user->setUserName($row['username']);
        // $user->setEmail($row['email']);
        // $user->setPassword($row['password']);
        // $user->setAddress($row['address']);
        // if ($user->verifyPassword($password)) {
        //     return $user;
        // }
        // return null;
    }

    static public function saveParcel(Parcel $parcel)
    {
        $db = self::getConnection();
        $sender = mysqli_real_escape_string($db, $parcel->getSender());
        $recipient = mysqli_real_escape_string($db, $parcel->getRecipient());
        $weight = mysqli_real_escape_string($db, $parcel->getWeight());
        $date = mysqli_real_escape_string($db, $parcel->getDate());

        $err = "";
        if (!$sender) {
            $err .= '<div class="alert alert-danger">Błędny nadawca.</div>';
        }
        else if (!$recipient || strlen($recipient) < 2) {
            $err .= '<div class="alert alert-danger">Błędny odbiorca.</div>';
        }
        else if (!$weight || $weight < 1) {
            $err .= '<div class="alert alert-danger">Hasło musi być dłuższe niż 3 znaki.</div>';
        }
        else if (!$date) {
            $err .= '<div class="alert alert-danger">Niepoprawna data.</div>';
        }

        if (strlen($err) > 0) {
            return $err;
        }

        $db->query("INSERT INTO parcel(sender, recipient, weight, date) VALUE(
            '$sender', '$recipient', '$weight', '$date');");
        return false;
    }

    static public function getParcels(string $sender)
    {
        $db = self::getConnection();
        $result = $db->query(
            "SELECT parcel.id, parcel.sender, parcel.recipient, parcel.weight,
            parcel.date FROM parcel JOIN users ON users.address = parcel.sender
            WHERE users.username = '$sender'");
        $rows = [];
        $i = 0;
        while ( $row = $result->fetch_assoc()) {
            $rows[$i++] = $row;
        }
        return $rows;
    }

    static public function deleteParcel(int $id)
    {
        $db = self::getConnection();
        $query = "DELETE FROM parcel WHERE id=$id;";
        $db->query($query);
    }
}
