<?php

namespace Unidev\tests;

use Exception;
use Unidev\Classes\PasswordGenerator;
use PHPUnit\Framework\TestCase;

class PasswordGeneratorTest extends TestCase
{
    private $passwordGenerator;

    public function setUp()
    {
        $this->passwordGenerator = new PasswordGenerator();
    }

    /**
     * @dataProvider numericPasswordProvider
     */
    public function testShouldGenerateNumericPassword($type, $length)
    {
        $password = $this->passwordGenerator->generate($type, $length);

        $this->assertTrue(is_numeric($password));
        $this->assertEquals($length, strlen($password));
    }

    /**
     * @dataProvider negativeLengthPasswordProvider
     */
    public function testShouldThrowAnExceptionWhenLengthIsLessThanOrEqualToThree($type, $length)
    {
        $this->expectException(Exception::class);

        $this->passwordGenerator->generate($type, $length);
    }

    /**
     * @dataProvider alphanumericPasswordProvider
     */
    public function testShouldGenerateAlphanumericPassword($type, $length)
    {
        $password = $this->passwordGenerator->generate($type, $length);

        $this->assertTrue(preg_match("/\d/", $password) && preg_match("/[a-z]/", $password));
        $this->assertEquals($length, strlen($password));
    }

    /**
     * @dataProvider alphanumericPasswordWithSpecialCharsProvider
     */
    public function testShouldGenerateAlphanumericPasswordWithSpecialChars($type, $length)
    {
        $password = $this->passwordGenerator->generate($type, $length);

        $this->assertTrue(
            preg_match("/\d/", $password) &&
            preg_match("/[a-z]/", $password) &&
            preg_match("/[$|#|@|!|_|-]/", $password)
        );
        $this->assertEquals($length, strlen($password));
    }

    public function numericPasswordProvider()
    {
        return [
            ["type" => "numeric", "length" => 6],
            ["type" => "numeric", "length" => 10],
            ["type" => "numeric", "length" => 11],
            ["type" => "numeric", "length" => 55],
            ["type" => "numeric", "length" => 4]
        ];
    }

    public function negativeLengthPasswordProvider()
    {
        return [
            ["type" => "numeric", "length" => -6],
            ["type" => "numeric", "length" => 0],
            ["type" => "numeric", "length" => 1],
            ["type" => "numeric", "length" => 2],
            ["type" => "numeric", "length" => -3],

            ["type" => "alphanumeric", "length" => -6],
            ["type" => "alphanumeric", "length" => 0],
            ["type" => "alphanumeric", "length" => 1],
            ["type" => "alphanumeric", "length" => 2],
            ["type" => "alphanumeric", "length" => -3],

            ["type" => "specialchars", "length" => -6],
            ["type" => "specialchars", "length" => 0],
            ["type" => "specialchars", "length" => 1],
            ["type" => "specialchars", "length" => 2],
            ["type" => "specialchars", "length" => -3]
        ];        
    }

    public function alphanumericPasswordProvider()
    {
        return [
            ["type" => "alphanumeric", "length" => 6],
            ["type" => "alphanumeric", "length" => 10],
            ["type" => "alphanumeric", "length" => 11],
            ["type" => "alphanumeric", "length" => 55],
            ["type" => "alphanumeric", "length" => 4]
        ];
    }

    public function alphanumericPasswordWithSpecialCharsProvider()
    {
        return [
            ["type" => "specialchars", "length" => 6],
            ["type" => "specialchars", "length" => 10],
            ["type" => "specialchars", "length" => 11],
            ["type" => "specialchars", "length" => 55],
            ["type" => "specialchars", "length" => 4]
        ];
    }
}