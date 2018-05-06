<?php
namespace entity;

class Parcel
{
    protected $id;
    protected $sender;
    protected $recipient;
    protected $weight;
    protected $date;
    public function __construct($sender, $recipient, $weight, $date)
    {
        $this->setSender($sender);
        $this->setRecipient($recipient);
        $this->setWeight($weight);
        $this->setDate($date);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($string) {
        $this->id = htmlspecialchars($string);
    }

    public function getSender() {
        return $this->sender;
    }

    public function setSender($string) {
        $this->sender = htmlspecialchars($string);
    }

    public function getRecipient() {
        return $this->recipient;
    }

    public function setRecipient($string) {
        $this->recipient = htmlspecialchars($string);
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($string) {
        $this->weight = htmlspecialchars($string);
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($string) {
        $this->date = htmlspecialchars($string);
    }
}
