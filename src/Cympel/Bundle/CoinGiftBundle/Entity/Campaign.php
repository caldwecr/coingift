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
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="campaign")
     */
    protected $comments;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="CoinGift", mappedBy="campaign")
     */
    protected $coinGifts;

    /**
     * @var string
     * The user's description of their idea as captured in the createForm
     * @ORM\Column(type="text")
     */
    protected $idea;

    /**
     * @var string
     * The user's inspiration to develop the idea
     * @ORM\Column(type="text")
     */
    protected $inspiration;

    /**
     * @var string
     * The benefits / impact the user indicates this idea will have on the community
     * @ORM\Column(type="text")
     */
    protected $benefitsImpact;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="NotificationMethod", mappedBy="campaign")
     */
    protected $notificationMethods;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="ShareOnNetwork", mappedBy="campaign")
     */
    protected $shareOnNetworks;

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $coinGifts
     */
    public function setCoinGifts($coinGifts)
    {
        $this->coinGifts = $coinGifts;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getCoinGifts()
    {
        return $this->coinGifts;
    }

    /**
     * @param array $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
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

    /**
     * @param string $benefitsImpact
     */
    public function setBenefitsImpact($benefitsImpact)
    {
        $this->benefitsImpact = $benefitsImpact;
    }

    /**
     * @return string
     */
    public function getBenefitsImpact()
    {
        return $this->benefitsImpact;
    }

    /**
     * @param string $idea
     */
    public function setIdea($idea)
    {
        $this->idea = $idea;
    }

    /**
     * @return string
     */
    public function getIdea()
    {
        return $this->idea;
    }

    /**
     * @param string $inspiration
     */
    public function setInspiration($inspiration)
    {
        $this->inspiration = $inspiration;
    }

    /**
     * @return string
     */
    public function getInspiration()
    {
        return $this->inspiration;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $notificationMethods
     */
    public function setNotificationMethods($notificationMethods)
    {
        $this->notificationMethods = $notificationMethods;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getNotificationMethods()
    {
        return $this->notificationMethods->toArray();
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $shareOnNetworks
     */
    public function setShareOnNetworks($shareOnNetworks)
    {
        $this->shareOnNetworks = $shareOnNetworks;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getShareOnNetworks()
    {
        return $this->shareOnNetworks->toArray();
    }

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->coinGifts = new ArrayCollection();
        $this->notificationMethods = new ArrayCollection();
        $this->shareOnNetworks = new ArrayCollection();
    }

    public function getType()
    {
        return 'Campaign';
    }

}