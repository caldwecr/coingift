<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 4:46 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\DataFixtures\ORM;

use Cympel\Bundle\CoinGiftBundle\Entity\Campaign;
use Cympel\Bundle\CoinGiftBundle\Entity\CoinGift;
use Cympel\Bundle\CoinGiftBundle\Entity\Vote;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cympel\Bundle\CoinGiftBundle\Entity\User;

class LoadCoinGiftData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $coinGift = new CoinGift();
        $coinGift->setUser($this->getReference('user'));
        $coinGift->setCampaign($this->getReference('campaign'));
        $coinGift->setCoinGiftValue(100);
        $manager->persist($coinGift);
        $coinGift2 = new CoinGift();
        $coinGift2->setUser($this->getReference('jesse'));
        $coinGift2->setCampaign($this->getReference('campaign'));
        $coinGift2->setCoinGiftValue(300);
        $manager->persist($coinGift2);
        $coinGift3 = new CoinGift();
        $coinGift3->setUser($this->getReference('user2'));
        $coinGift3->setCampaign($this->getReference('campaign'));
        $coinGift3->setCoinGiftValue(200);
        $manager->persist($coinGift3);
        $coinGift4 = new CoinGift();
        $coinGift4->setUser($this->getReference('toni'));
        $coinGift4->setCampaign($this->getReference('campaign'));
        $coinGift4->setCoinGiftValue(100);
        $manager->persist($coinGift4);
        $coinGift5 = new CoinGift();
        $coinGift5->setUser($this->getReference('danny'));
        $coinGift5->setCampaign($this->getReference('campaign'));
        $coinGift5->setCoinGiftValue(100);
        $manager->persist($coinGift5);
        $manager->flush();
        $this->addReference('coinGift', $coinGift);
    }

    public function getOrder()
    {
        return 5;
    }
}