<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 1:13 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerCreateTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/coin/gift/create');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
