<?php

/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/20/15
 * Time: 10:00 AM
 */
class MY_Model extends CI_Model
{

    private $table;

    function __construct($table = null){

        parent::__construct();

        $this->table = $table;

    }

    function countAll(){

        return $this->db->count_all($this->table);

    }

    function findAll(){

        $this->db->order_by('id','asc');

        return $this->db->get($this->table);

    }

    function findById($id){

        $this->db->where('id', $id);

        return $this->db->get($this->table);

    }

    function persist($entity){

        $this->db->insert($this->table, $entity);

        return $this->db->insert_id();

    }

    function merge($id, $entity){

        $this->db->where('id', $id);

        $this->db->update($this->table, $entity);

    }

    function remove($id){

        $this->db->where('id', $id);

        $this->db->delete($this->table);

    }

    /* Custom data manipulation functions start here */

    function encrypt($password)

    {

        return sha1($password);

    }
}