<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 1:14 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerCampaignTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/coin/gift/campaign/testCampaign');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
