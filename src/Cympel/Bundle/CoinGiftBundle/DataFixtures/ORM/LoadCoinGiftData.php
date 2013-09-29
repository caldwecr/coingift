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
        $coinGift6 = new CoinGift();
        $coinGift6->setUser($this->getReference('danny'));
        $coinGift6->setCampaign($this->getReference('park'));
        $coinGift6->setCoinGiftValue(200);
        $manager->persist($coinGift6);
        $coinGift7 = new CoinGift();
        $coinGift7->setUser($this->getReference('user2'));
        $coinGift7->setCampaign($this->getReference('nintendo'));
        $coinGift7->setCoinGiftValue(100);
        $manager->persist($coinGift7);
        $coinGift8 = new CoinGift();
        $coinGift8->setUser($this->getReference('user'));
        $coinGift8->setCampaign($this->getReference('hack'));
        $coinGift8->setCoinGiftValue(100);
        $manager->persist($coinGift8);
        $coinGift9 = new CoinGift();
        $coinGift9->setUser($this->getReference('toni'));
        $coinGift9->setCampaign($this->getReference('gun'));
        $coinGift9->setCoinGiftValue(400);
        $manager->persist($coinGift9);
        $coinGift10 = new CoinGift();
        $coinGift10->setUser($this->getReference('jesse'));
        $coinGift10->setCampaign($this->getReference('girl'));
        $coinGift10->setCoinGiftValue(500);
        $manager->persist($coinGift10);
        $coinGift11 = new CoinGift();
        $coinGift11->setUser($this->getReference('danny'));
        $coinGift11->setCampaign($this->getReference('demo'));
        $coinGift11->setCoinGiftValue(200);
        $manager->persist($coinGift11);

        $coinGift12 = new CoinGift();
        $coinGift12->setUser($this->getReference('user2'));
        $coinGift12->setCampaign($this->getReference('park'));
        $coinGift12->setCoinGiftValue(300);
        $manager->persist($coinGift12);
        $coinGift13 = new CoinGift();
        $coinGift13->setUser($this->getReference('user'));
        $coinGift13->setCampaign($this->getReference('gun'));
        $coinGift13->setCoinGiftValue(200);
        $manager->persist($coinGift13);
        $coinGift14 = new CoinGift();
        $coinGift14->setUser($this->getReference('danny'));
        $coinGift14->setCampaign($this->getReference('homeless'));
        $coinGift14->setCoinGiftValue(100);
        $manager->persist($coinGift14);
        $coinGift15 = new CoinGift();
        $coinGift15->setUser($this->getReference('danny'));
        $coinGift15->setCampaign($this->getReference('nintendo'));
        $coinGift15->setCoinGiftValue(100);
        $manager->persist($coinGift15);
        $coinGift16 = new CoinGift();
        $coinGift16->setUser($this->getReference('danny'));
        $coinGift16->setCampaign($this->getReference('park'));
        $coinGift16->setCoinGiftValue(200);
        $manager->persist($coinGift16);
        $coinGift17 = new CoinGift();
        $coinGift17->setUser($this->getReference('toni'));
        $coinGift17->setCampaign($this->getReference('nintendo'));
        $coinGift17->setCoinGiftValue(100);
        $manager->persist($coinGift17);
        $coinGift18 = new CoinGift();
        $coinGift18->setUser($this->getReference('jesse'));
        $coinGift18->setCampaign($this->getReference('hack'));
        $coinGift18->setCoinGiftValue(100);
        $manager->persist($coinGift18);
        $coinGift19 = new CoinGift();
        $coinGift19->setUser($this->getReference('user'));
        $coinGift19->setCampaign($this->getReference('gun'));
        $coinGift19->setCoinGiftValue(400);
        $manager->persist($coinGift19);
        $coinGift20 = new CoinGift();
        $coinGift20->setUser($this->getReference('user2'));
        $coinGift20->setCampaign($this->getReference('girl'));
        $coinGift20->setCoinGiftValue(500);
        $manager->persist($coinGift20);
        $coinGift21 = new CoinGift();
        $coinGift21->setUser($this->getReference('user'));
        $coinGift21->setCampaign($this->getReference('demo'));
        $coinGift21->setCoinGiftValue(200);
        $manager->persist($coinGift21);

        $manager->flush();
        $this->addReference('coinGift', $coinGift);
    }

    public function getOrder()
    {
        return 5;
    }
}