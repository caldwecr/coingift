<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 5:26 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\DataFixtures\ORM;

use Cympel\Bundle\CoinGiftBundle\Entity\Campaign;
use Cympel\Bundle\CoinGiftBundle\Entity\NotificationMethod;
use Cympel\Bundle\CoinGiftBundle\Entity\ShareOnNetwork;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cympel\Bundle\CoinGiftBundle\Entity\User;

class LoadShareOnNetworkData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $shareOnNetwork = new ShareOnNetwork();
        $shareOnNetwork->setCampaign($this->getReference('campaign'));
        $shareOnNetwork->setNetworkName('Facebook');
        $manager->persist($shareOnNetwork);
        $manager->flush();
        $this->addReference('shareOnNetwork', $shareOnNetwork);
    }

    public function getOrder()
    {
        return 7;
    }
}