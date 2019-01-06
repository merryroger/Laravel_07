<?php

namespace App\Services;

class MoneyFormatter
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function eraseString()
    {
        $this->value = str_replace([' ', ',', '.', '_', '-'], '', $this->value);
    }

    public function formatted()
    {
        $this->eraseString();
        $string = strval($this->value);
        $digits = strlen($string);
        $output = '';
        for ($i = 0; $i < $digits; $i++) {
            if (($i % 3 == 0) && $i > 0) {
                $output = ' ' . $output;
            }
            $output = substr($string, ($digits - ($i + 1)), 1) . $output;
        }
        return $output;
    }

    public function digitsFormatted() {
        $this->value = sprintf('%01.2f', $this->value);
        $string = strval($this->value);
        $splitted = preg_split("/\./", $string);
        $string = $splitted[0];
        $digits = strlen($string);
        $splitted[0] = '';

        for ($i = 0; $i < $digits; $i++) {
            if (($i % 3 == 0) && $i > 0) {
                $splitted[0] = ' ' . $splitted[0];
            }

            $splitted[0] = substr($string, ($digits - ($i + 1)), 1) . $splitted[0];
        }


        return join('.', $splitted);
    }

}