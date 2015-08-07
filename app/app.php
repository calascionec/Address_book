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

    $app->get('/', function() use ($app) {

        return $app['twig']->render('address_book.html.twig', array('contacts' => Contact::getAll()));
    });

/* takes information from the form on the root route, creates a new contact, tells it to save itself the the $_SESSION['list_of_contacts'] array, takes user to confirmation page*/

    $app->post("/create_contact", function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['number'], $_POST['address']);
        $contact->save();

        return $app['twig']->render('create_contact.html.twig', array('newcontact' => $contact));
    });


//deletes all contacts from $_SESSION['list_of_contacts'], takes user to confirmation page

    $app->post("/delete_contacts", function() use ($app) {
        Contact::deleteAll();

        return $app['twig']->render('delete_contacts.html.twig');
    });

    return $app;
 ?>
