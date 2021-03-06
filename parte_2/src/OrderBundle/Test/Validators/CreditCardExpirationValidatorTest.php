<?php

namespace OrderBundle\Test\Validators;

use OrderBundle\Validators\CreditCardExpirationValidator;
use PHPUnit\Framework\TestCase;

class CreditCardExpirationValidatorTest extends TestCase {

    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult) {

        $creditCardExpirationDate = new \DateTime($value);

        $creditCardExpirationValidator = new CreditCardExpirationValidator($creditCardExpirationDate);

        $isValid = $creditCardExpirationValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenDateIsNotExpired' => ['value' => '2022-11-11', 'expectedResult' => true],
            'shouldNotBeValidWhenDateIsExpired' => ['value' => '2005-11-11', 'expectedResult' => false]
        ];
    }
}