<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Word.php";

    session_start();
    if (empty($_SESSION['list_of_words'])) {
        $_SESSION['list_of_words'] = array();
    }

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

  //loads actual twig file
    $app->get("/", function() use ($app) {
      return $app['twig']->render("home.html.twig");
    });

  //loads basic php
    $app->post("/compare", function() use ($app) {
      $firstWord = new Word($_POST["first_word"]);
      $firstWord->createWordArray();
      $firstWord->isAnagram();
      var_dump ($firstWord);
      return $app['twig']->render("compare.html.twig", array('firstWord' => $firstWord));
    });

    return $app;
?>
