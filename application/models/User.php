<?php

/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/20/15
 * Time: 1:04 PM
 */
class User extends MY_Model
{
    // table name
    private $table= 'tbl_users';

    function __construct(){

        parent::__construct($this->table);

    }

    function login($username, $password, $role_id){

        $this->db->where(array('username' => $username, 'password' => $password, 'role_id' => $role_id));

        return $this->db->get($this->table);

    }

}