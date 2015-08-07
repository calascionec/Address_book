<?php
//Give file access to Silex and the Contact Class

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";


//start session, check to see if 'list_of_contacts is empty, if empty create an empty array.'

    session_start();
    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

//instantiate a new Silex object

    $app = new Silex\Application();

//allows the use of twig and tells the program where to find the twig files

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));


//set the root route

    $app->get('/', function use ($app) {

        return $app['twig']->redner('address_book.html.twig', array('contacts' => Contact::getAll()));
    });



 ?>
