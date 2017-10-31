<?php

namespace Location\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="location_locations")
 */
class Location
{
    const TYPE_COUNTRY = 'COUNTRY';
    const TYPE_REGION = 'REGION';
    const TYPE_CITY = 'CITY';

    public static $types = [
        self::TYPE_COUNTRY,
        self::TYPE_REGION,
        self::TYPE_CITY,
    ];

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="name")
     */
    private $name;

    /**
     * @ORM\Column(name="code")
     */
    private $code;

    /**
     * @var \Location\Entity\Location
     * @ORM\ManyToOne(targetEntity="\Location\Entity\Location", fetch="LAZY")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    private $parent;

    /**
     * @ORM\Column(name="type")
     */
    private $type;

    /**
     * @return array
     */
    public static function getTypes()
    {
        return self::$types;
    }

    /**
     * @param array $types
     */
    public static function setTypes($types)
    {
        self::$types = $types;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return Location
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Location $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}