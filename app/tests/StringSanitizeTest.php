<?php

namespace Unidev\Tests;

use PHPUnit\Framework\TestCase;
use Unidev\Classes\StringSanitize;

class StringSanitizeTest extends TestCase
{
    /**
     * @dataProvider badWordsProvider
     */
    public function testShouldHideBadWords($text, $expected)
    {
        $stringSanitize = new StringSanitize();
        $sanitizedString = $stringSanitize->hideBadWords($text);

        $this->assertEquals($expected, $sanitizedString);
    }

    public function badWordsProvider()
    {
        return [
            [
                "text" => "Asdrubal é um grande otário",
                "expected" => "Asdrubal é um grande ******"
            ],
            [
                "text" => "Esse filme é uma bosta!!!",
                "expected" => "Esse filme é uma *****!!!"
            ],
            [
                "text" => "Você é um merda em fatia!!!",
                "expected" => "Você é um ***** em fatia!!!"
            ],
        ];
    }
}