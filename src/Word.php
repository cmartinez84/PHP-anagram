<?php
class Word
{
  public $word;
  public $alphaString;
  public $matched_words;

  function __construct($word)
  {
  $this->word = $word;
  $this->matched_words = array();
  }
  function makeAlphaString(){
  $wordArray = str_split($this->word);
  sort($wordArray);
  $this->alphaString = join($wordArray);
  $this->alphaString = strtolower($this->alphaString);
  }
  function saveWord()
  {
    array_push($_SESSION['list_of_words'], $this);
  }
  function compareToPreviousWords()
  {
    $list_of_words = $_SESSION['list_of_words'];
    forEach($list_of_words as $wordObject){
      if($this->alphaString ==  $wordObject->alphaString){
        array_push($this->matched_words, $wordObject->word);
      }
    }
  }

}

?>
