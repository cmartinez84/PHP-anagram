<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Word.php";

    session_start();
    if (empty($_SESSION['collection'])) {
        $_SESSION['collection'] = array();
    }

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

  //loads actual twig file
    $app->get("/", function() use ($app) {
      $word = new Word;
      return $app['twig']->render("home.html.twig");
    });

  //loads basic php
    $app->get("/test", function() use ($app) {
      var_dump($wordArray);
    });

    return $app;
?>
