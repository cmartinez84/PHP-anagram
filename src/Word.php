<?php
    class Word
    {
        function wordArray($input_word)
        {
          $wordArray = str_split($input_word);
          sort($wordArray);
          $finalWord = join($wordArray);
          return $finalWord;
        }
    }
?>
