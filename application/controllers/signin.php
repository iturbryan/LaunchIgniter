<?php

/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/20/15
 * Time: 1:08 PM
 */
class Signin extends MY_Controller
{

    public function __construct ()

    {

        parent::__construct();

    }

    public function index()

    {

        $header = $this->createIncludeObject(true);

        $view = $this->createViewObject('signin');

        $footer = $this->createIncludeObject(true);

        $this->ShowUserPage($header, $view, $footer);

    }
}