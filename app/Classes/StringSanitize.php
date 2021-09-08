<?php

namespace Unidev\Classes;

class StringSanitize
{
    private $badWords = ["bosta", "merda", "otário"];

    public function hideBadWords($string)
    {
        foreach ($this->badWords as $badWord) {
            $string = str_replace($badWord, str_repeat("*", mb_strlen($badWord)), $string);
        }

        return $string;
    }
}