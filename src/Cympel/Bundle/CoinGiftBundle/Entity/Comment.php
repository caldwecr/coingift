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
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="comment")
     */
    protected $votes;


    public function __construct()
    {
        $this->votes = new ArrayCollection();
    }

    public function getType()
    {
        return 'Comment';
    }

}