<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/contacts.php';

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(),
        array('twig.path' => __DIR__.'/../views'
        ));

        session_start();

        if (empty($_SESSION['list_of_contacts'])) {
            $_SESSION['list_of_contacts'] = array ();

        }

        //prompt user for new contact and establish our Route
        $app->get("/", function() use ($app) {
        return $app['twig']->render('contact.twig', array ('contacts' => Contact::getAll()));
    });

        //create our new contact and display it

        $app->post('/contacts', function() use ($app) {
            $contact = new Contact($_POST['name'], $_POST['information'], $_POST['number']);
            $contact->save();

            return $app['twig']->render('create_contact.twig', array('contacts' => $contact));
        });

        //clear our addresses
        $app->post("/clear_contacts", function() use ($app) {
            Contact::deleteAll();

            return $app['twig']->render('clear_contacts.twig');
        });

        return $app;

?>
