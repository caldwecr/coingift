<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 5:17 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\DataFixtures\ORM;

use Cympel\Bundle\CoinGiftBundle\Entity\Campaign;
use Cympel\Bundle\CoinGiftBundle\Entity\NotificationMethod;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cympel\Bundle\CoinGiftBundle\Entity\User;

class LoadNotificationMethodData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $notificationMethod = new NotificationMethod();
        $notificationMethod->setCampaign($this->getReference('campaign'));
        $notificationMethod->setNotificationType('E-mail');
        $manager->persist($notificationMethod);
        $manager->flush();
        $this->addReference('notificationMethod', $notificationMethod);
    }

    public function getOrder()
    {
        return 6;
    }
}