<?php

namespace OrderBundle\Test\Service;

use OrderBundle\Repository\BadWordsRepository;
use OrderBundle\Service\BadWordsValidator;
use OrderBundle\Test\Service\Stubs\BadWordsRepositoryStub;
use PHPUnit\Framework\TestCase;

class BadWordsValidatorTest extends TestCase {

    /**
     * @test
     * @dataProvider bardWordsDataProvider
     */
   public function hasBadWords(array $badWordsList, string $text, bool $foundBadwords)
   {
       $badWordsRepository = $this->createMock(BadWordsRepository::class);

       $badWordsRepository->method('findAllAsArray')
            ->willReturn($badWordsList);   

       $badWordsValidator = new BadWordsValidator($badWordsRepository);

       $hasBadWords = $badWordsValidator->hasBadWords($text);

       $this->assertEquals($foundBadwords, $hasBadWords);
   }

   public function bardWordsDataProvider()
   {
        return [
           'shouldFindWhenHasBadWords' =>  [
               'badWordsList' => ['bobo', 'chulé', 'besta'],
               'text' => 'Seu restaurante é muito bobo',
               'foundBadWords' => true
           ],
           'shouldNotFindWhenHasNoBadWords' => [
                'badWordsList' => ['bobo', 'chulé', 'besta'],
                'text' => 'Seu restaurante é muito bom',
                'foundBadWords' => false
           ],
           'shouldNotFindWhenTextIsEmpty' => [
                'badWordsList' => ['bobo', 'chulé', 'besta'],
                'text' => '',
                'foundBadWords' => false
            ],
            'shouldNotFindWhenBadWordsListIsEmpty' => [
                'badWordsList' => [],
                'text' => 'Seu restaurante é muito bobo',
                'foundBadWords' => false
            ],
        ];
   }
}