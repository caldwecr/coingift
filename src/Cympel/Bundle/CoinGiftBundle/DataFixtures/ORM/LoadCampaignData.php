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
        $campaign->setSummary("This is a great idea because ...");
        $campaign->setBenefitsImpact("it will do great things");
        $campaign->setIdea("my idea is to fly to the moon");
        $campaign->setInspiration("my inspiration is nasa");
        $campaign->setHeadlineImageUri("/stuff/images/cmpgn-img-moontrip.jpg");
        $manager->persist($campaign);
        $moon = $campaign;

        $campaign2 = new Campaign();
        $campaign2->setUser($this->getReference('user2'));
        $campaign2->setId("Park clean up");
        $campaign2->setSummary("This is a great idea because ...");
        $campaign2->setBenefitsImpact("it will do great things");
        $campaign2->setIdea("my idea is to fly to the moon23r");
        $campaign2->setInspiration("my inspiration is nasafwefw");
        $campaign2->setHeadlineImageUri("/stuff/images/cmpgn-img-parkcleanup.jpg");
        $manager->persist($campaign2);
        $park = $campaign2;

        $campaign3 = new Campaign();
        $campaign3->setUser($this->getReference('jesse'));
        $campaign3->setId("Gun buy back");
        $campaign3->setSummary("This is a great idea because ...");
        $campaign3->setBenefitsImpact("it will do great thingsalso");
        $campaign3->setIdea("my idea is to fly to the moon");
        $campaign3->setInspiration("my inspiration is nasa");
        $campaign3->setHeadlineImageUri("/stuff/images/cmpgn-img-gunbuyback.jpg");
        $manager->persist($campaign3);
        $gun = $campaign3;

        $campaign4 = new Campaign();
        $campaign4->setUser($this->getReference('toni'));
        $campaign4->setId("Homeless housing");
        $campaign4->setSummary("This is a great idea because ...");
        $campaign4->setBenefitsImpact("it will do great things4");
        $campaign4->setIdea("my idea is to fly to the moon");
        $campaign4->setInspiration("my inspiration is nasa");
        $campaign4->setHeadlineImageUri("/stuff/images/cmpgn-img-homelesshousing.jpg");
        $manager->persist($campaign4);
        $homeless = $campaign4;

        $campaign5 = new Campaign();
        $campaign5->setUser($this->getReference('user'));
        $campaign5->setId("Downtown block demo");
        $campaign5->setSummary("This is a great idea because ...");
        $campaign5->setBenefitsImpact("it will do great things");
        $campaign5->setIdea("my idea is to fly to the moon");
        $campaign5->setInspiration("my inspiration is nasa");
        $campaign5->setHeadlineImageUri("/stuff/images/cmpgn-img-downtownblock.jpg");
        $manager->persist($campaign5);
        $demo = $campaign5;

        $campaign6 = new Campaign();
        $campaign6->setUser($this->getReference('danny'));
        $campaign6->setId("Girl scout pink party");
        $campaign6->setSummary("This is a great idea because ...");
        $campaign6->setBenefitsImpact("it will do great things");
        $campaign6->setIdea("my idea is to fly to the moon");
        $campaign6->setInspiration("my inspiration is nasa");
        $campaign6->setHeadlineImageUri("/stuff/images/cmpgn-img-girlscout.jpg");
        $manager->persist($campaign6);
        $girl = $campaign6;

        $campaign7 = new Campaign();
        $campaign7->setUser($this->getReference('jesse'));
        $campaign7->setId("Hack a thon");
        $campaign7->setSummary("This is a great idea because ...");
        $campaign7->setBenefitsImpact("it will do great things");
        $campaign7->setIdea("my idea is to fly to the moon");
        $campaign7->setInspiration("my inspiration is nasa");
        $campaign7->setHeadlineImageUri("/stuff/images/cmpgn-img-hackathon.jpg");
        $manager->persist($campaign7);
        $hack = $campaign7;

        $campaign8 = new Campaign();
        $campaign8->setUser($this->getReference('toni'));
        $campaign8->setId("Voter registration");
        $campaign8->setSummary("This is a great idea because ...");
        $campaign8->setBenefitsImpact("it will do great things");
        $campaign8->setIdea("my idea is to fly to the moon");
        $campaign8->setInspiration("my inspiration is nasa");
        $campaign8->setHeadlineImageUri("/stuff/images/juju-portrait.jpg");
        $manager->persist($campaign8);
        $voter = $campaign8;

        $campaign9 = new Campaign();
        $campaign9->setUser($this->getReference('user2'));
        $campaign9->setId("Nintendo-4-kids");
        $campaign9->setSummary("This is a great idea because ...");
        $campaign9->setBenefitsImpact("All children will have an original NES");
        $campaign9->setIdea("Free original nintendos for anyone under 12 that wants one");
        $campaign9->setInspiration("Mario and Luigi");
        $campaign9->setHeadlineImageUri("/stuff/images/cmpgn-img-nintendo.png");
        $manager->persist($campaign9);
        $nintendo = $campaign9;

        $manager->flush();
        $this->addReference('campaign', $campaign);
        $this->addReference('moon', $moon);
        $this->addReference('park', $park);
        $this->addReference('gun', $gun);
        $this->addReference('homeless', $homeless);
        $this->addReference('demo', $demo);
        $this->addReference('girl', $girl);
        $this->addReference('hack', $hack);
        $this->addReference('voter', $voter);
        $this->addReference('nintendo', $nintendo);
    }

    public function getOrder()
    {
        return 2;
    }
}