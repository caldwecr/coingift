<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 1:19 PM
 * Copyright Cympel Inc
 *
 * This class represents a favorable or unfavorable vote that a User specifies for a Comment;
 * Votes can only be cast on Comments not on Campaigns
 */
namespace Cympel\Bundle\CoinGiftBundle\Entity;

use Cympel\Bundle\CoinGiftBundle\Entity\iType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Vote
 * @package Cympel\Bundle\CoinGiftBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="coinGiftVote")
 */
class Vote implements iType
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $value;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="votes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var Comment
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="votes")
     * @ORM\JoinColumn(name="comment_id", referencedColumnName="id")
     */
    protected $comment;

    /**
     * @param \Cympel\Bundle\CoinGiftBundle\Entity\Comment $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return \Cympel\Bundle\CoinGiftBundle\Entity\Comment
     */
    public function getComment()
    {
        return $this->comment;
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

    /**
     * @param int $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }



    public function getType()
    {
        return 'Vote';
    }

}