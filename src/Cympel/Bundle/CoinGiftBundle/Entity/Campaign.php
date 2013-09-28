<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 1:17 PM
 * Copyright Cympel Inc
 *
 * This class represents a particular fundraising initiative on the CoinGift platform
 */
namespace Cympel\Bundle\CoinGiftBundle\Entity;

use Cympel\Bundle\CoinGiftBundle\Entity\iType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Campaign
 * @package Cympel\Bundle\CoinGiftBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="coinGiftCampaign")
 */
class Campaign implements iType
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(type="string", length=100)
     */
    protected $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="campaigns")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var array of Comment objects
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="parent")
     */
    protected $comments;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="CoinGift", mappedBy="campaign")
     */
    protected $coinGifts;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->coinGifts = new ArrayCollection();
    }

    public function getType()
    {
        return 'Campaign';
    }

}