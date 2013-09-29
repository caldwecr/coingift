<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 4:33 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\DataFixtures\ORM;

use Cympel\Bundle\CoinGiftBundle\Entity\Campaign;
use Cympel\Bundle\CoinGiftBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cympel\Bundle\CoinGiftBundle\Entity\User;

class LoadCommentData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $comment = new Comment();
        $comment->setUser($this->getReference('user'));
        $comment->setCampaign($this->getReference('campaign'));
        $comment->setTimestamp(time());
        $comment->setParent(null);
        $comment->setMessage("I think that this is a terrific campaign, and I encourage everyone to gift to it.");
        $manager->persist($comment);

        $comment2 = new Comment();
        $comment2->setUser($this->getReference('user2'));
        $comment2->setCampaign($this->getReference('campaign'));
        $comment2->setTimestamp(time());
        $comment2->setParent(null);
        $comment2->setMessage("I'm over the moon about this campaign. My grandfather was one of the original astronauts and he believed everyone should have a chance to visit the moon");
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3->setUser($this->getReference('user2'));
        $comment3->setCampaign($this->getReference('campaign'));
        $comment3->setTimestamp(time());
        $comment3->setParent($comment);
        $comment3->setMessage("Your comment is really cool");
        $manager->persist($comment3);

        $comment4 = new Comment();
        $comment4->setUser($this->getReference('user'));
        $comment4->setCampaign($this->getReference('campaign'));
        $comment4->setTimestamp(time());
        $comment4->setParent($comment3);
        $comment4->setMessage("Thanks @hax");
        $manager->persist($comment4);

        $manager->flush();
        $this->addReference('comment', $comment);
        $this->addReference('comment2', $comment2);
    }

    public function getOrder()
    {
        return 3;
    }
}