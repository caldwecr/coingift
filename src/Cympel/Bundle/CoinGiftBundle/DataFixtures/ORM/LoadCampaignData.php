<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 4:29 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\DataFixtures\ORM;

use Cympel\Bundle\CoinGiftBundle\Entity\Campaign;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cympel\Bundle\CoinGiftBundle\Entity\User;

class LoadCampaignData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $campaign = new Campaign();
        $campaign->setUser($this->getReference('user'));
        $campaign->setId("testCampaign");
        $campaign->setBenefitsImpact("it will do great things");
        $campaign->setIdea("my idea is to fly to the moon");
        $campaign->setInspiration("my inspiration is nasa");

        $manager->persist($campaign);
        $manager->flush();
        $this->addReference('campaign', $campaign);
    }

    public function getOrder()
    {
        return 2;
    }
}