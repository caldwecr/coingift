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

    public function getType()
    {
        return 'CoinGift';
    }

}