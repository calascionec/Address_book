<?php

class Contact
{
//Set class properties(private)
    private $name;
    private $number;
    private $address;

//constructor function
    function __construct($name, $number, $address)
    {
        $this->name = $name;
        $this->number = $number;
        $this->address = $address;
    }

//getter functions

    function getName() {
        return $this->name;
    }

    function getNumber() {
        return $this->number;
    }

    function getAddress() {
        return $this->address;
    }

//setter functions

    function setName($new_name) {
        $this->name = $new_name;
    }

    function setNumber($new_number) {
        $this->number = $new_number;
    }

    function setAddress($new_address) {
        $this->address = $new_address;
    }

//save, getALL, deleteAll functions

    function save() {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll() {
        return $_SESSION['list_of_contacts'];
    }

    static function deleteAll() {
        return $_SESSION['list_of_contacts'];
    }
}

 ?>
