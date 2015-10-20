<?php

/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/20/15
 * Time: 1:08 PM
 */
class Login extends MY_Controller
{

    public function __construct ()

    {

        parent::__construct();

    }

    public function index()

    {

        $this->load->view('welcome_message');

    }
}