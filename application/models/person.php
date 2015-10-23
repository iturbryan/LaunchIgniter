<?php

/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/20/15
 * Time: 1:04 PM
 */
class Person extends MY_Model
{
    // table name
    private $table= 'tbl_persons';

    function __construct(){

        parent::__construct($this->table);

    }

    function signUp($name, $idNumber, $phoneNumber, $emailAddress, $password)
    {

        $array = array(

            'name' => $name,

            'id_number' => $idNumber,

            'phone_number' => $phoneNumber,

            'email_address' => $emailAddress,

            'password' => $this->encrypt($password)

        );

        return $this->persist($array);
    }

}