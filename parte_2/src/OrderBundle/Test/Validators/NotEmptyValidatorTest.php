<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\NotEmptyValidator;
use PHPUnit\Framework\TestCase;

class NotEmptyValidatorTest extends TestCase {

    public function testShouldNotBeValidWhenValueIsEmpty() {

        $emptyValue = "";
        $notEmptyValidator = new NotEmptyValidator($emptyValue);

        $isValid = $notEmptyValidator->isValid();

        $this->assertFalse($isValid);
    }

    public function testShouldBeValidWhenValueIsNotEmpty() {

        $emptyValue = "foo";
        $notEmptyValidator = new NotEmptyValidator($emptyValue);

        $isValid = $notEmptyValidator->isValid();

        $this->assertTrue($isValid);
    }

}