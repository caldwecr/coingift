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
        $campaign->setId("Moon Trip");
        $campaign->setBenefitsImpact("it will do great things");
        $campaign->setIdea("my idea is to fly to the moon");
        $campaign->setInspiration("my inspiration is nasa");
        $campaign->setHeadlineImageUri("/stuff/images/thumb-1.jpg");
        $manager->persist($campaign);

        $campaign2 = new Campaign();
        $campaign2->setUser($this->getReference('user'));
        $campaign2->setId("Park clean up");
        $campaign2->setBenefitsImpact("it will do great things");
        $campaign2->setIdea("my idea is to fly to the moon23r");
        $campaign2->setInspiration("my inspiration is nasafwefw");
        $campaign2->setHeadlineImageUri("/stuff/images/thumb-2.jpg");
        $manager->persist($campaign2);

        $campaign3 = new Campaign();
        $campaign3->setUser($this->getReference('user'));
        $campaign3->setId("Gun buy back");
        $campaign3->setBenefitsImpact("it will do great thingsalso");
        $campaign3->setIdea("my idea is to fly to the moon");
        $campaign3->setInspiration("my inspiration is nasa");
        $campaign3->setHeadlineImageUri("/stuff/images/thumb-3.jpg");
        $manager->persist($campaign3);

        $campaign4 = new Campaign();
        $campaign4->setUser($this->getReference('user'));
        $campaign4->setId("Homeless housing");
        $campaign4->setBenefitsImpact("it will do great things4");
        $campaign4->setIdea("my idea is to fly to the moon");
        $campaign4->setInspiration("my inspiration is nasa");
        $campaign4->setHeadlineImageUri("http://placehold.it/250x250&text=Thumbnail");
        $manager->persist($campaign4);

        $campaign5 = new Campaign();
        $campaign5->setUser($this->getReference('user'));
        $campaign5->setId("Downtown block demo");
        $campaign5->setBenefitsImpact("it will do great things");
        $campaign5->setIdea("my idea is to fly to the moon");
        $campaign5->setInspiration("my inspiration is nasa");
        $campaign5->setHeadlineImageUri("/stuff/images/thumb-1.jpg");
        $manager->persist($campaign5);

        $campaign6 = new Campaign();
        $campaign6->setUser($this->getReference('user'));
        $campaign6->setId("Girl scout pink party");
        $campaign6->setBenefitsImpact("it will do great things");
        $campaign6->setIdea("my idea is to fly to the moon");
        $campaign6->setInspiration("my inspiration is nasa");
        $campaign6->setHeadlineImageUri("/stuff/images/thumb-2.jpg");
        $manager->persist($campaign6);

        $campaign7 = new Campaign();
        $campaign7->setUser($this->getReference('user'));
        $campaign7->setId("Hack a thon");
        $campaign7->setBenefitsImpact("it will do great things");
        $campaign7->setIdea("my idea is to fly to the moon");
        $campaign7->setInspiration("my inspiration is nasa");
        $campaign7->setHeadlineImageUri("/stuff/images/thumb-3.jpg");
        $manager->persist($campaign7);

        $campaign8 = new Campaign();
        $campaign8->setUser($this->getReference('user'));
        $campaign8->setId("Voter registration");
        $campaign8->setBenefitsImpact("it will do great things");
        $campaign8->setIdea("my idea is to fly to the moon");
        $campaign8->setInspiration("my inspiration is nasa");
        $campaign8->setHeadlineImageUri("http://placehold.it/250x250&text=Thumbnail");
        $manager->persist($campaign8);

        $campaign9 = new Campaign();
        $campaign9->setUser($this->getReference('user2'));
        $campaign9->setId("Nintendo-4-kids");
        $campaign9->setBenefitsImpact("All children will have an original NES");
        $campaign9->setIdea("Free original nintendos for anyone under 12 that wants one");
        $campaign9->setInspiration("Mario and Luigi");
        $campaign9->setHeadlineImageUri("http://upload.wikimedia.org/wikipedia/commons/8/82/NES-Console-Set.jpg");
        $manager->persist($campaign9);

        $manager->flush();
        $this->addReference('campaign', $campaign);
    }

    public function getOrder()
    {
        return 2;
    }
}