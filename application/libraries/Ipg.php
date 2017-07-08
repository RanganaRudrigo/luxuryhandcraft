<?php

/**
 * Created by PhpStorm.
 * User: ITMart-6
 * Date: 5/30/2017
 * Time: 9:56 AM
 */
class Ipg
{

    function Ipg()
    {
        $CI = & get_instance();
        log_message('Debug', 'Payment  class is loaded.');
        $this->load();
    }

    function load()
    {
        include_once APPPATH.'/third_party/WebXPay/Crypt/RSA.php';

    }

}