<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 1:31 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cympel\Bundle\CoinGiftBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setId("coolguy123");
        $user->setFirstName("Juliano");
        $user->setLastName("Dasilva");
        $user->setBankCustomer(true);
        $user->setCoinBalance(500);
        $user->setCreated(time());
        $user->setDisabled(false);
        $user->setImageUri("/stuff/images/juju-portrait.jpg");
        $manager->persist($user);

        $user2 = new User();
        $user2->setId("smartguy1337");
        $user2->setFirstName("Courtland");
        $user2->setLastName("Caldwell");
        $user2->setBankCustomer(true);
        $user2->setCoinBalance(500);
        $user2->setCreated(time());
        $user2->setDisabled(false);
        $user2->setImageUri("/stuff/images/courtland-caldwell.jpg");
        $manager->persist($user2);

        $jesse = new User();
        $jesse->setId("slack0ff");
        $jesse->setFirstName('Jesse');
        $jesse->setLastName('Hultgren');
        $jesse->setBankCustomer(false);
        $jesse->setCoinBalance(0);
        $jesse->setCreated(time());
        $jesse->setDisabled(false);
        $jesse->setImageUri("/stuff/images/jesse-hultgren.jpg");
        $manager->persist($jesse);

        $danny = new User();
        $danny->setId("cardl33");
        $danny->setFirstName("Danny");
        $danny->setLastName("Lopez");
        $danny->setBankCustomer(true);
        $danny->setCoinBalance(500);
        $danny->setCreated(time());
        $danny->setDisabled(false);
        $danny->setImageUri("/stuff/images/gerson-danny-lopez.jpg");
        $manager->persist($danny);

        $toni = new User();
        $toni->setId("bizex");
        $toni->setFirstName("Toni");
        $toni->setLastName("Milovan");
        $toni->setBankCustomer(true);
        $toni->setCoinBalance(500);
        $toni->setCreated(time());
        $toni->setDisabled(false);
        $toni->setImageUri("/stuff/images/toni-milovan.jpg");
        $manager->persist($toni);

        $manager->flush();
        $this->addReference('user', $user);
        $this->addReference('user2', $user2);
        $this->addReference('jesse', $jesse);
        $this->addReference('danny', $danny);
        $this->addReference('toni', $toni);
    }

    public function getOrder()
    {
        return 1;
    }
}