<?php

namespace Car\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="car_rims")
 */
class Rim
{
    const FLANGE_B = 'B';
    const FLANGE_D = 'D';
    const FLANGE_J = 'J';
    const FLANGE_JJ = 'JJ';
    const FLANGE_JK = 'JK';
    const FLANGE_K = 'K';
    const FLANGE_P = 'P';

    const SYMMETRY_A = 'A';
    const SYMMETRY_S = 'S';

    public static $flanges = [
        self::FLANGE_B,
        self::FLANGE_D,
        self::FLANGE_J,
        self::FLANGE_JJ,
        self::FLANGE_K,
        self::FLANGE_P,
    ];

    public static $symmetries = [
        self::SYMMETRY_A,
        self::SYMMETRY_S,
    ];

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="width")
     */
    private $width;

    /**
     * @ORM\Column(name="flange")
     */
    private $flange;

    /**
     * @ORM\Column(name="diameter")
     */
    private $diameter;

    /**
     * @ORM\Column(name="et")
     */
    private $et;

    /**
     * @ORM\Column(name="hub_diameter")
     */
    private $hubDiameter;

    /**
     * @ORM\Column(name="mounting_hole")
     */
    private $mountingHole;

    /**
     * @ORM\Column(name="pcd")
     */
    private $pcd;

    /**
     * @ORM\Column(name="xfactor")
     */
    private $xFactor;

    /**
     * @ORM\Column(name="symmetry")
     */
    private $symmetry;

    /**
     * @return array
     */
    public static function getFlanges()
    {
        return self::$flanges;
    }

    /**
     * @param array $flanges
     */
    public static function setFlanges($flanges)
    {
        self::$flanges = $flanges;
    }

    /**
     * @return array
     */
    public static function getSymmetries()
    {
        return self::$symmetries;
    }

    /**
     * @param array $symmetries
     */
    public static function setSymmetries($symmetries)
    {
        self::$symmetries = $symmetries;
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
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getFlange()
    {
        return $this->flange;
    }

    /**
     * @param mixed $flange
     */
    public function setFlange($flange)
    {
        $this->flange = $flange;
    }

    /**
     * @return mixed
     */
    public function getDiameter()
    {
        return $this->diameter;
    }

    /**
     * @param mixed $diameter
     */
    public function setDiameter($diameter)
    {
        $this->diameter = $diameter;
    }

    /**
     * @return mixed
     */
    public function getEt()
    {
        return $this->et;
    }

    /**
     * @param mixed $et
     */
    public function setEt($et)
    {
        $this->et = $et;
    }

    /**
     * @return mixed
     */
    public function getHubDiameter()
    {
        return $this->hubDiameter;
    }

    /**
     * @param mixed $hubDiameter
     */
    public function setHubDiameter($hubDiameter)
    {
        $this->hubDiameter = $hubDiameter;
    }

    /**
     * @return mixed
     */
    public function getMountingHole()
    {
        return $this->mountingHole;
    }

    /**
     * @param mixed $mountingHole
     */
    public function setMountingHole($mountingHole)
    {
        $this->mountingHole = $mountingHole;
    }

    /**
     * @return mixed
     */
    public function getPcd()
    {
        return $this->pcd;
    }

    /**
     * @param mixed $pcd
     */
    public function setPcd($pcd)
    {
        $this->pcd = $pcd;
    }

    /**
     * @return mixed
     */
    public function getXFactor()
    {
        return $this->xFactor;
    }

    /**
     * @param mixed $xFactor
     */
    public function setXFactor($xFactor)
    {
        $this->xFactor = $xFactor;
    }

    /**
     * @return mixed
     */
    public function getSymmetry()
    {
        return $this->symmetry;
    }

    /**
     * @param mixed $symmetry
     */
    public function setSymmetry($symmetry)
    {
        $this->symmetry = $symmetry;
    }
}