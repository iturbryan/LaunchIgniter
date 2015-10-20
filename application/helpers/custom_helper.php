<?php
/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/20/15
 * Time: 11:32 AM
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function format_no($amount, $dp = 2)
{

    return number_format($amount, $dp, '.', ',');

}

function humanDate()
{
    return date("d-m-Y");
}

function sysDate()
{
    return date("Y-m-d");
}

function humanNow()
{
    return date("d-m-Y H:i:s");
}

function sysNow()
{
    return date("Y-m-d H:i:s");
}

function randomString($length) {

    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

    $pass = array(); //remember to declare $pass as an array

    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache

    for ($i = 0; $i < $length; $i++) {

        $n = rand(0, $alphaLength);

        $pass[] = $alphabet[$n];

    }

    return implode($pass); //turn the array into a string
}