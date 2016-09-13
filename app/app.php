<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Word.php";

    session_start();
    if (empty($_SESSION['list_of_words'])) {
        $_SESSION['list_of_words'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

  //loads home
    $app->get("/", function() use ($app) {
      $_SESSION['list_of_words'] = array();
      return $app['twig']->render("home.html.twig");
    });

  //loads comparison
  $app->post("/compare", function() use ($app) {
    $newWord = new Word($_POST['input_word']);
    $newWord->makeAlphaString();
    $newWord->compareToPreviousWords();
    $newWord->saveWord();
    $allwords = $_SESSION['list_of_words'];
    return $app['twig']->render("compare.html.twig", array('firstWord' => $newWord, 'matched_words' => $newWord->matched_words, 'allwords' =>$allwords));
  });

  //clear

    return $app;
?>
