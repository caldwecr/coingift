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
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class NotificationMethod
 * @package Cympel\Bundle\CoinGiftBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="coinGiftNotificationMethod")
 */
class NotificationMethod implements iType
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Campaign
     * @ORM\ManyToOne(targetEntity="Campaign", inversedBy="notificationMethods")
     * @ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     */
    protected $campaign;

    /**
     * @var string
     * @ORM\Column(type="string", length=10)
     *
     * Currently supported options: 'E-mail' and 'Text Message'
     */
    protected $notificationType;

    public static function getNotificationMethodChoices()
    {
        return array(
            'E-mail' => 'E-mail',
            'Text Message' => 'Text Message',
        );
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
     * @param string $notificationType
     */
    public function setNotificationType($notificationType)
    {
        $this->notificationType = $notificationType;
    }

    /**
     * @return string
     */
    public function getNotificationType()
    {
        return $this->notificationType;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return 'NotificationMethod';
    }

}