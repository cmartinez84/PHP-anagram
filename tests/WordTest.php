<?php

    require_once "src/Word.php";

    class TemplateTest extends PHPUnit_Framework_TestCase

    //run test in terminal: ./vendor/bin/phpunit tests

    //on Mac: run: export PATH=$PATH:./vendor/bin
    //then run phpunit tests
    {
        function test_array_cookie()
        {
            $test_cookie = new Word;
            $input = 'beard';

            $result = $test_cookie->wordArray($input);

            $this->assertEquals('abder', $result);
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
