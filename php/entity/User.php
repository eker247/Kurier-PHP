<?php
namespace entity;

class User
{
    protected $username;
    protected $email;
    protected $password;
    protected $address;
    public function getUserName() {
        return $this->username;
    }

    public function setUserName($name) {
        $this->username = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }
}
