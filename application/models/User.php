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

}