<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\MoneyFormatter;

class MoneyFormatterTest extends TestCase
{
    public function testFormatted()
    {
        $value = 9999999;
        $valueExpected = '9 999 999';
        $formatter = new MoneyFormatter($value);
        $this->assertEquals($valueExpected, $formatter->formatted());
    }

    public function testFormattedLittleNumber()
    {
        $value = 99;
        $valueExpected = '99';
        $formatter = new MoneyFormatter($value);
        $this->assertEquals($valueExpected, $formatter->formatted());
    }

    public function testFormatted0()
    {
        $value = 0;
        $valueExpected = '0';
        $formatter = new MoneyFormatter($value);
        $this->assertEquals($valueExpected, $formatter->formatted());
    }

    public function testFormattedThousand()
    {
        $value = 1000;
        $valueExpected = '1 000';
        $formatter = new MoneyFormatter($value);
        $this->assertEquals($valueExpected, $formatter->formatted());
    }

    public function testFormattedString()
    {
        $value = '1000';
        $valueExpected = '1 000';
        $formatter = new MoneyFormatter($value);
        $this->assertEquals($valueExpected, $formatter->formatted());
    }

    public function testFormattedStringSpaced()
    {
        $value = '1 000';
        $valueExpected = '1 000';
        $formatter = new MoneyFormatter($value);
        $this->assertEquals($valueExpected, $formatter->formatted());
    }

    public function testEraseString()
    {
        $value = '1.000-000';
        $valueExpected = '1000000';
        $formatter = new MoneyFormatter($value);
        $formatter2 = new MoneyFormatter($valueExpected);
        $formatter->eraseString();
        $this->assertEquals($formatter->getValue(), $formatter2->getValue());
    }

    public function testDigitsFormattedIntegerValue()
    {
        $value = 1000;
        $valueExpected = '1 000.00';
        $formatter = new MoneyFormatter($value);
        $this->assertEquals($formatter->digitsFormatted(), $valueExpected);
    }

    public function testDigitsFormattedBigIntegerValue()
    {
        $value = 875409686;
        $valueExpected = '875 409 686.00';
        $formatter = new MoneyFormatter($value);
        $this->assertEquals($formatter->digitsFormatted(), $valueExpected);
    }

    public function testDigitsFormattedFloatValue()
    {
        $value = 970.3;
        $valueExpected = '970.30';
        $formatter = new MoneyFormatter($value);
        $this->assertEquals($formatter->digitsFormatted(), $valueExpected);
    }

    public function testDigitsFormattedTinyFloatValue()
    {
        $value = 0.014478;
        $valueExpected = '0.01';
        $formatter = new MoneyFormatter($value);
        $this->assertEquals($formatter->digitsFormatted(), $valueExpected);
    }

}
