<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Word.php";

    session_start();
    if (empty($_SESSION['list_of_words'])) {
        $_SESSION['list_of_words'] = array();
    }
    if (empty($_SESSION['matched_words'])) {
        $_SESSION['matched_words'] = array();
    }


    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

  //loads home
    $app->get("/", function() use ($app) {
      Word::deleteAll();
      return $app['twig']->render("home.html.twig");
    });

  //loads comparison
    $app->post("/compare", function() use ($app) {
      $newWord = new Word($_POST["input_word"]);
      $newWord->createWordArray();
      $list_of_words = $_SESSION['list_of_words'];
      $firstWord = $list_of_words[0];
      $firstWord->isAnagram();
      return $app['twig']->render("compare.html.twig", array('firstWord' => $firstWord, 'matched_words' => $_SESSION['matched_words']));
    });

  //clear

    return $app;
?>
