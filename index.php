<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('vendor/autoload.php');

$f3 = Base::instance();

//default route
$f3->route('GET /', function()
{
    echo '<h1>Midterm Survey</h1>';
    echo '<a href="survey">Take My Midterm Survey</a>';
});

//survey
$f3->route('GET /survey', function($f3)
{
    $options = [];
    $options["option1"] = "This midterm is easy";
    $options["option2"] = "I like midterms";
    $options["option3"] = "Today is monday";

    $_SESSION["selectOptions"] = $options;

    $view = new Template();
    echo $view->render('views/survey.html');
});

//run fat-free
$f3->run();

