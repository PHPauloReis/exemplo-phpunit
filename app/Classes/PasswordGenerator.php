<?php

namespace Unidev\Classes;

use Exception;

class PasswordGenerator
{
    public function generate($type, $length)
    {
        if ($length <= 3) {
            throw new Exception("O comprimento da senha deve ser igual ou maior que 3 digitos!");
        }

        switch ($type) {
            case "numeric":
                return $this->generateNumericPassword($length);

            case "alphanumeric":
                return $this->generateAphanumericPassword($length);

            case "specialchars":
                return $this->generateAphanumericPasswordWithSpecialChars($length);
        }
    }

    private function generateNumericPassword($length)
    {
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= rand(0, 9);
        }

        return $password;
    }

    private function generateAphanumericPassword($length)
    {
        $numericDigits = range(0 ,9);
        $alphaDigits = range('a', 'z');

        $password = '';

        for ($i = 0; $i < $length; $i++) {
            if ($i % 2 === 0) {
                $password .= array_rand($numericDigits);
            } else {
                $password .= array_rand(array_flip($alphaDigits));
            }
        }

        return $password;
    }

    private function generateAphanumericPasswordWithSpecialChars($length)
    {
        $password = $this->generateAphanumericPassword($length);
        $amountSpecialChars = rand(1, (int) ($length / 3));
        $specialChars = ["$", "#", "@", "!", "_", "-"];

        for ($i = 0; $i < $amountSpecialChars; $i++) {
            $password[rand(0, strlen($password) - 1)] = array_rand(array_flip($specialChars));
        }

        return $password;
    }
}