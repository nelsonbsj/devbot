<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guzzle {

    public function __construct() {
        require_once('GuzzleHttp/vendor/autoload.php');
        //require 'GuzzleHttp/vendor/autoload.php';
    }

}
?>