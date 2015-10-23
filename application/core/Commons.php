<?php

/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/20/15
 * Time: 11:51 AM
 */
interface Commons
{

    public function isPost();

    public function get($key);

    public function post($key);

    public function sendEmail($subject, $to, $message, $attachment);

    public function standardizePhoneNumber($phoneNumber, $countryCode);

    public function uploadFile($filename, $path, $maxSize, $allowed_types);

    public function loadModel($model);

    public function login($username, $password, $role_id);

    public function adminShowPage();

    public function ShowUserPage($header, $view, $footer);

    public function sendSMS($phone, $message);

    public function createViewObject($view, $data);

    public function createIncludeObject($show, $data);

    public function response($status, $successMessage, $failureMessage);

    public function loadLang($filename);

    public function langLine($key);

    public function signUp($name, $idNumber, $phoneNumber, $emailAddress, $password);

}