<?php

class DiscountCalculatorTest 
{

    public function ShouldApply_WhenValueIsAboveTheMinimumTest()
    {
        $discountCalculator = new DiscountCalculator();

        $totalValue = 130;

        $totalWithDiscount = $discountCalculator->apply($totalValue);

        $expectedValue = 110;
        $this->assetEquals((int) $expectedValue, (int) $totalWithDiscount);
    }

    public function ShouldNotApply_WhenValueIsBellowTheMinimumTest()
    {
        $discountCalculator = new DiscountCalculator();

        $totalValue = 90;

        $totalWithDiscount = $discountCalculator->apply($totalValue);

        $expectedValue = 90;
        $this->assetEquals((int) $expectedValue, (int) $totalWithDiscount);
    }

    public function assetEquals($exceptedValue, $actualValue)
    {
        if($exceptedValue !== $actualValue) {
            $message = 'Expected: ' . $exceptedValue . ' but got: ' . $actualValue;

            throw new \Exception($message);
        }

        echo "\nTest passed! \n \n____________________ \n";
    }
}