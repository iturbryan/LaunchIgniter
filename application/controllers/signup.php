<?php

/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/20/15
 * Time: 1:08 PM
 */
class Signup extends MY_Controller
{

    public function __construct ()

    {

        parent::__construct();

    }

    public function index()

    {




        if($this->isPost())

        {

            $this->loadLang('message');

            $name = $this->get('name');

            $idNumber = $this->get('id_number');

            $phoneNumber = $this->get('phone_number');

            $emailAddress = $this->get("email_address");

            $password = $this->get('password');

            $signup = $this->signUp($name, $idNumber, $phoneNumber, $emailAddress, $password);

            echo $this->response($signup, $this->langLine('signup_success'), $this->langLine('signup_fail'));

        }

        else

        {

            $header = $this->createIncludeObject(true);

            $view = $this->createViewObject('signup');

            $footer = $this->createIncludeObject(true);

            $this->ShowUserPage($header, $view, $footer);

        }

    }
}