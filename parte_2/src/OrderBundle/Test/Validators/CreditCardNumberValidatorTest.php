<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\CreditCardNumberValidator;
use PHPUnit\Framework\TestCase;

class CreditCardNumberValidatorTest extends TestCase {

    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult) {
        $creditCardNumberValidator = new CreditCardNumberValidator($value);

        $isValid = $creditCardNumberValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsACreditCard' => ['value' => 4782726995502016, 'expectedResult' => true],
            'shouldBeValidWhenValueIsACreditCardAsString' => ['value' => '4782726995502016', 'expectedResult' => true],
            'shouldNotBeValidWhenValueIsNotACreditCardAsString' => ['value' => '1234', 'expectedResult' => false],
            'shoulNotBeValidWhenValueIsEmpty' => ['value' => '', 'expectedResult' => false]
        ];
    }
}