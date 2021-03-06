<?php

/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/20/15
 * Time: 1:08 PM
 */
class Signin extends MY_Controller
{

    const USER_ROLE_ID = 1;

    public function __construct ()

    {

        parent::__construct();

    }

    public function index()

    {



        if($this->isPost())

        {

            $this->loadLang('message');

            $username = $this->get('username');

            $password = $this->get('password');

            $login = $this->login($username, $password, self::USER_ROLE_ID);

            echo $this->response($login, $this->langLine('login_success'), $this->langLine('login_fail'));

        }

        else

        {

            $header = $this->createIncludeObject(true);

            $view = $this->createViewObject('signin');

            $footer = $this->createIncludeObject(true);

            $this->ShowUserPage($header, $view, $footer);

        }
    }
}