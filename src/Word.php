<?php
    class Word
    {
        public $alphaString;
        public $word;

        function __construct($word)
        {
            $this->word = $word;

        }

        function createWordArray()
        {
          $wordArray = str_split($this->word);
          sort($wordArray);
          $finalWord = join($wordArray);
          $this->alphaString = $finalWord;
          array_push($_SESSION['list_of_words'], $this);
        }

        function isAnagram()
        {
          $list_of_words = $_SESSION['list_of_words'];
          forEach($list_of_words as $wordObject){
            if($this->alphaString ==  $wordObject->alphaString){
              array_push($_SESSION['matched_words'], $wordObject->word);
          }
        }
      }

        static function deleteAll()
        {
          $_SESSION['list_of_words'] = array();
        }

    }
?>
