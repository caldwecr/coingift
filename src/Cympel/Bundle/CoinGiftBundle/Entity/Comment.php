<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 1:19 PM
 * Copyright Cympel Inc
 *
 * A user can create a comment for a campaign or another comment
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
 * @ORM\Table(name="coinGiftComment")
 */
class Comment implements iType
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var Campaign
     * @ORM\ManyToOne(targetEntity="Campaign", inversedBy="comments")
     * @ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     */
    protected $campaign;

    /**
     * @var Comment
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    protected $parent;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="parent")
     */
    protected $children;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="comment")
     */
    protected $votes;

    /**
     * @var string
     *
     * The actual comment message the user enters and is displayed
     *
     * @ORM\Column(type="text")
     */
    protected $message;

    /**
     * @var int
     * The unix timestamp when the comment was created
     *
     * @ORM\Column(type="bigint")
     */
    protected $timestamp;

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
     * @param \Doctrine\Common\Collections\ArrayCollection $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
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
     * @param \Cympel\Bundle\CoinGiftBundle\Entity\Comment $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return \Cympel\Bundle\CoinGiftBundle\Entity\Comment
     */
    public function getParent()
    {
        return $this->parent;
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
     * @param \Doctrine\Common\Collections\ArrayCollection $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public final function getDate()
    {
        return date("M j, Y", $this->timestamp);
    }

    public final function getVoteTotal()
    {
        $total = 0;
        foreach($this->votes as $key => $value) {
            $total += $value->getValue();
        }
        return $total;
    }

    public function __construct()
    {
        $this->votes = new ArrayCollection();
        $this->children = new ArrayCollection();
    }

    public function getType()
    {
        return 'Comment';
    }

}