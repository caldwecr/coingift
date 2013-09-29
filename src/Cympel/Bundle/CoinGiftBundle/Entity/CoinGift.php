<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 1:19 PM
 * Copyright Cympel Inc
 *
 * Represents a gift given from a user to a campaign
 */
namespace Cympel\Bundle\CoinGiftBundle\Entity;

use Cympel\Bundle\CoinGiftBundle\Entity\iType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Comment
 * @package Cympel\Bundle\CoinGiftBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="coinGift")
 */
class CoinGift implements iType
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="coinGifts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var Campaign
     * @ORM\ManyToOne(targetEntity="Campaign", inversedBy="coinGifts")
     * @ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     */
    protected $campaign;

    /**
     * @var int
     * @ORM\Column(type="bigint")
     */
    protected $coinGiftValue;

    /**
     * @param int $coinGiftValue
     */
    public function setCoinGiftValue($coinGiftValue)
    {
        $this->coinGiftValue = $coinGiftValue;
    }

    /**
     * @return int
     */
    public function getCoinGiftValue()
    {
        return $this->coinGiftValue;
    }



    /**
     * @param \Cympel\Bundle\CoinGiftBundle\Entity\Campaign $campaign
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * @return \Cympel\Bundle\CoinGiftBundle\Entity\Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \Cympel\Bundle\CoinGiftBundle\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \Cympel\Bundle\CoinGiftBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function getType()
    {
        return 'CoinGift';
    }

}