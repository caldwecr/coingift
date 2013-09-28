<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 1:18 PM
 * Copyright Cympel Inc
 *
 * This class represents a user of the CoinGift system. A user can be a customer of the bank or not; only customers of the bank are able to gift, all customers can receive
 */

namespace Cympel\Bundle\CoinGiftBundle;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package Cympel\Bundle\CoinGiftBundle
 * @ORM\Entity
 * @ORM\Table(name="coinGiftUser")
 */
class User implements iType
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(type="string", length=100)
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    protected $firstName;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    protected $lastName;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $bankCustomer;

    /**
     * @var int
     * @ORM\Column(type="bigint)
     *
     * The balance (in pennies) available to the User for gifting
     */
    protected $coinBalance;

    /**
     * @var int
     * @ORM\Column(type="bigint")
     *
     * The unix timestamp the user's profile was created
     */
    protected $created;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     *
     * If this value is true the user cannot perform any actions in the application
     */
    protected $disabled;

    /**
     * @param boolean $bankCustomer
     */
    public function setBankCustomer($bankCustomer)
    {
        $this->bankCustomer = $bankCustomer;
    }

    /**
     * @return boolean
     */
    public function getBankCustomer()
    {
        return $this->bankCustomer;
    }

    /**
     * @param int $coinBalance
     */
    public function setCoinBalance($coinBalance)
    {
        $this->coinBalance = $coinBalance;
    }

    /**
     * @return int
     */
    public function getCoinBalance()
    {
        return $this->coinBalance;
    }

    /**
     * @param int $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param boolean $disabled
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    }

    /**
     * @return boolean
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
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
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }



    /**
     * @return string
     */
    public function getType()
    {
        return 'User';
    }

}