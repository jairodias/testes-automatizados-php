<?php

namespace OrderBundle\Test\Validators;

use OrderBundle\Validators\NumericValidator;
use PHPUnit\Framework\TestCase;

class NumericValidatorTest extends TestCase {

    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult) {

        $numericValidator = new NumericValidator($value);

        $isValid = $numericValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsANumber' => ['value' => 20, 'expectedResult' => true],
            'shouldBeValidWhenValueIsANumberString' => ['value' => '20', 'expectedResult' => true],
            'shouldNotBeValidWhenValueIsNotANumber' => ['value' => 'bla', 'expectedResult' => false],
            'shouldNotBeValidWhenValueIsEmpty' => ['value' => '', 'expectedResult' => false]
        ];
    }
}