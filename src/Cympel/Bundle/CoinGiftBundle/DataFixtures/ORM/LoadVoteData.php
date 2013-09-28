<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 4:25 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\DataFixtures\ORM;

use Cympel\Bundle\CoinGiftBundle\Entity\Campaign;
use Cympel\Bundle\CoinGiftBundle\Entity\Vote;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cympel\Bundle\CoinGiftBundle\Entity\User;

class LoadVoteData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $vote = new Vote();
        $vote->setUser($this->getReference('user'));
        $vote->setComment($this->getReference('comment'));
        $vote->setValue(1);
        $manager->persist($vote);
        $manager->flush();
        $this->addReference('vote', $vote);
    }

    public function getOrder()
    {
        return 4;
    }
}