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
    const TYPE_COUNTRY = 1;
    const TYPE_REGION = 2;
    const TYPE_CITY = 3;

    public static $types = [
        self::TYPE_COUNTRY => 'COUNTRY',
        self::TYPE_REGION => 'REGION',
        self::TYPE_CITY => 'CITY',
    ];

    public static function getTypeByValue($type, $default = 'Unknown')
    {
        return array_key_exists($type, self::$types) ? self::$types[$type] : $default;
    }

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