<?php

    require_once "src/Word.php";
    session_start();
    if (empty($_SESSION['list_of_words'])) {
        $_SESSION['list_of_words'] = array();
    }

    class TemplateTest extends PHPUnit_Framework_TestCase

    //run test in terminal: ./vendor/bin/phpunit tests

    //on Mac: run: export PATH=$PATH:./vendor/bin
    //then run phpunit tests
    {
        function test_array_cookie()
        {
            $test_cookie = new Word;
            $input = 'beard';

            $test_cookie->createWordArray($input);
            $list_of_words = $_SESSION['list_of_words'];

            $this->assertEquals('abder', $list_of_words[0]->alphaString);
        }
        function test_word_compare()
        {
            $test_cookie = new Word;
            $input = "bread";

            $test_cookie->createWordArray($input);
            $result = $test_cookie->isAnagram();
            // $list_of_words = $_SESSION['list_of_words'];
            // if($test_cookie->alphaString == $list_of_words[0]->alphaString){
            //   $result = true;
            // }

            $this->assertEquals(true, $result);
        }

    }


  //   {
  //     // Testcode example
  //     //  function test_makeTitleCase_oneWord()
  //     //  {
  //     //      //Arrange
  //     //      $test_TitleCaseGenerator = new Template;
  //     //      $input = "beowulf";
  //      //
  //     //      //Act
  //     //      $result = $test_TitleCaseGenerator->testTemplate($input);
  //      //
  //     //      //Assert
  //     //      $this->assertEquals("Beowulf", $result);
  //     //  }
  //  }

 ?>
