<?php

namespace OrderBundle\Test\Service;

use OrderBundle\Service\BadWordsValidator;
use OrderBundle\Test\Service\Stubs\BadWordsRepositoryStub;
use PHPUnit\Framework\TestCase;

class BadWordsValidatorTest extends TestCase {

    /**
     * @test
     */
   public function hasBadWords()
   {
       $badWordsRepository = new BadWordsRepositoryStub();

       $badWordsValidator = new BadWordsValidator($badWordsRepository);

       $hasBadWords = $badWordsValidator->hasBadWords('Seu restaurante é muito bobo');

       $this->assertEquals(true, $hasBadWords);
   }
}