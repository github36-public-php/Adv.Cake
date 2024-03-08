<?php
namespace App;

class StringReverser
{
    private $wordSeparators = [" ", "'", "-"];

    public function reverseString($inputString)
    {
        $reversedString = "";
        $currentWord = "";

        $stringLength = mb_strlen($inputString, 'UTF-8');

        for ($i = 0; $i < $stringLength; $i++) {
            $char = mb_substr($inputString, $i, 1, 'UTF-8');

            if (in_array($char, $this->wordSeparators)) {
                // Символ является разделителем
                $reversedString .= $this->reverseWord($currentWord) . $char;
                $currentWord = "";
            } else {
                // Символ не является разделителем
                $currentWord .= $char;

                // Если символ - последний в строке, разворачиваем последнее слово

                if ($i === $stringLength - 1) {
                    $reversedString .= $this->reverseWord($currentWord);
                }


            }
        }

        return $reversedString;
    }


    private function reverseWord($word)
    {
        $wordLetterCase = [];
        $wordLength = mb_strlen($word, 'UTF-8');

        for ($i = 0; $i < $wordLength; $i++) {
            $char = mb_substr($word, $i, 1, 'UTF-8');

            // Определяем регистр буквы и добавляем в массив
            $wordLetterCase[] = (mb_strtolower($char, 'UTF-8') === $char) ? 0 : 1;
        }

        $reversedWord = mb_strtolower(strrev($word), 'UTF-8');

        for ($i = 0; $i < $wordLength; $i++) {
            if ($wordLetterCase[$i] == 1) $reversedWord[$i] = mb_strtoupper($reversedWord[$i], 'UTF-8');

        }

        return $reversedWord;
    }


}