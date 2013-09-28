<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 5:07 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\Entity;

use Cympel\Bundle\CoinGiftBundle\Entity\iType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ShareOnNetwork
 * @package Cympel\Bundle\CoinGiftBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="coinGiftShareOnNetwork")
 */
class ShareOnNetwork implements iType
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=20)
     *
     * Currently supported options: 'Facebook', 'Twitter', 'LinkedIn', 'Vine'
     */
    protected $networkName;

    public static function getShareOnNetworkChoices()
    {
        return array(
            'Facebook' => 'Facebook',
            'Twitter' => 'Twitter',
            'LinkedIn' => 'LinkedIn',
            'Vine' => 'Vine',
        );
    }

    /**
     * @var Campaign
     * @ORM\ManyToOne(targetEntity="Campaign", inversedBy="shareOnNetworks")
     * @ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     */
    protected $campaign;

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
     * @param string $networkName
     */
    public function setNetworkName($networkName)
    {
        $this->networkName = $networkName;
    }

    /**
     * @return string
     */
    public function getNetworkName()
    {
        return $this->networkName;
    }

    public function getType()
    {
        return 'ShareOnNetwork';
    }

}