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

    public function getType()
    {
        return 'Vote';
    }

}