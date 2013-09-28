<?php

namespace Cympel\Bundle\CoinGiftBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/coin/gift/home');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
