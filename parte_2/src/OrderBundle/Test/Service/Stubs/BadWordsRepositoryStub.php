<?php

namespace OrderBundle\Test\Service\Stubs;

use OrderBundle\Repository\BadWordsRepositoryInterface;

class BadWordsRepositoryStub implements BadWordsRepositoryInterface
{
    public function findAllAsArray()
    {
        return ['bobo', 'chulé', 'besta'];
    }
}