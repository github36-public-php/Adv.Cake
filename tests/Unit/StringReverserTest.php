<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\StringReverser;

class StringReverserTest extends TestCase
{
    public function testReverseString()
    {
        $stringReverser = new StringReverser();

        $input = "myString my-String mYstrinG1 my'strinG";
        $expectedOutput = "gnIrtsym ym-Gnirts 1GnirtsYm ym'gnirtS";

        $result = $stringReverser->reverseString($input);

        $this->assertEquals($expectedOutput, $result);
    }

    public function testReverseStringWithEmptyInput()
    {
        $stringReverser = new StringReverser();

        $input = "";
        $expectedOutput = "";

        $result = $stringReverser->reverseString($input);

        $this->assertEquals($expectedOutput, $result);
    }

    public function testReverseStringWithSingleWord()
    {
        $stringReverser = new StringReverser();

        $input = "Hello";
        $expectedOutput = "Olleh";

        $result = $stringReverser->reverseString($input);

        $this->assertEquals($expectedOutput, $result);
    }

    public function testReverseStringWithPunctuation()
    {
        $stringReverser = new StringReverser();

        $input = "Hello, World!";
        $expectedOutput = ",olleh !dlrow";

        $result = $stringReverser->reverseString($input);

        $this->assertEquals($expectedOutput, $result);
    }
}