<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

//require autoload
require_once('vendor/autoload.php');

//create an instance of the base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function($f3)
{
    echo '<h1>Midterm Survey</h1>';
    echo '<a href="survey">Take My Midterm Survey</a>';
});

//run fat-free
$f3->run();

