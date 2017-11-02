<?php

namespace Car\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="car_detail_models")
 */
class DetailModel
{

    const TYPE_RIM = 1;
    const TYPE_TIRE = 2;

    public static $types = [
        self::TYPE_RIM => 'RIM',
        self::TYPE_TIRE => 'TIRE',
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
     * @var \Car\Entity\DetailBrand
     * @ORM\ManyToOne(targetEntity="\Car\Entity\DetailBrand", fetch="LAZY")
     * @ORM\JoinColumn(name="detail_brand_id", referencedColumnName="id")
     */
    private $detailBrand;

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
     * @return DetailBrand
     */
    public function getDetailBrand()
    {
        return $this->detailBrand;
    }

    /**
     * @param DetailBrand $detailBrand
     */
    public function setDetailBrand($detailBrand)
    {
        $this->detailBrand = $detailBrand;
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