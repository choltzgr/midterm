<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('vendor/autoload.php');

$f3 = Base::instance();


$f3->set('selections', array('This midterm is easy', 'I like midterms', 'Today is monday'));

//default route
$f3->route('GET /', function()
{
    echo '<h1>Midterm Survey</h1>';
    echo '<a href="survey">Take My Midterm Survey</a>';
});

//survey
$f3->route('GET|POST /survey', function($f3)
{
    if(!empty($_POST))
    {
        if(empty($_POST['name']))
        {
            //error
            $f3->set("errors['name']", "A name needs to be entered");
        }
        else
        {
            if(empty($_POST['select']))
            {
                //error
                $f3->set("errors['select']", "An option needs to be selected");
            }
            else
            {
                $select = $_POST['select'];

                $f3->set('select', $select);


                //$_SESSION['select'] = "Testing";

                if (empty($select)) {
                    $_SESSION['select'] = "No selection";
                }
                else {
                    $_SESSION['select'] = implode(', ', $select);
                }

                $_SESSION['name'] = $_POST['name'];

                $f3->reroute('/summary');
            }

            }

        }
    $view = new Template();
    echo $view->render('views/survey.html');

});

//summary
$f3->route('GET|POST /summary', function()
{
    $view = new Template();
    echo $view->render('views/results.html');
});

//run fat-free
$f3->run();

