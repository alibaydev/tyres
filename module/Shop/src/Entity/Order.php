<?php

namespace Shop\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="shop_orders")
 */
class Order
{
    const STATUS_NEW = 'NEW';
    const STATUS_RESERVE = 'RESERVE';
    const STATUS_SHIPMENT = 'SHIPMENT';
    const STATUS_TRANSIT = 'TRANSIT';
    const STATUS_IN_STOCK = 'IN_STOCK';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_CANCELED = 'CANCELED';

    public static $statuses = [
        self::STATUS_NEW,
        self::STATUS_RESERVE,
        self::STATUS_SHIPMENT,
        self::STATUS_TRANSIT,
        self::STATUS_IN_STOCK,
        self::STATUS_COMPLETED,
        self::STATUS_CANCELED,
    ];

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="status")
     */
    private $status;

    /**
     * @ORM\Column(name="date_created")
     */
    private $dateCreated;

    /**
     * @ORM\Column(name="date_updated")
     */
    private $dateUpdated;

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return self::$statuses;
    }

    /**
     * @param array $statuses
     */
    public static function setStatuses($statuses)
    {
        self::$statuses = $statuses;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @param mixed $dateUpdated
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    }
}