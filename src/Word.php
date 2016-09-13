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
          // $_SESSION['word'] = $this;
          array_push($_SESSION['list_of_words'], $this);
        }
        function isAnagram()
        {
          $list_of_words = $_SESSION['list_of_words'];
          $matched_words = array();
          forEach($list_of_words as $wordObject){
            if($this->alphaString ==  $wordObject->alphaString){
              array_push($matched_words, $wordObject);
          }
        }
        if(empty($matched_words)){
          return false;
        }
        else {
          return true;
        }
      }

    }
?>
