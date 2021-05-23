<?php

namespace OrderBundle\Test\Entity;

use OrderBundle\Entity\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    /**
     * @test
     * @dataProvider customerAllowedDataProvider
     */
    public function isAllowedToOrder(bool $isActive, bool $isBlocked, bool $expectedAllowed) 
    {
        $customer = new Customer(
            $isActive,
            $isBlocked,
            'Jairo Dias',
            '+5547988188906'
        );

        $isAllowed = $customer->isAllowedToOrder();

        $this->assertEquals($expectedAllowed, $isAllowed);
    }

    public function customerAllowedDataProvider()
    {
        return [
            'shouldBeAllowedWhenIsActiveAndNotBlocked' => [
                'isActive' => true, 
                'isBlocked' => false,
                'expectedAllowed' => true
            ],
            'shouldNotBeAllowedWhenIsActiveButIsBlocked' => [
                'isActive' => true, 
                'isBlocked' => true,
                'expectedAllowed' => false
            ],
            'shouldNotBeAllowedWhenIsNotActive' => [
                'isActive' => false, 
                'isBlocked' => false,
                'expectedAllowed' => false
            ],
            'shouldNotBeAllowedWhenIsNotActiveAndIsBlocked' => [
                'isActive' => false, 
                'isBlocked' => true,
                'expectedAllowed' => false
            ]
        ];
    }
}